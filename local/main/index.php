<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 27/10/2017
 * Time: 05:24 PM
 */
require ("../../_autoloader/manage.php");
spl_autoload_register(function ($c){
    include '../../_classes/'.$c.'.php';
});
try {
    $db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');
    $red = new redirect();
    $pur = new secureInput();
    $hot = new hotStories();
}catch (Exception $e){
    echo $e->getMessage(),"\n";
}

// retrieve posts----
//$id = $_GET['id'];
$request_url = $_SERVER['REQUEST_URI'];
$url_array = explode('/', $request_url);
$id = $url_array[5];
$sexy_title = $url_array[6];
$path = 'http://localhost/kmail/';
$id = $db->escapeString($id);
$id = $pur->hmtl_purss($id);
$sexy_title = $db->escapeString($sexy_title);
$sexy_title = $pur->hmtl_purss($sexy_title);
$post = $db->select('headline', '*', NULL, 'id ='.$id, 'id DESC');
$sexy = $db->select('headline', '*', NULL, "post_slug = '$sexy_title'");
$post_image = $db->select('news_imageh', '*', 'headline', 'news_imageh.post_title_md = headline.post_title_md AND news_imageh.image_date = headline.post_date AND news_imageh.image_time = headline.post_time', 'image_id DESC', 5);
foreach ($post_image as $post_images){
    $p_image = $post_images['image_name'];
    $p_images[] = $p_image;
}
if(!preg_match('/^\d+$/', $id) || $post === array() || $sexy === array()){
    $red->local('http://localhost/kmail/');
    exit;
}

foreach ($post as $posts) {
    $title = @$posts['post_title'];
    $page_title = $title;
    require_once ("../../header.inc.php");
    $image = @$posts['post_image_name'];
    $cont = @$posts['post_cont'];
    $cont = html_entity_decode($cont);
    $cont = htmlspecialchars_decode($cont);
    $postName = @$posts['post_ad_name'];
    $date_posted = @$posts['post_date'];
    $date_mod = @$posts['post_date_mod'];
    $date_posted_con = date("d M Y", strtotime("$date_posted"));
    $date_mod_con = date("d M Y", strtotime($date_mod));

    $news = explode("----", $cont);
    $count = count($news);

    echo '<div class="col-sm-12 reporting">' . $title . '
              <hr class="hr_title">
          <div class="reports"><strong>Posted by: </strong>' . $postName . '<br />
                                        <strong>Date posted: </strong>' . $date_posted_con . '&nbsp;&nbsp;&nbsp; <strong>Date Edited: </strong>' . $date_mod_con . '
                <hr class="hr_title"></div>
                <img class="img-responsive img-body" alt="Image Loading..." src="'.$path.'local/imageh/'.$image.'"/>
                <div class="col-sm-12"><hr class="hr_title"></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-sm-12"><hr class="hr_title"></div>
            </div>
            <div class="body1 col-xs-12 col-sm-8 col-md-8 col-lg-8" style="font-size: 15px; text-align: left;">';

        foreach($news as $key => $value)
        {
            if(--$count <= 0)
            {
                echo $value.'<br>';
                break;
            }
            echo $value.'<br>';
            if(!empty($p_images)) {
                echo '<br><div><img class="img-responsive img-body" alt="Image Loading..." src="'.$path.'local/imageh_r/' . @$p_images[$key] . '"/></div><br>';
            }
            ;
        }

        echo '<div class="col-lg-12"><hr class="hr_title"></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-lg-12"><hr class="hr_title"></div>';
                $cmtx_identifier = $id;
                $cmtx_reference = $title;
                $cmtx_folder = '/kmail/comments/upload';
    require ($_SERVER['DOCUMENT_ROOT'].$cmtx_folder.'/frontend/index.php');
    echo'</div>';?>

    <script type="text/javascript">
       var h = $(document).height();
       var w = $(document).width();


    </script>

    <?php
    // hotStories-----
    $disp = $hot->display($db);
    echo $disp;
    $db->disconnect();
    // -----hotStories



}

// ----retrieve posts



require_once ("../../footer.inc.php");

