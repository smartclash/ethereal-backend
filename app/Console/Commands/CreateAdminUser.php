<?php

namespace App\Console\Commands;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is the admin\'s name?');
        $email = $this->ask('What is the admin\'s email?');
        $phone = $this->ask('What is the admin\'s phone number?');
        $password = $this->secret('What is the admin\'s password]?');

        $validator = \Validator::validate(
            compact('name', 'email', 'phone', 'password'),
            [
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users'],
                'phone' => ['required', 'numeric', 'unique:users'],
                'password' => ['required', Password::default()]
            ]
        );

        User::query()->create([
            ...$validator,
            'role' => Role::ADMIN,
            'password' => Hash::make($password)
        ]);

        $this->line('User created successfully');

        return Command::SUCCESS;
    }
}
