<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 03/12/2017
 * Time: 04:46 PM
 */
class advertisements
{
    function local_bottom($adter_name = NULL, $advert_image_link = NULL, $advert_image_name = NULL, $advert_url = NULL, $advert_title = NULL, $advert_style = NULL, $advert_class = NULL, $ad_div_class = NULL){
        return '
            <div class="'.$ad_div_class.'" >
            <a title="'.$advert_title.'" href="'.$advert_url.'"><img class="'.$advert_class.'" style="'.$advert_style.'" alt="'.$advert_title.'" src="'.$advert_image_link.'/'.$advert_image_name.'"/></a>
            </div>';
    }
}