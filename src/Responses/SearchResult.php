<?php

namespace Rjvandoesburg\Apixu\Responses;

class SearchResult extends ResponseBase
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $region;

    /**
     * @var string
     */
    public $country;

    /**
     * @var float
     */
    public $lat;

    /**
     * @var float
     */
    public $lon;

    /**
     * @var string
     */
    public $url;
}