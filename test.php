<?php
require './src/JsonDB.php';

// $db=new JsonDB;
// //print_r($db);
// $db->set('site1',new JsonObject(['name'=>'site001']));
// $db->set('site2',new JsonObject(['name'=>'site002']));

//  $site1=$db->get('site1');
// // var_dump($site1);

// // $site1->set('name','hello world');
// // var_dump($site1);

// $site1->set('users',new JsonList([
// 	new JsonObject(['name'=>'John']),
// 	new JsonObject(['name'=>'Alice']),
// ]));

// // $site=$db->find('users');
// //print_r($site->get('users'));
// // var_dump($site1->get('users'));

// // var_dump($site1->get('name'));

// //var_dump(JsonAddress::$addressBook);

// //$users=$site1->get('users');
// $john=$db->find(['name','=','John']);
// //var_dump($john->toArray());

// $john->set('ownSite',$site1);
//var_dump($john);
//
$json='{"site1":{"name":"site001","users":[{"name":"John","ownSite":"#0x1"},{"name":"Alice"}]},"site2":{"name":"site002","domain":"localhost"}}';
$db2=JsonDB::import($json);
var_dump($db2->toArray());
//var_dump(JsonAddress::$addressBook);