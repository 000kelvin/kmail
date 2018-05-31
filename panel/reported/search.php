<?php
include('db.php');
if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
	$sql = "SELECT * FROM report ORDER BY id LIMIT 5";
    $strSQL_Result = mysqli_query($connection, $sql) or print(mysqli_connect_error($sql));
	/*if (!$strSQL_Result) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}*/
	
    while($row=mysqli_fetch_array($strSQL_Result))
    {
		        $id         = $row['id'];
                $username   = $row['fname'];
				$pnum       = $row['pnum'];
				$email      = $row['email'];
				$news       = $row['news'];
				$tnews      = $row['tnews'];
				$hour       = $row['hour'];
				$minute     = $row['minute'];
				$visitor_day = $row['day'];
				$visitor_month = $row['month'];
				$visitor_year = $row['year'];
				$b_username = '<strong>'.$q.'</strong>';
				$b_email    = '<strong>'.$q.'</strong>';
				$b_pnum = '<strong>'.$q.'</strong>';
				$b_news    = '<strong>'.$q.'</strong>';
				$b_tnews = '<strong>'.$q.'</strong>';
				$b_hour    = '<strong>'.$q.'</strong>';
				$b_minute = '<strong>'.$q.'</strong>';
				$b_visitor_day    = '<strong>'.$q.'</strong>';
				$b_visitor_month= '<strong>'.$q.'</strong>';
				$b_visitor_year    = '<strong>'.$q.'</strong>';
				
				
                $final_username = str_ireplace($q, $b_username, $username);
				$final_email = str_ireplace($q, $b_email, $email);
				$final_pnum = str_ireplace($q, $b_pnum, $pnum);
				$final_news = str_ireplace($q, $b_news, $news);
				$final_tnews = str_ireplace($q, $b_tnews, $tnews);
				$final_hour = str_ireplace($q, $b_hour, $hour);
				$final_minute = str_ireplace($q, $b_minute, $minute);
				$final_visitor_day = str_ireplace($q, $b_visitor_day, $visitor_day);
				$final_visitor_month = str_ireplace($q, $b_visitor_month, $visitor_month);
				$final_visitor_year = str_ireplace($q, $b_visitor_year, $visitor_year);        ?>
            
            <a style="text-decoration:none; color:#000;"><div class="show" align="left">
<b>Fullname: </b><?php echo $final_username; ?>&nbsp;&nbsp;  <b>Email: </b><?php echo $final_email; ?>&nbsp;&nbsp;  <b>Phonenumber: </b><?php echo $final_pnum; ?>&nbsp;&nbsp; <b>News title: </b><?php echo $final_tnews; ?>&nbsp;&nbsp; <b>Time: </b><?php echo $final_hour; ?>:<?php echo $final_minute; ?> &nbsp;&nbsp;<b>Date: </b><?php echo $final_visitor_day; ?>/<?php echo $final_visitor_month; ?>/<?php echo $final_visitor_year; ?><br/>
					</div></a>
            
        <?php
    }
}
?>