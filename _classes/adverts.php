<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 27/10/2017
 * Time: 03:50 PM
 */
class adverts
{
    private $link;
    private $owner;
    private $type;
    private $decription;

    public function __construct($link, $owner, $type, $description)
    {
        $this->link = $link;
        $this->owner = $owner;
        $this->type =$type;
        $this->decription = $description;
    }

    public function getlink(){
        return $this->link;
    }


}