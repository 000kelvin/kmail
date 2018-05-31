<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 26/10/2017
 * Time: 11:47 PM
 */
abstract class exceptions extends Exception
{
    public $messages;
    public $codes;

    /**
     * @param mixed $code
     */
    public function setCodes($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCodes()
    {
        return $this->code;
    }

    /**
     * @param mixed $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

}

class pdoException extends exceptions{

}