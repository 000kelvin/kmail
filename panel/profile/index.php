<?PHP
       $requiredUserLevel = array(1,2,3,4);
       $cfgProgDir = '../';
        include($cfgProgDir . "secure.php");
		include("check.php");
		error_reporting(E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>kelymail admin page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    
    <!-- NProgress -->
    <link href="../nprogress/nprogress.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">
    
    <!-- bootstrap-daterangepicker -->
    <link href="../bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">kelymail.com Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?PHP echo $login ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
         <?php
			include_once("side-bar.php");
			?>
        </nav>

        <div id="page-wrapper">

          <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
<div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active" style="color:#F90;">
                                <i class="fa fa-dashboard"></i> Admin profile page
                          </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <!--<img class="img-responsive avatar-view" src="../images/picture.jpg" alt="Avatar" title="<?PHP echo $login ?>">-->
                        </div>
                      </div>
                      <h3><?PHP echo $login ?></h3>
                      <ul class="list-unstyled user_data">
                          <li><i class="fa fa-user user-profile-icon"></i>  <?php echo $row_locations['rank']; ?>
                          </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i>  <?php echo $row_locations['location']; ?>
                        </li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $row_locations['profession']; ?>
                        </li>
                        
                        <li class="m-top-xs">
                          <i class="fa fa-calendar user-profile-icon"></i> <?php echo $row_locations['date']; ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i> <?php echo $row_locations['rank']; ?>
                        </li>
                      </ul>

                      <!-- start skills -->
                      <br>
                      <h4><b>Skills</b></h4>
                      ...coming soon
                      <!--<ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                         <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul>-->
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <!--<div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>-->
                      <!-- start of user-activity-graph -->
                      <!--<div id="graph_bar" style="width:100%; height:280px;"></div>-->
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Local news</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">International news</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Admin rankings</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                                  <h3 class="date text-info">24</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message">
                                  <?php echo $row_locations1['title']; ?>
                                  </blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations1['time'])); echo"&nbsp;&nbsp;"; echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations1['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations1['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations2['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations2['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations2['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations2['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations3['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations3['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations3['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations3['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations4['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations4['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations4['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations4['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations5['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations5['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations5['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations5['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations6['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations6['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations6['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations6['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations7['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations7['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations7['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations7['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations8['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations8['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations8['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations8['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations9['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations9['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations9['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations9['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations10['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations10['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations10['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations10['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations11['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations11['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations11['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations11['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations12['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations12['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations12['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations12['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations13['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations13['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations13['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations13['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations14['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations14['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations14['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations14['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">Local</h4>
                                  <blockquote class="message"><?php echo $row_locations15['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locations15['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locations15['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locations15['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              <li>
                              
                              

                            </ul>
                            <!-- end recent activity -->

                          </div>
                          
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab3">

                            <!-- start recent activity -->
                            <ul class="messages">
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                                  <h3 class="date text-info">24</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message">
                                  <?php echo $row_locationsd1['title']; ?>
                                  </blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd1['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd1['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd1['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd2['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd2['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd2['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd2['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd3['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd3['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd3['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd3['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->

                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd4['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd4['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd4['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd4['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd5['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd5['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd5['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd5['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd6['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd6['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd6['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd6['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd7['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd7['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd7['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd7['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd8['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd8['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd8['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd8['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd9['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd9['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd9['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd9['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd10['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd10['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd10['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd10['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd11['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd11['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd11['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd11['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd12['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd12['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd12['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd12['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd13['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd13['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd13['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd13['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd14['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd14['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd14['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd14['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              
                              <li>
                                <!--<img src="images/img.jpg" class="avatar">-->
                                <!--<div class="message_date">
                               <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>-->
                                <div class="message_wrapper">
                                  <h4 class="heading">International</h4>
                                  <blockquote class="message"><?php echo $row_locationsd15['title']; ?></blockquote>
                                  &nbsp;&nbsp; <?php echo date("h:i A",strtotime($row_locationsd15['time'])); echo"&nbsp;&nbsp;"; echo date("D M Y",strtotime($row_locationsd15['date_time']));?>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo $row_locationsd15['link']; ?>"><i class="fa fa-info"></i> Check it out </a>
                                  </p>
                                </div>
                              </li>
                              <li>
                              
                              

                            </ul>
                            <!-- end recent activity -->

                          </div>
                          
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Admin rank</th>
                                  <th>Activities to manage</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Administrator moderator</td>
                                  <td>This admininstrator can access the local, international, jobs, action and reported stories segments only.</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Administrator moderator 2</td>
                                  <td>This administrator can access all three segments listed above plus the feedback segment only.</td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Administrator moderator 3</td>
                                  <td>This administrator can access all four segments listed above plus the visits segment. </td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>kely</td>
                                  <td>This administrator has the rights to access all segments</td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          
                          <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                            <p> <?php echo $row_locations['description']; ?> </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
                <!-- /.row -->

                <div class="row"></div>
            <!-- /.row -->

            <div class="row"></div>
              <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
     <!-- jQuery -->
    <script src="../jquery/dist/jquery.min.js"></script>
    
    <!-- FastClick -->
    <script src="../fastclick/lib/fastclick.js"></script>
    
    <!-- NProgress -->
    <script src="../nprogress/nprogress.js"></script>
    
    <!-- morris.js -->
    <script src="../raphael/raphael.min.js"></script>
    <script src="../morris.js/morris.min.js"></script>
    
     <!-- bootstrap-progressbar -->
    <script src="../bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../moment/min/moment.min.js"></script>
    <script src="../bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
      $(function() {
        Morris.Bar({
          element: 'graph_bar',
          data: [
            { "period": "Jan", "Hours worked": 80 }, 
            { "period": "Feb", "Hours worked": 125 }, 
            { "period": "Mar", "Hours worked": 176 }, 
            { "period": "Apr", "Hours worked": 224 }, 
            { "period": "May", "Hours worked": 265 }, 
            { "period": "Jun", "Hours worked": 314 }, 
            { "period": "Jul", "Hours worked": 347 }, 
            { "period": "Aug", "Hours worked": 287 }, 
            { "period": "Sep", "Hours worked": 240 }, 
            { "period": "Oct", "Hours worked": 211 }
          ],
          xkey: 'period',
          hideHover: 'auto',
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          ykeys: ['Hours worked', 'sorned'],
          labels: ['Hours worked', 'SORN'],
          xLabelAngle: 60,
          resize: true
        });

        $MENU_TOGGLE.on('click', function() {
          $(window).resize();
        });
      });
    </script>

    <!-- datepicker -->
    <script type="text/javascript">
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
        }

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /datepicker -->

</body>

</html>
