<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 25/11/2017
 * Time: 10:32 PM
 */
class sexy_url
{
    function slug($string, $rep = '-'){
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = str_replace('&', 'and', $string);
        $string = preg_replace('/[^a-zA-Z0-9 ]/', '', $string);
        $string = strtolower($string);
        $string = preg_replace('/[ ]+/', ' ', $string);
        $string = str_replace(' ', $rep, $string);

        return $string;
    }
}