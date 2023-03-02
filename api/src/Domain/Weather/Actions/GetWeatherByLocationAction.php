<?php
namespace Domain\Weather\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Domain\Weather\Data\WeatherData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class GetWeatherByLocationAction {
    public function __invoke(WeatherData $data)
    {

        try {
            $response = Http::get(Config::get('weather.url').'/data/3.0/onecall', [
                'lat' => $data->latitude,
                'lon' => $data->longitude,
                'appid' => Config::get('weather.app_key')
            ]);

            // Find User and Update Weather
            $user = User::findOrFail($data->id);
            $user->weather = $response;
            $user->save();
            
            return $response;
        } catch (\Exception $exception) {
            throw $exception;
        }
        
    }
}