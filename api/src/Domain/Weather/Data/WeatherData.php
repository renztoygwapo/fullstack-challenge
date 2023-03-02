<?php
namespace Domain\Weather\Data;

use Spatie\LaravelData\Data;

class WeatherData extends Data {
    public int $id;
    public String $latitude;
    public String $longitude;
}