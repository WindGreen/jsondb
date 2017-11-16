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

    public function find($name)
    {
        if (is_string($name)) {
            foreach (JsonObject::$__attrBook as $attr) {
                if (key($attr) == $name) {
                    return $attr[$name];
                }

            }
        } elseif (is_array($name)) {
        	list($n,$p,$v)=$name;
        	switch ($p) {
        		case '=':
		            foreach (JsonObject::$__attrBook as $attr) {
		                if (key($attr) == $n && $attr[$n]->get($n)==$v) {
		                    return $attr[$n];
		                }

		            }
        			break;
        		
        		default:
        			# code...
        			break;
        	}
        }
        return null;
    }
}
