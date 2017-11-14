<?php

require 'Utils.php';
require 'JsonAddress.php';
require 'JsonObject.php';
require 'JsonList.php';

class JsonDB
{
    public $root;

    private $registry = []; //注册表

    public function __construct()
    {
        $this->root = new JsonObject;
    }

    public function __call($name, $args)
    {
        if (method_exists($this->root, $name)) {
            return call_user_func_array([$this->root, $name], $args);
        }
    }
}
