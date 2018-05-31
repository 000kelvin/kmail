<?PHP
        $logout = true;
        $cfgProgDir = '';
        include($cfgProgDir . "secure.php");
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Logout</title>
    </SCRIPT>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="custom.min.css" rel="stylesheet">
  </head>
  
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        </nav>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body{font-family:arial;background:#FFFFFF;text-align:center;}
#logout{margin:1em auto;margin-top:70px;background:#3B8CCA;color:#FFFFFF;border:8px solid #3B8CCA;font-weight:bold;width:500px;text-align:center;position:relative;}

</style>
</head>
<body>

<div id="logout">You have been logged out.</div>

<p><a href="../index.php">kelymail.com</a></p>
<p><a href="index.php">Panel</a></p>
<p><a href="index.php#signup">Submit a proposal</a></p>

<div class="clearfix"></div>
                <br />

                <div>
                  <h1>kelymail.com</h1>
                  <p><b>kelymail.com &copy; 2016 - <?php $year = date('Y'); echo "   $year"; ?>. All rights reserved.</b></p>
                </div>

</body>
</html>
