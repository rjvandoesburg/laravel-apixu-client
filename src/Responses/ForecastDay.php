<?php

namespace Rjvandoesburg\Apixu\Responses;

class ForecastDay extends ResponseBase
{
    /**
     * @var string
     */
    public $date;

    /**
     * @var int
     */
    public $dateEpoch;

    /**
     * @var Day
     */
    public $day;

    /**
     * @var
     */
    public $astro;

    /**
     * @var
     */
    public $hour;
}