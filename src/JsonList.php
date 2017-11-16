<?php

class JsonList extends JsonObject
{
	protected $list=[];
	public function __construct($data)
	{
		parent::__construct();
		foreach ($data as $item) {
			$this->list[]=$item->getAddress();
		}
	}

	public function find()
	{
		
	}
}