<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 03/12/2017
 * Time: 08:11 PM
 */
class hotStories
{
    function display($db){
        try{
            $h_userd = $db->select('post', '*', NULL,"post_cat LIKE '%Hot%'", 'id DESC', '1');
            $h_userds = $db->select('headline', '*', NULL,"post_cat LIKE '%Hot%'", 'id DESC', '1');
            echo '<div class="body1 col-xs-0 col-sm-4 col-md-4 col-lg-4 hidden-xs">
                <div class="panel panel-primary" style="border-radius: 0 !important;">
                <div class="panel-heading" style="border-radius: 0 !important; padding-left: 2px !important;">
                 <h3 class="panel-title"><b>&nbsp;Hot stories!</b></h3>
                 </div>
                 <div class="panel-body" style="padding: 3px !important;">
                ';
            if (count($h_userd) > 0 || count($h_userds) > 0 ) {
                echo '<br>';
                foreach ($h_userd as $h_users) {
                    $id = @$h_users['id'];
                    $title = @$h_users['post_title'];
                    $slugh = @$h_users['post_slug'];
                    $image = @$h_users['post_image_name'];
                    $postName = @$h_users['post_ad_name'];
                    $date_posted = @$h_users['post_date'];
                    $date_mod = @$h_users['post_date_mod'];
                    $date_posted_con = date("d M Y",strtotime("$date_posted"));
                    $date_mod_con = date("d M Y",strtotime($date_mod));

                    echo '
                    <h6 class="font_body">
                        <a href="'.BASE_URL.LOCAL_POST_URL.$id.'/'.$slugh.'/'.'" data-ajax="false">'.$title.'</a></h6>
                    <img class="img-responsive img-body" style="max-height: 165px !important;" alt="Image Loading..." src="'.BASE_URL.LOCAL_POST_IMAGE_URL.$image.'"/>
                    <hr class="hr_title">
                        ';
                }
                foreach ($h_userds as $h_userss) {
                    $id = @$h_userss['id'];
                    $title = @$h_userss['post_title'];
                    $slughh = @$h_userss['post_slug'];
                    $image = @$h_userss['post_image_name'];
                    $postName = @$h_userss['post_ad_name'];
                    $date_posted = @$h_userss['post_date'];
                    $date_mod = @$h_userss['post_date_mod'];
                    $date_posted_con = date("d M Y",strtotime("$date_posted"));
                    $date_mod_con = date("d M Y",strtotime($date_mod));

                    echo '
                    <h6 class="font_body">
                        <a href="'.BASE_URL.LOCAL_HEADLINE_URL.$id.'/'.$slughh.'/'.'" data-ajax="false">'.$title.'</a></h6>
                    <img class="img-responsive img-body" style="max-height: 165px !important;" alt="Image Loading..." src="'.BASE_URL.LOCAL_HEADLINE_IMAGE_URL.$image.'"/>
                    <hr class="hr_title">
                        ';
                }
                echo ' 
                    </div>     
                    <div class="panel-footer"></div>
                    </div>
                    </div>
                    
                ';
            }else{
                echo '
                            <h3 class="font_body"><a style="text-decoration: none;">No post in this section yet...</a></h3></div></div></div>';
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}