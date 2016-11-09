<?php

namespace APP;

use ArrayAccess;
/**
* 
*/
class Super implements ArrayAccess
{
    private $model; // set by ArrayAccess offsetGet
    private static $instance;
    
    private function __construct()
    {
        # code...
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __call($name, $params)
    {
        $response = [];

        // Get service to process the response.
        $service = app(config('super.service_prefix') . $this->model);
        if (is_callable([$service, $name])) {
            return $service->$name($response, $params);
        }

        return $response;
    }

    public function offsetGet($offset)
    {
        $this->model = $offset;
        return $this;
    }

    public function offsetExists($offset) {}

    public function offsetSet($offset, $value) {}

    public function offsetUnset($offset) {}

}
