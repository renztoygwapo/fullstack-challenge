<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Domain\Weather\Data\WeatherData;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Domain\Weather\Actions\GetWeatherByLocationAction;

class GetWeatherByLatLongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $data = WeatherData::from([
            'id' => $this->user->id,
            'latitude' => $this->user->latitude,
            'longitude' => $this->user->longitude
        ]);

        resolve(GetWeatherByLocationAction::class)($data);
    }
}
