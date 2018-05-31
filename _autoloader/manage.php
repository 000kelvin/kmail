<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 25/10/2017
 * Time: 03:29 PM
 */
class manage
{
    public static function autoload($class_name){
        $class_name = strtolower($class_name);
        $file_name = $class_name.'.php';
        if (file_exists($file_name)){
            include $file_name;
        }else{
            echo 'File not found';
            return false;
        }

        $file_name = '../_classes'.$class_name.'.php';
        if (file_exists($file_name)){
            include $file_name;
        }else{
            echo 'File not found';
            return false;
        }
        return false;
    }
}

