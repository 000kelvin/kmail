<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 24/10/2017
 * Time: 06:26 PM
 */
class validation
{
    public function check_empty($data, $fields){
        $msg = null;
        foreach ($fields as $field){
            if (empty($data[$field])){
                $msg .= "$field field is empty<br/>";
            }
        }
        return $msg;
    }

    public function email_valid($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public function int_valid($input){
        if (filter_var($input, FILTER_VALIDATE_INT)){
            return true;
        }
        return false;
    }
}