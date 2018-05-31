<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 25/10/2017
 * Time: 01:20 PM
 */
    @$searched = $_GET['search'];
    $page_title = 'search - '.$searched;
    require_once ("../header.inc.php");
    require ("../_autoloader/manage.php");
    spl_autoload_register(function ($c){
        include '../_classes/'.$c.'.php';
    });
    try {
        $db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');
        $ser = new search('localhost', 'root', '', 'kel_local');
        $pur = new secureInput();

    }catch (Exception $e){
        echo $e->getMessage(),"\n";
    }

    // Search-----
    try {
        @$search = $_GET['search'];
        @$search = $db->escapeString($search);
        @$search = $pur->hmtl_pur($search);
        if (isset($_GET["page"])){
            $page = $_GET["page"];
        }else{$page = 1;}
        $start = ($page - 1)*3;
        $no = 10;
        $userd = $ser->searchs('post', @$search, '*', NULL, 'id DESC', $start.','.$no );
        $usersd = $ser->searchs('headline', @$search, '*', NULL, 'id DESC', $start.','.$no );
        if ((count($userd) > 0) || (count($usersd)) && (!empty(@$search))) {
            echo'
                 <div class="page-header">
                    <h4 class="font_body" style="font-weight:normal !important;">Search results for <b>'.$search.'</b>...</h4>
                </div>';
            //header----
            foreach ($usersd as $usersf) {
                $id = @$usersf["id"];
                $title = @$usersf['post_title'];
                $slug = @$usersf['post_slug'];
                $image = @$usersf['post_image_name'];
                $postName = @$usersf['post_ad_name'];
                $date_posted = @$usersf['post_date'];
                $date_mod = @$usersf['post_date_mod'];
                $post_con = @$usersf['post_cont'];
                $post_con = html_entity_decode($post_con);
                $post_con = htmlspecialchars_decode($post_con);
                $post_con = str_replace('----', '', $post_con);
                $date_posted_con = date("d M Y",strtotime("$date_posted"));
                $date_mod_con = date("d M Y",strtotime($date_mod));
                $post_cat = @$usersf['post_cat'];
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
                echo '<h4><a class="mobile-links" style="text-decoration: blink; color: inherit !important;" href="'.BASE_URL.LOCAL_HEADLINE_URL.$id.'/'.$slug.'/'.'">'.$title.'</a></h4>
                                <h6>Posted: '.$date_posted_con.' by <a class="mobile-links" href="'.BASE_URL.USER_URL.'?user='.$postName.'">'.$postName.'</a></h6>
                                <h5>'.@$post_con_red.'...</h5>
                                </div>
                                
                                <div class="col-xs-12"><br></div>
                                
                                
                                </div>
                               
                            ';
            }

            //other--
            foreach ($userd as $users) {
                $id = @$users["id"];
                $title = @$users['post_title'];
                $slug = @$usersf['post_slug'];
                $image = @$users['post_image_name'];
                $postName = @$users['post_ad_name'];
                $date_posted = @$users['post_date'];
                $date_mod = @$users['post_date_mod'];
                $post_con = @$users['post_cont'];
                $post_con = html_entity_decode($post_con);
                $post_con = htmlspecialchars_decode($post_con);
                $post_con = str_replace('----', '', $post_con);
                $date_posted_con = date("d M Y",strtotime("$date_posted"));
                $date_mod_con = date("d M Y",strtotime($date_mod));
                $post_cat = @$users['post_cat'];
                $cat = explode(',', $post_cat);
                @$post_con_red = $ser->chard($post_con);
                    echo '
                        <div class="body1" >
                            <div class="col-xs-4"><img class="img-responsive img-body" style="max-height: 165px !important; min-height: 70px !important;" alt="Image Loading..." src="'.BASE_URL.LOCAL_POST_IMAGE_URL.$image.'"/></div>
                            
                            <div class="col-xs-8">';
                            foreach ($cat as $cate){
                                $bg = $ser->bg($cate);
                                echo '<span class="'.$bg.'"><b>&nbsp;<a class="mobile-links" style="text-decoration: none; color: inherit !important;" href="'.POST_URL.'?post='.strtolower($cate).'">'.$cate.'&nbsp;</a></b></span>'.' ';
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
            $pager = $ser->page('post', $search, '*', NULL, NULL, $page, $no);
            echo '</div>';
        }else{
            echo '<div class="body1" >
                            <div class="page-header">
                                <h4 class="font_body">...Not Found!</h4>
                            </div>
                            Sorry, you are looking for something that is not available here!
                            <p><b>Enter a search query...<b></p>
                        </div>';
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    // -----Search

    require_once ("../footer.inc.php")
    ?>
