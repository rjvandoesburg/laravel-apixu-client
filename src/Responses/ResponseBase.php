<?php

namespace Rjvandoesburg\Apixu\Responses;

abstract class ResponseBase
{
    /**
     * Parse the response
     *
     * @param $response
     *
     * @return static
     */
    public static function parse($response)
    {
        $object = new static;
        foreach ($response as $key => $value) {
            $key = camel_case($key);
            $object->{$key} = $value;
        }

        return $object;
    }
}