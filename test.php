<?php
require './src/JsonDB.php';

$db=new JsonDB;
//print_r($db);
$db->set('site1',new JsonObject(['name'=>'jsondb']));

$site1=$db->get('site1');
var_dump($site1);

$site1->set('name','hello world');
var_dump($site1);

var_dump($site1->get('name'));
