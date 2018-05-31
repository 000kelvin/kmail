<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 25/10/2017
 * Time: 01:20 PM
 */
    require_once ("header.inc.php");

    require ("_autoloader/manage.php");
    spl_autoload_register(function ($c){
        include '_classes/'.$c.'.php';
    });
    try {
        $db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');
        $pur = new secureInput();

    }catch (Exception $e){
        echo $e->getMessage(),"\n";
    }

    // Headliner-----
    try {
        $userd = $db->select('headline', '*', NULL, NULL, 'id DESC', 1);
        if (count($userd) > 0) {
            foreach ($userd as $users) {
                $id = @$users['id'];
                $title = @$users['post_title'];
                $image = @$users['post_image_name'];
                $postName = @$users['post_ad_name'];
                $date_posted = @$users['post_date'];
                $date_mod = @$users['post_date_mod'];
                $date_posted_con = date("D M Y",strtotime("$date_posted"));
                $date_mod_con = date("D M Y",strtotime($date_mod));
                $post_cat = @$users['post_cat'];
                echo '
                    <div class="body1 col-xs-12" >
                        <div class="page-header">
                            <h3 class="font_body">
                            <a href="local/main.php?id='.$id.'" data-ajax="false">'.$title.'</a>
                            </h3>
                        </div>
                        <img class="img-responsive img-body" alt="Image Loading..." src="imgs_body/'.$image.'"/>
                        <h6> Date Posted: '.$date_posted_con.' | Date Updated: '.$date_mod_con.' | '.$post_cat.' | <b><a href="#">'.$postName.'</a></b></h6>
                    </div>
                    ';
            }
        }else{
            echo 'No post in this section yet...';
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    // -----Headliner

    // OtherPosts-----
    try{
        $p_userd = $db->select('post', '*', NULL, NULL, 'id DESC');
        echo '
        <div class="col-xs-12">
            <div class="body1 col-xs-8">
        ';
        if (count($p_userd) > 0) {
            foreach ($p_userd as $p_users) {
                $id = @$p_users['id'];
                $title = @$p_users['post_title'];
                $image = @$p_users['post_image_name'];
                $postName = @$p_users['post_ad_name'];
                $date_posted = @$p_users['post_date'];
                $date_mod = @$p_users['post_date_mod'];
                $date_posted_con = date("D M Y",strtotime("$date_posted"));
                $date_mod_con = date("D M Y",strtotime($date_mod));
                $post_cat = @$p_users['post_cat'];
                echo '
                        <div class="page-header">
                            <h3 class="font_body">
                            <a href="local/post.php?id='.$id.'" data-ajax="false">'.$title.'</a>
                            </h3>
                        </div>
                        <img class="img-responsive img-body" alt="Image Loading..." src="imgs_body/'.$image.'"/>
                        <h6> Date Posted: '.$date_posted_con.' | Date Updated: '.$date_mod_con.' | '.$post_cat.' |<b><a href="#">'.$postName.'</a></b></h6>           
                  ';
            }
        }else{
            echo 'No post in this section yet...';
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    // -----OtherPosts

    // ----adverts
    echo '<div class="advert_1"></div>
    </div>';
    // adverts----


    // hotStories-----
    try{
        $h_userd = $db->select('post', '*', NULL, NULL, 'id DESC');
        echo '<div class="body1 col-xs-4">
                        <br><br>
                <div class="panel panel-primary">
                <div class="panel-heading" style="padding-left: 2px !important;">
                 <h3 class="panel-title"><b>...hot stories!</b></h3>
                 </div>
                 <div class="panel-body" style="padding: 0 !important;">
                ';
        if (count($h_userd) > 0) {
            foreach ($h_userd as $h_users) {
                $id = @$h_users['id'];
                $title = @$h_users['post_title'];
                $image = @$h_users['post_image_name'];
                $postName = @$h_users['post_ad_name'];
                $date_posted = @$h_users['post_date'];
                $date_mod = @$h_users['post_date_mod'];
                $date_posted_con = date("D M Y",strtotime("$date_posted"));
                $date_mod_con = date("D M Y",strtotime($date_mod));

                echo '
                    <h6 class="font_body">
                        <a href="local/post.php?id='.$id.'" data-ajax="false">'.$title.'</a></h6>
                    <img class="img-responsive img-body" alt="Image Loading..." src="imgs_body/'.$image.'"/>
                        ';
            }
        echo ' 
                    </div>     
                    <div class="panel-footer"></div>
                    </div>
                    </div>
                    </div>
                ';
        }else{
            echo 'No post in this section yet...';
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    // -----hotStories

    require_once ("footer.inc.php")
?>


