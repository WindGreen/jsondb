<?php

class JsonObject
{
    private $__attributes = []; //属性
    private $__address;

    public static $__attrBook = [];

    public function __construct($attr = [])
    {
        $this->__address = new JsonAddress($this);
        JsonAddress::regist($this);
        foreach ($attr as $key => $value) {
            $this->set($key, $value);
        }
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
        if (!in_array([$name => $this], static::$__attrBook)) {
            static::$__attrBook[] = [$name => $this];
        }

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

    public function toArray()
    {
        $result = [];
        foreach ($this->__attributes as $key => $value) {
            if ($value instanceof JsonAddress) {
                if ($value->address <= $this->getAddress()->address) {
                    $result[$key] = $value->toArray();
                } else {
                    $result[$key] = $value->locate()->toArray();
                }

            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }


}
