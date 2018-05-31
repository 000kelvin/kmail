<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 24/10/2017
 * Time: 07:55 PM
 */
class secureInput
{
    public function hash($word){
        $word = sha1($word);
        return $word;
    }

    public function double_sec($dword){
        $dword = sha1($dword);
        $dword = md5($dword);
        return $dword;
    }

    public function hmtl_pur($dirty_html){
        require_once ('../../htmlpur/library/HTMLPurifier.auto.php');
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $clean_html = $purifier->purify($dirty_html);
        return $clean_html;
    }
}