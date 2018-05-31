<?PHP
       $requiredUserLevel = array(1,2,3,4);
       $cfgProgDir = '';
        include($cfgProgDir . "secure.php");

        require ("../_autoloader/manage.php");
        spl_autoload_register(function ($c){
            include 'class/'.$c.'.php';
        });
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to kelymail admin page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                            <a href="profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
			include_once("side-bar.inc.php");
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
                                <i class="fa fa-dashboard"></i>Welcome to "kelymail.com" admin page
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo date("D") ?> <?php echo date("d") ?></div>
                                        <div><?php echo date("M") ?> <?php echo date("Y") ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="calendar.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                   
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php require_once('phpcount.php');
										$time = time();
										for($i = 0; $i < 1; $i++)
										{
											PHPCount::AddHit("page1", "127.0.0.1");
										}
										echo PHPCount::GetHits("page1");
										?></div>
                                        <div>Unique views on this page</div>
                                    </div>
                                </div>
                            </div>
                            <a href="visits.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
                                            $cc = new count('localhost', 'root', '', 'kel_local');
                                            $hh = new count('localhost', 'root', '', 'kel_local');
                                            $tt = $cc->counts('post', $login);
                                            $tt2 = $hh->counts('headline', $login);
                                            $total = $tt + $tt2;
                                            echo $total;
                                            ?></div>
                                        <div>News item posted in Local News Segment</div>
                                    </div>
                                </div>
                            </div>
                            <a href="action">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
                                            $cc = new count('localhost', 'root', '', 'kel_foreign');
                                            $hh = new count('localhost', 'root', '', 'kel_foreign');
                                            $tt = $cc->counts('post', $login);
                                            $tt2 = $hh->counts('headline', $login);
                                            $total = $tt + $tt2;
                                            echo $total;
                                            ?></div>
                                        <div>News item posted in Foreign News Segment</div>
                                    </div>
                                </div>
                            </div>
                            <a href="action#international">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> News Area Chart for the total data you've uploaded</h3><h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Note:</b> all charts update every 2-3 months</h5>
                            </div>
                            
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Feedback Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="local" class="list-group-item">
                                        <span class="badge">admin mod</span>
                                        <i class="fa fa-fw fa-newspaper-o"></i> Local
                                    </a>
                                    <a href="international" class="list-group-item">
                                        <span class="badge">admin mod</span>
                                        <i class="fa fa-fw fa-plane"></i> International
                                    </a>
                                    <a href="jobs" class="list-group-item">
                                        <span class="badge">admin mod2</span>
                                        <i class="fa fa-fw fa-suitcase"></i> Jobs
                                    </a>
                                    <a href="action" class="list-group-item">
                                        <span class="badge">admin mod2</span>
                                        <i class="fa fa-fw fa-universal-access"></i> Action
                                    </a>
                                    <a href="reported" class="list-group-item">
                                        <span class="badge">admin mod3</span>
                                        <i class="fa fa-fw fa-video-camera"></i> Reported Stories
                                    </a>
                                    <a href="feedback" class="list-group-item">
                                        <span class="badge">admin mod3</span>
                                        <i class="fa fa-fw fa-thumbs-up"></i> Feedbacks
                                    </a>
                                     <a href="visits.php" class="list-group-item">
                                        <span class="badge">kely</span>
                                        <i class="fa fa-fw fa-automobile"></i> Visits
                                    </a>
                                   
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user"></i> Administrators</h3>
                            </div>
                            <div class="panel-body">
                                <?php
									$hostname_visitors = "localhost";
									$database_visitors = "kely_users";
									$username_visitors = "root";
									$password_visitors = "";

									$connection = mysqli_connect($hostname_visitors, $username_visitors, $password_visitors, $database_visitors);

									if(!$connection)
									{
										print("Connection failed: " . mysqli_connect_error());
									}

									$sql = "SELECT * FROM users";
					                $result = mysqli_query($connection, $sql) or print(mysqli_error($connection));
									$total_res = mysqli_num_rows($result);
									$start = 0;
                                    $end = 15;
									
									echo'<div class="table-responsive">
									<table class="table table-bordered table-hover table-striped">
										<thead><tr><th>S/N</th><th>Rank</th><th>Entry Date</th><th>Username</th></tr></thead>
										';
										for($i = $start; $i < $end; $i++)
										{
											if($i == $total_res)
											{
												break;
											}
											
											if(mysqli_num_rows($result) > 0) {
												// output data of each row
												while($row = mysqli_fetch_assoc($result)) {
												echo'<tbody>';
												echo'<tr>';
												echo '<td>' . $row['primary_key'] . '</td>';
												echo '<td>' . $row['rank'] . '</td>';
												echo '<td>' . $row['date'] . '</td>';
												echo '<td>' . $row['user'] . '</td>';
												echo'</tr>';	
												}
											} else {
												echo "No data found";
											}	
											 }   
											echo'</tbody>';
										echo'</table>';
										echo'</div>';
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <?php
        $cc = new count('localhost', 'root', '', 'kel_local');
        $hh = new count('localhost', 'root', '', 'kel_foreign');
        $first_year = 2018;
        $second_year = 2019;
        $third_year = 2020;
        //the first year
        $tt = $cc->countss('post', $login, $first_year);
        $tt2 = $cc->countss('headline', $login, $first_year);
        $tt3 = $hh->countss('post', $login, $first_year);
        $tt4 = $hh->countss('headline', $login, $first_year);
        $total = $tt + $tt2;
        $totalf = $tt3 + $tt4;
        $t = $total + $totalf;

        //the second year
        $tt5 = $cc->countss('post', $login, $second_year);
        $tt6 = $cc->countss('headline', $login, $second_year);
        $tt7 = $hh->countss('post', $login, $second_year);
        $tt8 = $hh->countss('headline', $login, $second_year);
        $total2 = $tt5 + $tt6;
        $totalf2 = $tt7 + $tt8;
        $t2 = $total2 + $totalf2;

        //the third year
        $tt9 = $cc->countss('post', $login, $third_year);
        $tt10 = $cc->countss('headline', $login, $third_year);
        $tt11 = $hh->countss('post', $login, $third_year);
        $tt12 = $hh->countss('headline', $login, $third_year);
        $total3 = $tt9 + $tt10;
        $totalf3 = $tt11 + $tt12;
        $t3 = $total3 + $totalf3;
    ?>
    <script type="text/javascript">
        var first_year = "<?php echo $first_year; ?>";
        var second_year = "<?php echo $second_year; ?>";
        var third_year = "<?php echo $third_year; ?>";
        var total = "<?php echo $total; ?>";
        var totalf = "<?php echo $totalf; ?>";
        var total2 = "<?php echo $total2; ?>";
        var totalf2 = "<?php echo $totalf2; ?>";
        var total3 = "<?php echo $total3; ?>";
        var totalf3 = "<?php echo $totalf3; ?>";
        var t = "<?php echo $t; ?>";
        var t2 = "<?php echo $t2; ?>";
        var t3 = "<?php echo $t3; ?>";
    </script>
    <script src="js/plugins/morris/morris-data.js"></script>
<?php
require_once('phpcount.php');

?>
</body>

</html>
