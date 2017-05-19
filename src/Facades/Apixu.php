<?php

namespace Rjvandoesburg\Apixu\Facades;

use Illuminate\Support\Facades\Facade;
use Rjvandoesburg\Apixu\ApixuClient;

class Apixu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApixuClient::class;
    }
}