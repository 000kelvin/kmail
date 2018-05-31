<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 27/10/2017
 * Time: 01:07 PM
 */
class local
{
    public $title;
    public $image;
    public $postName;
    public $date_posted;
    public $date_mod;
    public $users;
    //public $date_posted_con = date("D M Y",strtotime("$date_posted"));
    //public $date_mod_con = date("D M Y",strtotime($date_mod));

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
//        $this->title = @$this->users['post_title'];
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
//        $this->image = @$this->users['post_image_name'];
    }

    /**
     * @param mixed $postName
     */
    public function setPostName($postName)
    {
        $this->postName = $postName;
//        $this->postName = @$this->users['post_ad_name'];
    }

    /**
     * @param mixed $date_posted
     */
    public function setDatePosted($date_posted)
    {
        $this->date_posted = $date_posted;
//        $this->date_posted = @$this->users['post_date'];
    }

    /**
     * @param mixed $date_mod
     */
    public function setDateMod($date_mod)
    {
        $this->date_mod = $date_mod;
//        $this->date_mod = @$this->users['post_date_mod'];
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getDatePosted()
    {
        return date("D M Y",strtotime($this->date_posted));
    }

    /**
     * @return mixed
     */
    public function getDateMod()
    {
        return date("D M Y",strtotime($this->date_mod));
    }

}