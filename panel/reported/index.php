<?PHP
      error_reporting(0);
      $requiredUserLevel = array(1,2,3,4);
       $cfgProgDir = '../';
        include($cfgProgDir . "secure.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to kelymail admin page...reported stories</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

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
                <a class="navbar-brand" href="../index.php">kelymail.com Admin</a>
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
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
            
     <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Reported Stories Segment
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-video-camera"></i> Reported Stories
                            </li>
                        </ol>
                    </div>
      </div>
      <b>Note</b>: This search form doesnt work well on mobile phones
      <div>
        <?php

			$content ='<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
			<script type="text/javascript">
			$(function(){
			$(".search").keyup(function() 
			{ 
			var searchid = $(this).val();
			var dataString = \'search=\'+ searchid;
			if(searchid!=\'\')
			{
				$.ajax({
				type: "POST",
				url: "search.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
				$("#result").html(html).show();
				}
				});
			}return false;    
			});
			
			jQuery("#result").live("click",function(e){ 
				var $clicked = $(e.target);
				var $name = $clicked.find(\'.name\').html();
				var decoded = $("<div/>").html($name).text();
				$(\'#searchid\').val(decoded);
			});
			jQuery(document).live("click", function(e) { 
				var $clicked = $(e.target);
				if (! $clicked.hasClass("search")){
				jQuery("#result").fadeOut(); 
				}
			});
			$(\'#searchid\').click(function(){
				jQuery("#result").fadeIn();
			});
			});
			</script>
			
			<style type="text/css">
				.content{
					
				}
				#searchid
				{
					padding:10px;
					font-size:14px;
				}
				#result
				{
					position:absolute;
					padding:10px;
					display:none;
					margin-top:-1px;
					border-top:0px;
					overflow:hidden;
					border:1px #CCC solid;
					background-color: white;
				}
				.show
				{
					padding:10px; 
					border-bottom:1px #999 dashed;
					font-size:15px;
					height:50px;
				}
				.show:hover
				{
					background:#4c66a4;
					color:#FFF;
					cursor:pointer;
				}
			</style>
			
			<div class="">
			<div class="col-md-12 col-sm-12 col-xs-12 form-group">
			<input type="text" class="search form-control" id="searchid" placeholder="Search the reporeted segment...You can search through the phonenumber, email, date, time or the title of the news" /><br /> 
			<div id="result"></div>
			</div>
			</div>';
			
			
			$pre = 1;
			include("html.inc");
			?>
      </div>
      
       <div>
       <?php
		include('aconfig.php');    //include of db config file
		include ('paginate.php'); //include of paginat page

		$per_page = 15;         // number of results to show per page
		$sql = "SELECT * FROM report ORDER BY id ASC";
		$result = mysqli_query($bd, $sql);
		$total_results = mysqli_num_rows($result);
		$total_pages = ceil($total_results / $per_page);//total pages we going to have

		//-------------if page is setcheck------------------//
		if (isset($_GET['page'])) {
			$show_page = $_GET['page'];             //it will telles the current page
			if ($show_page > 0 && $show_page <= $total_pages) {
				$start = ($show_page - 1) * $per_page;
				$end = $start + $per_page;
			} else {
				// error - show first set of results
				$start = 0;
				$end = $per_page;
			}
		} else {
			// if page isn't set, show first set of results
			$start = 0;
			$end = $per_page;
		}
		// display pagination
		@$page = intval($_GET['page']);

		$tpages=$total_pages;
		if ($page <= 0)
			$page = 1;
		?>
        <?php
		$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
		echo '<div class="pagination"><ul>';
		if ($total_pages > 1) {
			echo paginate(@$reload, @$show_page, @$total_pages);
		}
		echo "</ul></div>";
		// display data in table
		echo "<div class='table-responsive'>";
		echo "<table border:1px dashed #CCC; class='table table-bordered table-hover'>";
		echo "<thead><tr><th style='width:5%;border-bottom:1px solid #CCC'>id</th><th style='width:15%;border-bottom:1px solid #CCC'>Fullname</th> <th style='width:5%;border-bottom:1px solid #CCC'>Email</th> <th style='width:5%;border-bottom:1px solid #CCC'>Phonenumber</th> <th style='width:10%;border-bottom:1px solid #CCC'>News title</th> <th style='width:100%;border-bottom:1px solid #CCC'>News</th><th style='width:5%;border-bottom:1px solid #CCC'>Image</th><th style='width:5%;border-bottom:1px solid #CCC'>Time</th><th style='width:5%;border-bottom:1px solid #CCC'>Date</th></tr></thead>";
		// loop through results of database query, displaying them in the table
		for ($i = $start; $i < $end; $i++) {
			// make sure that PHP doesn't try to show results that don't exist
			if ($i == $total_results) {
				break;
			}
			$res = mysqli_query($bd, $sql) or print(mysqli_connect_error($sql));
			//$row = mysqli_fetch_array($res);

			$id = $row['id'];

			function mysqli_result($sql, $row, $field = 'id') {
			$sql->data_seek($row);
			$data = $sql->fetch_array();

			return $data[$field];
		    }

			if(mysqli_num_rows($res) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($res)) {
			echo'<tr' . @$cls . '>';
            $name = $row['name'];
			echo '<td>' . $row['id'] . '</td>';
			//echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['fname'] . '</td>';
			echo '<td>' . $row['email'] . '</td>';
			echo '<td>' . $row['pnum'] . '</td>';
			echo '<td>' . $row['tnews'] . '</td>';
			echo '<td>' . $row['news'] . '</td>';
            echo '<td>'."<img style='width:50px; height:50px;' class='img-responsive img_body' style='' alt='' src='../../report/report/$name' />".'</td>';
			echo '<td>' . $row['hour'] . ':' . $row['minute'] . '</td>';
			echo '<td>' . $row['day'] . '/' . $row['month']. '/' . $row['year'] .'</td>';
			echo'</tr>';
			}
		} else {
			echo "No data found";
		}

		}
		// close table>
	echo "</table>";
	echo "</div>";
// pagination
            ?>
            </div>
    </div>
     
     </div>
     
</div> 


<!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    

</body>

</html>

