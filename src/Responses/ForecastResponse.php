<?php

namespace Rjvandoesburg\Apixu\Responses;

class ForecastResponse
{
    /**
     * @var Day
     */
    public $current;

    /**
     * @var Location
     */
    public $location;

    /**
     * @var
     */
    public $forecast;

    /**
     * Parse the response
     *
     * @param $response
     *
     * @return ForecastResponse
     */
    public static function parse($response)
    {
        $class = new static;

        $class->current = Day::parse($response->current);
        $class->location = Location::parse($response->location);
        $class->forecast = Forecast::parse($response->forecast);

        return $class;
    }
}