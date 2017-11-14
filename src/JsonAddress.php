<?php

class JsonAddress
{
	public static $__address=0;
	public static $addressBook=[];

	public $address;

	public function __construct()
	{
		$this->address=JsonAddress::malloc();
	}	

	public static function malloc()
	{
		return static::$__address++;
	}

	public static function regist($obj)
	{
		static::$addressBook[$obj->getAddress()->address]=$obj;
	}

	public function locate()
	{
		return static::$addressBook[$this->address];
	}
}
