<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8"/>

    <meta http-equiv="Content-Type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <meta name="description" content="News">
    <meta name="keywords" content="connection, networking, information" />
    <meta property="og:url"           content="http://www.kelymail.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Home...kelymail" />
    <meta property="og:description"   content="News...news...news" />
    <meta property="og:image"    content="http://www.kelymail.com/imgs_header/logo3.png" />

    <title>
        <?php
        ob_start();
        define('BASE_URL','/kmail/');
        define('LOCAL_HEADLINE_URL', 'local/main/index.php/');
        define('LOCAL_POST_URL', 'local/index.php/');
        define('LOCAL_HEADLINE_IMAGE_URL', 'local/imageh/');
        define('LOCAL_POST_IMAGE_URL', 'local/imagep/');
        define('POST_URL', 'posts/');
        define('USER_URL', 'users/');
        define('ADVERTS_IMAGE', 'imgs_adverts/');
        if (isset($page_title) && !empty($page_title)){
            echo 'kelymail...'.$page_title;
        }else{
            echo 'kelymail...';
        }
        ?>
    </title>
    <link rel="shortcut icon" href="<?php echo BASE_URL ?>imgs_header/logo3.png" type="image/x-icon">
    <link href="<?php echo BASE_URL ?>style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL ?>styles.css" rel="stylesheet" type="text/css" />
<!--    <link href="--><?php //echo BASE_URL ?><!--e_style.css" rel="stylesheet" />-->
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <link href="e_style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL ?>bootstrap-3.3.0-dist/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--    <link rel="stylesheet" id="font-awesome-css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" media="screen">-->
    <link rel="stylesheet" id="font-awesome-css" href="<?php echo BASE_URL ?>font-awesome/css/font-awesome.css" type="text/css" media="screen">

    <link rel="script" href="<?php echo BASE_URL ?>jquery/jquery.mobile.min.js">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>css/bootstrap.min.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo BASE_URL ?>jquery/jquery.mobile.min.css" type="text/css" >
    <link rel="script" href="<?php echo BASE_URL ?>js/bootstrap.min.js">

    <!--    -->
    <script src="<?php echo BASE_URL ?>jquery/jquery-1.11.3.min.js"></script>
    <!--    <script src="jquery/jquery.mobile.min.js"></script>-->
    <script src="<?php echo BASE_URL ?>js/bootstrap.min.js"></script>


    <style>

        .back-to-top {
            background: none;
            margin: 0;
            position: fixed;
            bottom: 0;
            right: 0;
            width: 70px;
            height: 70px;
            z-index: 100;
            display: none;
            text-decoration: none;
            color: #ffffff;
        }

        .back-to-top i {
            font-size: 60px;

        }

        .email{

        }

        /*.search{*/
            /*width: 140px !important;*/
            /*-webkit-transition: width 0.4s ease-in-out;*/
            /*transition: width 0.4s ease-in-out;*/
        /*}*/

        /*.search:focus{*/
            /*width: 200px !important;*/
        /*}*/
    </style>
</head>

<body onload=display_ct();>
<!--top of page from bottom-->
<a name="top"></a>
<!--close top of page from bottom-->


<div class="container-fluid" style="max-width:1000px">
    <div class="row" id="main_body">

        <!--open header-->
        <!--topmost headers-->
        <div>
            <!--
               Facebook like and share page
            -->
            <div class="col-lg-3">
                <div style="background-color: red; height: 20px;"></div>
                <!--<div id="fb-root"></div>-->
                <!--<script>(function(d, s, id) {-->
                <!--  var js, fjs = d.getElementsByTagName(s)[0];-->
                <!--  if (d.getElementById(id)) return;-->
                <!--  js = d.createElement(s); js.id = id;-->
                <!--  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";-->
                <!--  fjs.parentNode.insertBefore(js, fjs);-->
                <!--}(document, 'script', 'facebook-jssdk'));</script>-->
                <!---->
                <!--<div class="fb-like" data-href="https://www.facebook.com/kelymail/" data-width="60" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>-->
            </div>
            <!--
             Close facebook frame
            -->
            <!--
               Twitter like and share page
            -->
            <div class="col-lg-3">
                <div style="background-color: red; height: 20px;"></div>
                <!--<a href="https://twitter.com/ToluwaniAdewale" class="twitter-follow-button" data-show-count="false">Follow @ToluwaniAdewale</a>-->
                <!--<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>-->
            </div>
            <!--
             Close twitter frame
            -->

            <!--
               Weather widget
            -->
            <!-- weather widget start -->
            <div class="col-lg-3">
                <div style="background-color: red; height: 20px;"></div>
                <!--<a href="//www.booked.net/weather/lagos-14299"><img src="//w.bookcdn.com/weather/picture/21_14299_1_1_3658db_250_2a48ba_ffffff_ffffff_1_2071c9_ffffff_0_3.png?scode=124&domid=w209" /></a>-->
            </div>
            <!-- weather widget end -->
            <!--
               Weather widget
            -->

            <!--javascript date and time-->
            <div class="col-lg-3">
                <div style="background-color: red; height: 20px;"></div>
                <!--<script type="text/javascript">-->
                <!--function display_c(){-->
                <!--var refresh=1000; // Refresh rate in milli seconds-->
                <!--mytime=setTimeout('display_ct()',refresh)-->
                <!--}-->
                <!---->
                <!--function display_ct() {-->
                <!--var strcount-->
                <!--var x = new Date()-->
                <!--var x1=x.toUTCString();// changing the display to UTC string-->
                <!--document.getElementById('ct').innerHTML = x1;-->
                <!--tt=display_c();-->
                <!--}-->
                <!--</script>-->
                <!---->
                <!---->
                <!--<span id='ct' ></span>-->

            </div>

        </div>
        <!--close the last of the topmost header-->

        <!--nav bar dropdown and stuff-->

        <nav class="navbar navbar-inverse" id="navbar" style="background-color:#3b5998; border:none; border-radius:0px; margin-top:33px;">


            <div class="container-fluid">
                <div class="navbar-header" style="margin-left:30px; width: 50px;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>


                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav" style="font-size: 13px;">
                        <li class="<?php if ($_SERVER['PHP_SELF'] == "/kmail/index.php" || substr($_SERVER['PHP_SELF'], 0, 28) == "/kmail/local/main/index.php/" || $_SERVER['PHP_SELF'] == "/kmail/local/index.php") echo 'active'; ?> dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-weight:bold;  text-shadow:none; margin-left:15px; max-width: 240px;">News <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="<?php if ($_SERVER['PHP_SELF'] == "/kmail/index.php" || substr($_SERVER['PHP_SELF'], 0, 28) == "/kmail/local/main/index.php/" || $_SERVER['PHP_SELF'] == "/kmail/local/index.php") echo 'active';?>"><a href="<?php echo BASE_URL ?>index.php" data-ajax="false">Local</a></li>
                                <li class="<?php if ($_SERVER['PHP_SELF'] == "/kmail/foreign/index.php" || $_SERVER['PHP_SELF'] == "/kmail/foreign/main.php") echo 'active';?>"><a href="<?php echo BASE_URL ?>foreign" data-ajax="false">Foreign</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo ($_SERVER['PHP_SELF'] == "/kmail/jobs/"?"active":"")?>">
                            <a href="#" data-ajax="false" style="font-weight:bold; text-shadow:none; color:#FFFFFF; margin-left:12px;">Jobs</a>
                        </li>

                        <li class="<?php echo ($_SERVER['PHP_SELF'] == "/kmail/report/"?"active":"")?>">
                            <a href="<?php echo BASE_URL ?>report" data-ajax="false" style="font-weight:bold; color:#FFFFFF; text-shadow:none; margin-left:12px;">Report a story</a>
                        </li>

                        <li class="<?php echo ($_SERVER['PHP_SELF'] == "/kmail/forum/"?"active":"")?>">
                            <a href="<?php echo BASE_URL ?>forum" data-ajax="false" style="font-weight:bold; color:#FFFFFF; text-shadow:none; margin-left:12px;">Forum</a>
                        </li>

                        <li>
                            <script type="text/javascript">

                                function submitdata()
                                {
                                    var email = $('#emailt').val();
                                    if($.trim($('#emailt').val()) == ''){
                                        alert('Please enter first name.');
                                        return false;
                                    }
                                    $.ajax({

                                        type: 'POST',
                                        url: "<?php echo BASE_URL ?>subscribe.php",
                                        data: {
                                            e_mail: email
                                        },

                                        dataType: "json",

                                        success: $('#emailt').fadeOut('slow', function () {
                                            $('#emailt').fadeIn('slow').val('...email registered!').attr('disabled','disabled')
                                        })
                                    });


                                        return false;
                                }

                            </script>
                            <form onsubmit="return submitdata();" id ="email" name="email" method="post" style="padding-top: 8px;  margin-left:12px;">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span> </span>
                                    <input id="emailt" name="emailt" style="width: 190px !important;" class="form-control" placeholder="...enter email to subscribe..." type="email" ><p id="success_para" ></p>
                                </div>
                            </form>

                        </li>

                        <li>
                            <form name="search" data-ajax="false" action="<?php echo BASE_URL ?>search/" method="GET" style="padding-top: 8px;  margin-left:12px;">
                                <div class="input-group">
                                    <?php
                                    if (isset($_POST['search'])) {
                                        $search = "";
                                        $search = $_POST['search'];
                                    }
                                    ?>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> </span>
                                    <input id="search" name="search" value="<?php echo @$_GET['search'] ?>" style="width: 190px !important;" class="form-control" placeholder="...enter your query..." type="text" required>
                                </div>
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!--nav to head-->
        <!--close nav to head-->
        <!--close header-->