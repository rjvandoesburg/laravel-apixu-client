<?php

namespace Rjvandoesburg\Apixu;

use Illuminate\Contracts\Support\Arrayable;

class Filters implements Arrayable
{
    /**
     *
     *
     * Query parameter based on which data is sent back. It could be following:
     * * Latitude and Longitude (Decimal degree) e.g: q=48.8567,2.3508
     * * city name e.g.: q=Paris
     * * US zip e.g.: q=10001
     * * UK postcode e.g: q=SW1
     * * Canada postal code e.g: q=G2J
     * * metar:<metar code> e.g: q=metar:EGLL
     * * iata:<3 digit airport code> e.g: q=iata:DXB
     * * auto:ip IP lookup e.g: q=auto:ip
     * * IP address (IPv4 and IPv6 supported) e.g: q=100.0.0.1
     *
     * @var string
     *
     * @required
     */
    protected $q;

    /**
     * Number of days of forecast required.
     * days parameter value ranges between 1 and 10.e.g: days=5
     * If no days parameter is provided then only today's weather is returned.
     *
     * @var int
     *
     * @equired only with forecast API method.
     */
    protected $days;

    /**
     * For history API 'dt' should be on or after 1st Jan, 2015 in yyyy-MM-dd format (i.e. dt=2015-01-01)
     * For forecast API 'dt' should be between today and next 10 day in yyyy-MM-dd format (i.e. dt=2015-01-01)
     *
     * @var string
     *
     * @required for History API
     */
    protected $dt;

    /**
     * Unix Timestamp used by Forecast and History API method.
     * unixdt has same restriction as 'dt' parameter. Please either pass 'dt' or 'unixdt' and
     * not both in same request. e.g.: unixdt=1490227200
     *
     * @var int
     *
     * @optional
     */
    protected $unixdt;

    /**
     * Restrict date output for History API method.
     * For history API 'end_dt' should be on or after 1st Jan, 2015 in yyyy-MM-dd format (i.e. dt=2015-01-01)
     * 'end_dt' should be greater than 'dt' parameter and difference should not be more than 30 days between the two dates.
     *
     * @var string
     *
     * @optional
     */
    protected $endDt;

    /**
     * Unix Timestamp used by History API method.
     * unixend_dt has same restriction as 'end_dt' parameter. Please either pass 'end_dt' or 'unixend_dt' and
     * not both in same request. e.g.: unixend_dt=1490227200
     *
     * @var int
     *
     * @optional
     */
    protected $unixendDt;

    /**
     * Restricting forecast or history output to a specific hour in a given day.
     * Must be in 24 hour. For example 5 pm should be hour=17, 6 am as hour=6
     *
     * @var int
     *
     * @optional
     */
    protected $hour;

    /**
     * Returns 'condition:text' field in API in the desired language
     *
     * @var string
     *
     * @optional
     */
    protected $lang;

    /**
     * Filters constructor.
     *
     * @param array $filters
     */
    public function __construct(array $filters = [])
    {
        foreach ($filters as $filter => $value) {
            $filter = camel_case($filter);
            $this->{$filter} = $value;
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $properties = [];
        foreach ($this as $property => $value) {
            if ($value !== null) {
                $properties[$property] = $value;
            }
        }

        return $properties;
    }
}