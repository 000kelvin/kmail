<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 23/10/2017
 * Time: 10:29 PM
 */

include('_classes/mysql_dbconnections.php');
$db = new mysql_dbconnections();
$db->connect();

// full sql
//$db->sql('SELECT * FROM tested');
//$res = $db->getResults();
//foreach ($res as $output){
//    echo $output["title"]."<br/>";
//}

// insert
//$data = $db->escapeString("lflflfl");
//$bd = $db->escapeString("lame");
//$db ->insert('tested', array('title'=>$bd, 'bodytext'=>$data, 'created'=>'0595994949'));
//$res = $db->getResults();
//print_r($res);

// select
//$db->select('tested', 'id, bodytext', NULL, NULL, 'id DESC');
//$res = $db->getResults();
//$db->disconnect();
//print_r($res);

// update
//$db->update('tested', array('title'=>'cool tests', 'bodytext'=>'yh bro, feel it?', 'created'=>'1234588999'), 'id = 9');
//$res = $db->getResults();
//print_r($res);
//print_r($db);

// delete
//$db->delete('tested', 'id = 99');
//$res = $db->getResults();
//print_r($res);

// join
//$db->select('tested','tested.id, tested.title, testedChild.title', 'testedChild ON tested.id = 2', 'tested.id = 2', 'id DESC');
//$res = $db->getResults();
//print_r($res);
//print_r($db);


