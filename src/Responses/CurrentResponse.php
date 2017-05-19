<?php

namespace Rjvandoesburg\Apixu\Responses;

class CurrentResponse
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
     * Parse the response
     *
     * @param $response
     *
     * @return CurrentResponse
     */
    public static function parse($response)
    {
        $class = new static;

        $class->current = Day::parse($response->current);
        $class->location = Location::parse($response->location);

        return $class;
    }
}