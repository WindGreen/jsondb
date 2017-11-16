<?php

class JsonAddress
{
	public static $__address=0;
	public static $addressBook=[];
	public static $addressMap=[];//实际底层不需要这个映射

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
