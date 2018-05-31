<?PHP
       $requiredUserLevel = array(1,2,3,4);
       $cfgProgDir = '../';
        include($cfgProgDir . "secure.php");

        require ("../../_autoloader/manage.php");
        spl_autoload_register(function ($c){
            include '../class/'.$c.'.php';

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
                            <a href="../profile"><i class="fa fa-fw fa-user"></i> Profile</a>
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
			include_once("../side-bar.inc.php");
			?>
        </nav>

        <div id="page-wrapper">

          <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
<div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>User Action</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active" style="color:#F90;">
                                <i class="fa fa-dashboard"></i> Admin action page
                          </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Action </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <!--<img class="img-responsive avatar-view" src="../images/picture.jpg" alt="Avatar" title="">-->
                        </div>
                      </div>
                      <h3><?PHP echo $login ?></h3>
                      <ul class="list-unstyled user_data">
                          <?php
                            $profile = new pdo_dbconnections('localhost', 'root', '', 'kely_users');
                            $sel = $profile->select('users', '*', NULL, "user='$login'");
                          foreach ($sel as $sels) {
                          echo'
                            <li><i class="fa fa-map-marker user-profile-icon"></i> '.$sels['location'].'
                            </li>
                            <li>
                              <i class="fa fa-briefcase user-profile-icon"></i> '.$sels['profession'].'
                            </li>
                            
                            <li class="m-top-xs">
                              <i class="fa fa-calendar user-profile-icon"></i> '.$sels['date'].'
                            </li>
    
                            <li class="m-top-xs">
                              <i class="fa fa-external-link user-profile-icon"></i> '.$sels['rank'].'
                            </li>
                          ';
                          }
                          ?>
                      </ul>

                      <!-- start skills -->
                      <br>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div>
                        <h2>Local </h2>
                        <hr style="background-color: #CCCCCC;"></hr>
                        <span>Note</span>: *<span>The action center enables the admin to edit or delete news posted by him.</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**<span>Note that whatever posted through this medium goes online immediately, thus all corrections and </span> <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>crooschecks should be made before news items are posted.</span>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**<span>You should fill up all information on the upload page as they are important.</span></p>
                        <table width="486" class="table table-hover" bordercolor="#CCCCCC" align="center">
                            <tr>
                                <td height="90"><p><a href="l_upload_h.php" data-ajax="false">First segment</a></p>
                                    <p><span class="alert-danger">&lt; Headline > </span></p></td>

                                <td height="90"><p><a href="l_upload_p.php" data-ajax="false">Post News</a></p>
                            </tr>
                        </table>
                        <p>&nbsp;</p>
                            </div>


                        <div id="international">
                            <h2>International </h2>
                            <hr style="background-color: #CCCCCC;"></hr>
                            <span>Note</span>: *<span>The action center enables the admin to edit or delete news posted by him.</span></p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**<span>Note that whatever posted through this medium goes online immediately, thus all corrections and </span> <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>crooschecks should be made before news items are posted.</span>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**<span>You should fill up all information on the upload page as they are important.</span></p>
                            <table width="486" class="table table-hover" bordercolor="#CCCCCC" align="center">
                                <tr>
                                    <td height="90"><p><a href="upload_h.php" data-ajax="false">First segment</a></p>
                                        <p><span class="alert-danger">&lt; Headline > </span></p></td>

                                    <td height="90"><p><a href="upload.php" data-ajax="false">Post News</a></p>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
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
