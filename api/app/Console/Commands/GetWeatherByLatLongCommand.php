<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Jobs\GetWeatherByLatLongJob;

class GetWeatherByLatLongCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        // For this challenge we assume that we only have 20 users 
        // that's why we only get all the user model
        // for optimization we can call it by page or by bactch.
        $users = User::all();

        foreach($users as $user) {
            $result = GetWeatherByLatLongJob::dispatch($user)
            ->delay(now()->addSecond());
            // save the weather report for internal use
            $user->weather = json_encode($result);
            $user->save();
        }
    }
}
