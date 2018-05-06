<?php

namespace  DeveloperH\Basecamp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 4/29/18
 * Time: 7:42 PM
 */

class Basecamp extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Basecamp'; }
}