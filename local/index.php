<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 27/10/2017
 * Time: 05:24 PM
 */
    require ("../_autoloader/manage.php");
    spl_autoload_register(function ($c){
        include '../_classes/'.$c.'.php';
    });
    try {
        $db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');
        $red = new redirect();
        $pur = new secureInput();
    }catch (Exception $e){
        echo $e->getMessage(),"\n";
    }

    // retrieve posts----
    $id = $_GET['id'];
    $id = $db->escapeString($id);
    $id = $pur->hmtl_pur($id);
    $post = $db->select('post', '*', NULL, 'id ='.$id, 'id DESC');

    if($id == ''){
        $red->local('../');
        exit;
    }

    foreach ($post as $post) {
        $title = @$post['post_title'];
        require_once ("../header.inc.php");
        $image = @$post['post_image_name'];
        $cont = @$post['post_cont'];
        $postName = @$post['post_ad_name'];
        $date_posted = @$post['post_date'];
        $date_mod = @$post['post_date_mod'];
        $date_posted_con = date("D M Y", strtotime("$date_posted"));
        $date_mod_con = date("D M Y", strtotime($date_mod));

        echo '<div class="col-sm-12 report">' . $title . '
              <hr class="hr_title">
          <div class="reports"><strong>Posted by: </strong>' . $postName . '<br />
                                        <strong>Date posted: </strong>' . $date_posted_con . '&nbsp;&nbsp;&nbsp; <strong>Date Edited: </strong>' . $date_mod_con . '
        <hr class="hr_title"></div>
                <img class="img-responsive img-body" alt="Image Loading..." src="images/'.$image.'"/>
                <div class="col-sm-12"><hr class="hr_title"></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-lg-4"><div style="background-color: red; height: 20px;"></div></div>
                <div class="col-sm-12"><hr class="hr_title"></div>
            </div>
            <div class="col-sm-12 " style="margin-left: 30px; font-size: 15px;  max-width: 860px; text-align: left;">'
            .$cont.
            '</div>
        ';


    }

// ----retrieve posts



    require_once ("../footer.inc.php");

