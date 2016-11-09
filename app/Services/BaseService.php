<?php

namespace App\Services;

/**
* 
*/
class BaseService
{
    protected static $instances; // Array to store all model's instance.
    
    protected function __construct()
    {
        # code...
    }

    public static function getInstance($model)
    {
        $service = "\\App\\Services\\" . ucfirst($model) . 'Service';
        if (!isset(self::$instances[$model])) {
            if (class_exists($service)) {
                self::$instances[$model] = new $service;
            } else {
                self::$instances[$model] = null;
            }
        }

        return self::$instances[$model];
    }
}