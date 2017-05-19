<?php

namespace Rjvandoesburg\Apixu\Responses;

class Forecast
{
    /**
     * @var
     */
    public $days;

    /**
     * Parse the response
     *
     * @param $response
     *
     * @return static
     */
    public static function parse($response)
    {
        $class = new static;
        $class->days = collect();

        foreach ($response->forecastday as $day) {
            $class->days->push(ForecastDay::parse($day));
        }

        return $class;
    }
}