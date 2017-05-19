<?php

namespace Rjvandoesburg\Apixu;

use Illuminate\Cache\Repository as CacheRepository;

class ApixuClient
{
    /**
     * @var \Illuminate\Cache\Repository
     */
    protected $cache;

    /**
     * Array of available endpoints
     *
     * @var array
     */
    protected $endpoints = [
        'current',
        'forecast',
        'search',
        'history',
    ];

    /**
     *  constructor.
     * @param \Illuminate\Cache\Repository $cache
     */
    public function __construct(CacheRepository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param string $endpoint
     * @param Filters $filters
     *
     * @return object
     *
     * @throws \Exception
     */
    protected function execute($endpoint, Filters $filters)
    {
        $parameters = $filters->toArray();
        $parameters['key'] = config('apixu.key');
        $query = http_build_query($parameters);
        $url = config('apixu.url').'/'.$endpoint.'.json?'.$query;

        if ($cache = $this->cache->get($url)) {
            return $this->parseResponse($endpoint, $cache);
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($curl);
        $response = json_decode($json);
        if (isset($response->error)) {
            throw new \Exception($response->error->message);
        }

        $this->cache->put($url, $json, config('apixu.cache_length'));

        return $this->parseResponse($endpoint, $json);
    }

    /**
     * @param string $endpoint
     * @param string $response
     *
     * @return object
     */
    protected function parseResponse($endpoint, $response)
    {
        $weather = json_decode($response);

        $class = '\\Rjvandoesburg\\Apixu\\Responses\\'.ucfirst($endpoint).'Response';

        return $class::parse($weather);
    }

    /**
     * @param string $method
     * @param array $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, $this->endpoints)) {
            array_unshift($parameters, $method);

            return call_user_func([$this, 'execute'], ...$parameters);
        }

        $methods = implode(', ', $this->endpoints);
        throw new \BadMethodCallException('Only the following calls are permitted: '.$methods);
    }
}