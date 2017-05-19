<?php

namespace Rjvandoesburg\Apixu\Responses;

class SearchResponse
{
    /**
     * @var SearchResult[]|\Illuminate\Support\Collection
     */
    public $results;

    /**
     * Parse the response
     *
     * @param $response
     *
     * @return SearchResponse
     */
    public static function parse($response)
    {
        $class = new static;

        $class->results = collect();

        foreach ($response as $result) {
            $class->results->push(SearchResult::parse($result));
        }

        return $class;
    }
}