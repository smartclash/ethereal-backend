<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use Illuminate\Console\Command;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tests the email service';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Mail::to('yo@alphaman.me')
            ->send(new TestMail());

        $this->info('Email sent!');
        return 0;
    }
}
