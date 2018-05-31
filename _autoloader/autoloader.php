<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 25/10/2017
 * Time: 02:59 PM
 */

    function __autoload($class_name, $dir=null){
        if (is_null($dir)){
            $dir = './';
        }
        $file_name = $class_name.'.php';
        if (file_exists($file_name)){
            include_once $file_name;
        }else echo 'File not found';
            return false;
    }