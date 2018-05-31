<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 26/10/2017
 * Time: 07:04 PM
 */

include '_classes/pdo_dbconnections.php';
$db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');

//table exists
//$db->tableExists('test');

//getById
//$byId = $db->getById('dhhd', '2');
//print_r($byId);
//foreach ($byId as $dbs){
//    echo @$dbs['id'];
//    echo @$dbs['title'];
//    echo @$dbs['bodytext'];
//}

//select
//$userd = $db->select('post', '*', NULL, NULL, 'id DESC');
////$res = $db->getResults();
////print_r($res);
//if (count($userd) > 0){
//    foreach ($userd as $users){
//        echo @$users['id'];
//        echo @$users['post_title'];
//        echo @$users['post_cont'].'</br>';
//    }
//}

//insert
//$data = $db->escapeString("mmmj");
//$bd = $db->escapeString("jhjhdjjhjh");
//$db ->insert('tested', array('title'=>$bd, 'bodytext'=>$data, 'created'=>'0595994949'));

//delete
//$db->delete('tested', 'id = 17');

//update
//$db->update('tested', array('title'=>'cool tests you run', 'bodytext'=>'yh bro, feel it?', 'created'=>'1234588999'), 'id = 9');

