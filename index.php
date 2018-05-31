<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 25/10/2017
 * Time: 01:20 PM
 */
    include('panel/visitor_tracking.php');
    $page_title = 'local news segment';
    require_once ("header.inc.php");

    require ("_autoloader/manage.php");
    spl_autoload_register(function ($c){
        include '_classes/'.$c.'.php';
    });
    try {
        $db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');
        $ser = new search('localhost', 'root', '', 'kel_local');
        $pur = new secureInput();
        $hot = new hotStories();
        $adverts = new advertisements();

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
                $slug = @$users['post_slug'];
                $image = @$users['post_image_name'];
                $postName = @$users['post_ad_name'];
                $date_posted = @$users['post_date'];
                $date_mod = @$users['post_date_mod'];
                $date_posted_con = date("d M Y",strtotime("$date_posted"));
                $date_mod_con = date("d M Y",strtotime($date_mod));
                $post_cat = @$users['post_cat'];
                $cat = explode(',', $post_cat);
                echo '
                    <div class="body1 col-xs-12" >
                        <div class="page-header" id="'.$title.'">
                            <h3 class="font_body">
                            <a href="'.BASE_URL.LOCAL_HEADLINE_URL.$id.'/'.$slug.'/" data-ajax="false">'.$title.'</a>
                            </h3>
                        </div>
                        <img class="img-responsive img-body" alt="Image Loading..." src="'.LOCAL_HEADLINE_IMAGE_URL.$image.'"/>
                        <h6> Date Posted: '.$date_posted_con.' | Date Updated: '.$date_mod_con.' | ';
                        foreach ($cat as $cate){
                            $bg = $ser->bg($cate);
                            echo '<span class="'.$bg.'"><b>&nbsp;<a style="text-decoration: none; color: inherit !important;" href="'.BASE_URL.POST_URL.'?post='.strtolower($cate).'">'.$cate.'&nbsp;</a></b></span>'.' ';
                        }
                echo' | <b><a style="text-decoration: none;" href="'.BASE_URL.USER_URL.'?user='.$postName.'">'.$postName.'</a></b></h6>
                    </div>
                    ';
            }
        }else{
            echo '<div class="body1 col-xs-12" ><div class="page-header">
                            <h3 class="font_body"><a style="text-decoration: none;">No post in this section yet...</a></h3></div></div>';
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    // -----Headliner

    // OtherPosts-----
    try{
        $p_userd = $db->select('post', '*', NULL, NULL, 'id DESC', 20);
        echo '
        
            <div class="body1 col-xs-12 col-sm-8 col-md-8 col-lg-8">
        ';
        if (count($p_userd) > 0) {
            foreach ($p_userd as $p_users) {
                $id = @$p_users['id'];
                $title = @$p_users['post_title'];
                $slugp = @$p_users['post_slug'];
                $image = @$p_users['post_image_name'];
                $postName = @$p_users['post_ad_name'];
                $date_posted = @$p_users['post_date'];
                $date_mod = @$p_users['post_date_mod'];
                $date_posted_con = date("d M Y",strtotime("$date_posted"));
                $date_mod_con = date("d M Y",strtotime($date_mod));
                $post_cat = @$p_users['post_cat'];
                $cats = explode(',', $post_cat);
                echo '
                        <div class="page-header" id="'.$title.'">
                            <h3 class="font_body">
                            <a href="'.BASE_URL.LOCAL_POST_URL.$id.'/'.$slugp.'/'.'" data-ajax="false">'.$title.'</a>
                            </h3>
                        </div>
                        <img class="img-responsive img-body" alt="Image Loading..." src="'.LOCAL_POST_IMAGE_URL.$image.'"/>
                        <h6> Date Posted: '.$date_posted_con.' | Date Updated: '.$date_mod_con.' | ';
                        foreach ($cats as $cate){
                            $bg = $ser->bg($cate);
                            echo '<span class="'.$bg.'"><b>&nbsp;<a style="text-decoration: none; color: inherit !important;" href="'.BASE_URL.POST_URL.'?post='.strtolower($cate).'">'.$cate.'&nbsp;</a></b></span>'.' ';
                        }
                echo ' | <b><a style="text-decoration: none;" href="'.BASE_URL.USER_URL.'?user='.$postName.'">'.$postName.'</a></b></h6>   
                  ';
            }
        }else{
            echo '<div class="body1 col-xs-12 col-sm-8 col-md-8 col-lg-8" ><div class="page-header">
                            <h3 class="font_body"><a style="text-decoration: none;">No post in this section yet...</a></h3></div></div>';
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    // -----OtherPosts

    // ----adverts
    $ad = $adverts->local_bottom('kelvin', ADVERTS_IMAGE, 'ad1.jpg', BASE_URL.'/contact/', 'Advertise with us', 'max-height: 165px !important;', 'img-responsive img-body', 'advert_1');
    echo $ad;
echo '</div>';
    // adverts----
    ?>

    <?php echo'<script type="text/javascript">
        var h = $(document).height();
    </script>'; ?>

    <?php

    // hotStories-----
    $disp = $hot->display($db);
    echo $disp;
    $db->disconnect();
    // -----hotStories

    require_once ("footer.inc.php")
?>


