<?php

class JsonObject
{
    private $__attributes = []; //属性
    private $__address;

    public function __construct($attr=[])
    {
        $this->__address = new JsonAddress($this);
        JsonAddress::regist($this);
        $this->__attributes=$attr;
    }

    public function __get($name)
    {
        if (isset($this->__attributes[$name])) {
            return $this->__attributes[$name];
        } else {
            return null;
        }

    }

    public function __set($name, $value)
    {
        $this->__attributes[$name] = $value;
    }

    public function get($name)
    {
        if ($this->$name instanceof JsonAddress) {
            return $this->$name->locate();
        } else {
            return $this->$name;
        }

    }

    public function set($name, $value)
    {
        if ($value instanceof JsonObject || $value instanceof JsonList) {
            $this->$name = $value->getAddress();
        } else {
            $this->$name = $value;
        }
    }

    public function getAddress()
    {
        return $this->__address;
    }
}
