<?php

namespace Rjvandoesburg\Apixu\Responses;

class Location extends ResponseBase
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var float
     */
    protected $lat;

    /**
     * @var float
     */
    protected $lon;

    /**
     * Like: "Europe/Amsterdam"
     *
     * @var string
     */
    protected $tzId;

    /**
     * @var int
     */
    protected $localtimeEpoch;

    /**
     * @var string
     */
    protected $localtime;
}