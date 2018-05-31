<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 26/10/2017
 * Time: 12:29 AM
 */
class redirect
{
    function within($url){
        ob_start();
        $url = 'http://'.$url.'';
        while (ob_get_status()){
            ob_end_clean();
        }
        header("Location: $url");
        exit;
    }

    function without($url){
        ob_start();
        $url = 'http://www.kelymail.com'.$url.'';
        while (ob_get_status()){
            ob_end_clean();
        }
        header("Location: $url");
        exit;
    }

    function local($url){
        ob_start();
        while (ob_get_status()){
            ob_end_clean();
        }
        header("Location: $url");
        exit;
    }
}