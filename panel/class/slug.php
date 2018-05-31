<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 03/11/2017
 * Time: 10:33 PM
 */
class slug
{
    function postSlug($text){
        $text = preg_replace('~[^pld]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-w]+~','', $text);

    if (empty($text)){
        return '-';
    }
        return $text;

    }
}