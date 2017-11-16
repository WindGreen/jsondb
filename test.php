<?php
require './src/JsonDB.php';

$db=new JsonDB;
//print_r($db);
$db->set('site1',new JsonObject(['name'=>'site1']));
$db->set('site2',new JsonObject(['name'=>'site2']));

 $site1=$db->get('site1');
// var_dump($site1);

// $site1->set('name','hello world');
// var_dump($site1);

$site1->set('users',new JsonList([
	new JsonObject(['name'=>'John']),
	new JsonObject(['name'=>'Alice']),
]));
//var_dump($site1);
var_dump($site1->get('users'));

// var_dump($site1->get('name'));
