<?php

namespace Rjvandoesburg\Apixu\Responses;

class Day extends ResponseBase
{
    /**
     * @var int
     */
    public $lastUpdatedEpoch;

    /**
     * @var string
     */
    public $lastUpdated;

    /**
     * @var float
     */
    public $tempC;

    /**
     * @var float
     */
    public $tempF;

    /**
     * @var int
     */
    public $isDay;

    /**
     * @var object
     */
    public $condition;

    /**
     * @var float
     */
    public $windMph;

    /**
     * @var float
     */
    public $windKph;

    /**
     * @var int
     */
    public $windDegree;

    /**
     * @var string
     */
    public $windDir;

    /**
     * @var float
     */
    public $pressureMb;

    /**
     * @var float
     */
    public $pressureIn;

    /**
     * @var float
     */
    public $precipMm;

    /**
     * @var float
     */
    public $precipIn;

    /**
     * @var int
     */
    public $humidity;

    /**
     * @var int
     */
    public $cloud;

    /**
     * @var float
     */
    public $feelslikeC;

    /**
     * @var float
     */
    public $feelslikeF;

    /**
     * @var float
     */
    public $visKm;

    /**
     * @var float
     */
    public $visMiles;
}