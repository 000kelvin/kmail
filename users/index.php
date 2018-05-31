<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 16/11/2017
 * Time: 05:33 PM
 */
    @$searched = $_GET['user'];
    $page_title = 'user - '.$searched;
    require_once ("../header.inc.php");
    require ("../_autoloader/manage.php");
    spl_autoload_register(function ($c){
        include '../_classes/'.$c.'.php';
    });
    try {
        $db = new pdo_dbconnections('localhost', 'root', '', 'kely_users');
        $ser = new search('localhost', 'root', '', 'kel_local');
        $pur = new secureInput();
        $car = new users('localhost', 'root', '', 'kel_local');

    }catch (Exception $e){
        echo $e->getMessage(),"\n";
    }

    try {
            @$search = $_GET['user'];
            @$search = $db->escapeString($search);
            @$search = $pur->hmtl_pur($search);
            if (isset($_GET["page"])){
                $page = $_GET["page"];
            }else{$page = 1;}
            $start = ($page - 1)*3;
            $no = 10;
            $userd = $car->searchs('post', @$search, '*', NULL, 'id DESC', $start.','.$no );
            $userds = $car->searchs('headline', @$search, '*', NULL, 'id DESC', $start.','.$no );
            $dba = $db->select('users', '*', NULL, "user='$search'");
            if ((count($userd) > 0) || (count($userds)) && (!empty(@$search))) {
                echo'<div class="page-header">';
                echo'<h4 class="font_body" style="font-weight:normal !important;">News by <b>'.$search.'</b>...</h4>';
                foreach ($dba as $dbs) {
                    echo '<div style="margin-left: 15px;">'.$dbs['description'].'</div>';
                    $fb = $dbs['facebook'];
                    $tw = $dbs['twitter'];
                    $ins = $dbs['instagram'];

                    if($fb != ''){

                    }
                    if($tw != ''){

                    }
                    if($ins != ''){

                    }
                }
                echo'</div>';
                //headline--
                foreach ($userds as $usersd) {
                    $id = @$usersd["id"];
                    $title = @$usersd['post_title'];
                    $slug = @$usersd['post_slug'];
                    $image = @$usersd['post_image_name'];
                    $postName = @$usersd['post_ad_name'];
                    $date_posted = @$usersd['post_date'];
                    $date_mod = @$usersd['post_date_mod'];
                    $post_con = @$usersd['post_cont'];
                    $post_con = html_entity_decode($post_con);
                    $post_con = htmlspecialchars_decode($post_con);
                    $post_con = str_replace('----', '', $post_con);
                    $date_posted_con = date("d M Y",strtotime("$date_posted"));
                    $date_mod_con = date("d M Y",strtotime($date_mod));
                    $post_cat = @$usersd['post_cat'];
                    $cat = explode(',', $post_cat);
                    @$post_con_red = $ser->chard($post_con);
                    echo '
                                <div class="body1" >
                                    <div class="col-xs-4"><img class="img-responsive img-body" alt="Image Loading..." style="max-height: 165px !important; min-height: 70px !important;" src="'.BASE_URL.LOCAL_HEADLINE_IMAGE_URL.$image.'"/></div>

                                    <div class="col-xs-8">';
                    foreach ($cat as $cate){
                        $bg = $ser->bg($cate);
                        echo '<span class="'.$bg.'"><b>&nbsp;<a class="mobile-links" style="text-decoration: none; color: inherit !important;" href="'.BASE_URL.POST_URL.'?post='.strtolower($cate).'">'.$cate.'&nbsp;</a></b></span>'.' ';
                    }
                    echo '<h4><a class="mobile-links" style=" text-decoration: blink; color: inherit !important;" href="'.BASE_URL.LOCAL_HEADLINE_URL.$id.'/'.$slug.'/'.'">'.$title.'</a></h4>
                                    <h6>Posted: '.$date_posted_con.' by <a class="mobile-links" href="'.BASE_URL.USER_URL.'?user='.$postName.'">'.$postName.'</a></h6>
                                    <h5>'.@$post_con_red.'...</h5>
                                    </div>

                                    <div class="col-xs-12"><br></div>


                                    </div>

                                ';
                }

                foreach ($userd as $users) {
                    $id = @$users["id"];
                    $title = @$users['post_title'];
                    $image = @$users['post_image_name'];
                    $postName = @$users['post_ad_name'];
                    $date_posted = @$users['post_date'];
                    $date_mod = @$users['post_date_mod'];
                    $post_con = @$users['post_cont'];
                    $date_posted_con = date("d M Y",strtotime("$date_posted"));
                    $date_mod_con = date("d M Y",strtotime($date_mod));
                    $post_cat = @$users['post_cat'];
                    $cat = explode(',', $post_cat);
                    @$post_con_red = $ser->chard($post_con);
                    echo '
                                <div class="body1" >
                                    <div class="col-xs-4"><img class="img-responsive img-body" style="max-height: 165px !important;" alt="Image Loading..." src="../local/imagep/'.$image.'"/></div>
                                    
                                    <div class="col-xs-8">';
                    foreach ($cat as $cate){
                        $bg = $ser->bg($cate);
                        echo '<span class="'.$bg.'"><b>&nbsp;<a class="mobile-links" style=" text-decoration: none; color: inherit !important;" href="'.POST_URL.'?post='.strtolower($cate).'">'.$cate.'&nbsp;</a></b></span>'.' ';
                    }
                    echo '<h4><a class="mobile-links" style="text-decoration: blink; color: inherit !important;" href="'.BASE_URL.LOCAL_POST_URL.$id.'/'.$slug.'/">'.$title.'</a></h4>
                                    <h6>Posted: '.$date_posted_con.' by <a class="mobile-links" href="'.BASE_URL.USER_URL.'?user='.$postName.'">'.$postName.'</a></h6>
                                    <h5>'.@$post_con_red.'...</h5>
                                    </div>
                                    
                                    <div class="col-xs-12"><br></div>
                                    
                                    
                                    </div>
                                   
                                ';
                }
                echo '<div class="body1" >';
                $pager = $car->page('post', $search, '*', NULL, NULL, $page, $no);
                echo '</div>';
            }else{
                echo '<div class="body1" >
                                        <div class="page-header">
                                            <h4 class="font_body">...No Data</h4>
                                        </div>
                                        Sorry, there is no data found for that query.
                                        <p><b>Return to your previous location: </b><a class="mobile-links" href="'.@$_SERVER['HTTP_REFERER'].'">here</a></p></div>';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    require_once ("../footer.inc.php")
    ?>




