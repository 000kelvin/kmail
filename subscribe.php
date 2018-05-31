<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 18/11/2017
 * Time: 06:15 PM
 */

    require ("_autoloader/manage.php");
    spl_autoload_register(function ($c){
        include '_classes/'.$c.'.php';

    });

    $sub = new subscribe('localhost', 'root', '', 'kely_subscribers');
    $db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');
    $pur = new secureInput();

    $email = $_POST['e_mail'];
    $email = $db->escapeString($email);
    $email = $pur->hmtl_purs($email);

    if (isset($_POST)) {
        $date = date('Y-m-d');
        $time = date('h:i:s');
        $sub->insert('subscribers', array('id' => '', 'email' => addslashes($email), 'date' => addslashes($date), 'time' => addslashes($time)));
    }

