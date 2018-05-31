<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to kelymail admin page | Login</title>
    <SCRIPT LANGUAGE="JavaScript">
	<!--
	//  ------ check form ------
	function checkData() {
        var f1 = document.forms[0];
        var wm = "<?php echo $strJSHello; ?>\n\r\n";
        var noerror = 1;

        // --- entered_login ---
        var t1 = f1.entered_login;
        if (t1.value == "" || t1.value == " ") {
                wm += "<?php echo $strLogin; ?>\r\n";
                noerror = 0;
        }

        // --- entered_password ---
        var t1 = f1.entered_password;
        if (t1.value == "" || t1.value == " ") {
                wm += "<?php echo $strPassword; ?>\r\n";
                noerror = 0;
        }

        // --- check if errors occurred ---
        if (noerror == 0) {
                alert(wm);
                return false;
        }
        else return true;
}
//-->
</SCRIPT>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
  
  <?php
  error_reporting(0);
	// check for error messages
	if ($phpSP_message) {
			echo '<div id="error" style="margin-top:50px; margin-left:220px; font-size:16px;"><b>'.$phpSP_message.'</b></div>';
			}
	?>
    
     <?php if ($useDatabase == false AND $useData == true AND $cfgLogin[1] == "") 
	         echo '<p style="font-family:arial;font-size:22px;color:red;font-weight:bold;">WEBMASTER: There is no administrator user set up.<br>
                   <br><span style="font-size:18px;">If you are not using a database, make sure you have configured<br>at least one user in config.php (around line 85).</span>                    </p>'; ?>
  
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        </nav>
  
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper" style="margin-top:-20px;">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="entry" action="<?php echo $_SERVER['REQUEST_URI'] ?>" METHOD="post" onSubmit="return checkData()">
            <?php //if there are $_POST variables -- add them to the form...
			   $pname=""; $pvalue="";
			   foreach ($_POST as $pname => $pval) {
					if ($pname="entered_login" OR $pname="entered_password") continue;
					echo '<input type=hidden name="'.$pname.'" value="'.$pval.'">'."\n";
					}
			?>
              <h1>Login Form</h1>
              <div>
                <input type="text" name="entered_login" class="form-control" placeholder="Username" required="required" />
              </div>
              <div>
                <input type="password" name="entered_password" class="form-control" placeholder="Password" required="required" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Not an admin?
                  <a href="#signup" class="to_register"> Submit a proposal</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>kelymail.com</h1>
                  <p><b>kelymail.com &copy; 2016 - <?php $year = date('Y'); echo "   $year"; ?>. All rights reserved.</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
          <?php
			if(isset($_POST['submit']))
			{
				$hostname_visitors = "localhost";
				$database_visitors = "kely_proposal";
				$username_visitors = "root";
				$password_visitors = "";
				
				$connection = mysqli_connect($hostname_visitors, $username_visitors, $password_visitors, $database_visitors);
				
				if(!$connection)
				{
					print("Connection failed: " . mysqli_connect_error());
				}
				
				$sql = "SELECT * FROM proposal";
				$result = mysqli_query($connection, $sql) or print(mysqli_error($connection));
				$total_res = mysqli_num_rows($result);
				
				$fname = mysqli_real_escape_string($connection, $_POST['fname']);
				$uname = mysqli_real_escape_string($connection, $_POST['uname']);
				$pnum = mysqli_real_escape_string($connection, $_POST['pnum']);
				$email = mysqli_real_escape_string($connection, $_POST['email']);
				$descr = mysqli_real_escape_string($connection, $_POST['descr']);
				$hour = date("h");
				$minute = date("i");
				$second = date("s");
				$day = date("d");
				$month = date("m");
				$year = date("Y");
				
				$fname = trim($fname);
				$uname = trim($uname);
				$pnum= trim($pnum);
				$email = trim($email);
				$descr = trim($descr);
				$hour = trim($hour);
				$minute = trim($minute);
				$second = trim($second);
				$day = trim($day);
				$month = trim($month);
				$year = trim($year);
				
				$sql = 
					"INSERT INTO proposal(fname,uname,pnum,email,descr,hour,minute,second,day,month,year) 
					VALUES('$fname','$uname','$pnum','$email','$descr','$hour','$minute','$second','$day','$month','$year')";
				$res = mysqli_query($connection, $sql);
					if($res)
					{
						?>
						<script>alert('...thank you for the proposal, we will reach you through your email or phone number shortly.');</script>
						<?php
					}
					else
					{
						?>
						<script>alert('Error while accepting your proposal...');</script>
						<?php
					}		
				
			}
			?>
            <form id="register" action="login.php" target="_self" METHOD="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" name="fname" class="form-control" placeholder="Fullname" required="" />
              </div>
              <div>
                <input type="text" name="uname" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="text" name="pnum" class="form-control" placeholder="Phone number" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
			  <textarea class="form-control" name="descr" id="descr" placeholder="Your description and experience" rows="3"></textarea>
			   </div><br>
              <div>
                <button type="submit" class="btn btn-default submit" name="submit" id="submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already an admin?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                 <h1>kelymail.com</h1>
                  <p><b>kelymail.com &copy; 2016 - <?php $year = date('Y'); echo "   $year"; ?>. All rights reserved.</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    
    <SCRIPT LANGUAGE="JavaScript">
	<!--
	document.forms[0].entered_login.select();
	document.forms[0].entered_login.focus();
	//-->
</SCRIPT>
    
  </body>
</html>
