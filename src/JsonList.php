<?php

class JsonList extends JsonObject
{
	protected $list=[];
	public function __construct($data)
	{
		parent::__construct();
		$this->list=$data;
	}

}