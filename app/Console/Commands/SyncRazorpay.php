<?php

namespace App\Console\Commands;

use App\Mail\UserRegistered;
use App\Models\Razorpay;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Razorpay\Api\Api;

class SyncRazorpay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'razorpay:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync razorpay payment details with system details';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $skip = 0;
        for (; ;) {
            $rzpResponse = collect(app(Api::class)->order->all([
                'authorized' => 1,
                'count' => 100,
                'skip' => $skip
            ]));
            $orders = collect($rzpResponse->get('items'));

            if ($rzpResponse->get('count') <= 0)
                break;

            $this->syncer($orders);

            $skip++;
        }

        return Command::SUCCESS;
    }

    private function syncer(Collection $orders)
    {
        $orders->each(function ($order) {
            $unSynced = Razorpay::whereOrder($order['id'])
                ->wherePaid(false)
                ->with(['user', 'user.details'])
                ->first();

            if ($unSynced?->exists()) {
                $unSynced->update([
                    'order' => $order['id'],
                    'paid' => true
                ]);

                $unSynced->user->details->update([
                    'code' => \Str::random(6)
                ]);

                \Mail::to($unSynced->user->email)
                    ->send(new UserRegistered($unSynced->user->email));

                $this->line('Mailed ' . $unSynced->user->name . '(' . $unSynced->user->email . ')');
            }
        });
    }
}
