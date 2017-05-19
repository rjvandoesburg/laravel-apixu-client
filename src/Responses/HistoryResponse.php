<?php

namespace Rjvandoesburg\Apixu\Responses;

class HistoryResponse
{
    /**
     * @var Location
     */
    public $location;

    /**
     * @var Forecast
     */
    public $forecast;

    /**
     * Parse the response
     *
     * @param $response
     *
     * @return HistoryResponse
     */
    public static function parse($response)
    {
        $class = new static;

        $class->location = Location::parse($response->location);
        $class->forecast = Forecast::parse($response->forecast);

        return $class;
    }
}