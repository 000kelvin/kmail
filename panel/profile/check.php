<?php 
	$hostname_localhot = "localhost";
	$database_localhot = "kely_users";
	$username_localhot = "root";
	$password_localhot = "";
	$database_localhost = "kely_local";
	$database_localhostd = "kely_international";
	$localhot = mysqli_connect($hostname_localhot, $username_localhot, $password_localhot, $database_localhot) or trigger_error(mysql_error(),E_USER_ERROR); 
	//mysql_select_db($database_localhot, $localhot);
	$locations = "SELECT * FROM users where user = '$login'";
	$locationed =  mysqli_query($localhot, $locations) or die(mysqli_connect_error($locations));
	-$row_locations = mysqli_fetch_assoc($locationed);
	
	$localhot = mysqli_connect($hostname_localhot, $username_localhot, $password_localhot, $database_localhost) or trigger_error(mysql_error(),E_USER_ERROR);
	$localhotd = mysqli_connect($hostname_localhot, $username_localhot, $password_localhot, $database_localhostd) or trigger_error(mysql_error(),E_USER_ERROR); 
	//mysqli_select_db($database_localhot, $localhot);
	//first segment
	$locations = "SELECT * FROM first_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed =  mysqli_query($localhot, $locations) or die(mysqli_connect_error());
	$row_locations1 = mysqli_fetch_assoc($locationed);
	
	//second segment
	$locations2 = "SELECT * FROM second_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed2 =  mysqli_query($localhot, $locations2) or die(mysqli_connect_error());
	$row_locations2 = mysqli_fetch_assoc($locationed2);    
	
	//third segment
	$locations3 = "SELECT * FROM third_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed3 =  mysqli_query($localhot, $locations3) or die(mysqli_connect_error());
	$row_locations3 = mysqli_fetch_assoc($locationed3); 
	
	//fourth segment
	$locations4 = "SELECT * FROM fourth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed4 =  mysqli_query($localhot, $locations4) or die(mysqli_connect_error());
	$row_locations4 = mysqli_fetch_assoc($locationed4); 
	
	//fifth segment
	$locations5 = "SELECT * FROM fifth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed5 =  mysqli_query($localhot, $locations5) or die(mysqli_connect_error());
	$row_locations5 = mysqli_fetch_assoc($locationed5); 
	
	//sixth segment
	$locations6 = "SELECT * FROM sixth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed6 =  mysqli_query($localhot, $locations6) or die(mysqli_connect_error());
	$row_locations6 = mysqli_fetch_assoc($locationed6); 
	
	//seventh segment
	$locations7 = "SELECT * FROM seventh_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed7 =  mysqli_query($localhot, $locations7) or die(mysqli_connect_error());
	$row_locations7 = mysqli_fetch_assoc($locationed7); 
	
	//eight segment
	$locations8 = "SELECT * FROM eight_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed8 =  mysqli_query($localhot, $locations8) or die(mysqli_connect_error());
	$row_locations8 = mysqli_fetch_assoc($locationed8); 
	
	//ninth segment
	$locations9 = "SELECT * FROM ninth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed9 =  mysqli_query($localhot, $locations9) or die(mysqli_connect_error());
	$row_locations9 = mysqli_fetch_assoc($locationed9); 
	
	//tenth segment
	$locations10 = "SELECT * FROM tenth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed10 =  mysqli_query($localhot, $locations10) or die(mysqli_connect_error());
	$row_locations10 = mysqli_fetch_assoc($locationed10); 
	
	//eleventh segment
	$locations11 = "SELECT * FROM eleventh_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed11 =  mysqli_query($localhot, $locations11) or die(mysqli_connect_error());
	$row_locations11 = mysqli_fetch_assoc($locationed11); 
	
	//twelfh segment
	$locations12 = "SELECT * FROM twelfth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed12 =  mysqli_query($localhot, $locations12) or die(mysqli_connect_error());
	$row_locations12 = mysqli_fetch_assoc($locationed12); 
	
	//thirteenth segment
	$locations13 = "SELECT * FROM third_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed13 =  mysqli_query($localhot, $locations13) or die(mysqli_connect_error());
	$row_locations13 = mysqli_fetch_assoc($locationed13); 
	
	//fourteenth segment
	$locations14 = "SELECT * FROM fourteenth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed14 =  mysqli_query($localhot, $locations14) or die(mysqli_connect_error());
	$row_locations14 = mysqli_fetch_assoc($locationed14); 
	
	//fifteenth segment
	$locations15 = "SELECT * FROM fifteenth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed15 =  mysqli_query($localhot, $locations15) or die(mysqli_connect_error());
	$row_locations15 = mysqli_fetch_assoc($locationed15); 
	
	//international
	
	//first segment
	$locations = "SELECT * FROM first_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed =  mysqli_query($localhotd, $locations) or die(mysqli_connect_error());
	$row_locationsd1 = mysqli_fetch_assoc($locationed);
	
	//second segment
	$locations2 = "SELECT * FROM second_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed2 =  mysqli_query($localhotd, $locations2) or die(mysqli_connect_error());
	$row_locationsd2 = mysqli_fetch_assoc($locationed2);    
	
	//third segment
	$locations3 = "SELECT * FROM third_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed3 =  mysqli_query($localhotd, $locations3) or die(mysqli_connect_error());
	$row_locationsd3 = mysqli_fetch_assoc($locationed3); 
	
	//fourth segment
	$locations4 = "SELECT * FROM fourth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed4 =  mysqli_query($localhotd, $locations4) or die(mysqli_connect_error());
	$row_locationsd4 = mysqli_fetch_assoc($locationed4); 
	
	//fifth segment
	$locations5 = "SELECT * FROM fifth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed5 =  mysqli_query($localhotd, $locations5) or die(mysqli_connect_error());
	$row_locationsd5 = mysqli_fetch_assoc($locationed5); 
	
	//sixth segment
	$locations6 = "SELECT * FROM sixth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed6 =  mysqli_query($localhotd, $locations6) or die(mysqli_connect_error());
	$row_locationsd6 = mysqli_fetch_assoc($locationed6); 
	
	//seventh segment
	$locations7 = "SELECT * FROM seventh_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed7 =  mysqli_query($localhotd, $locations7) or die(mysqli_connect_error());
	$row_locationsd7 = mysqli_fetch_assoc($locationed7); 
	
	//eight segment
	$locations8 = "SELECT * FROM eight_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed8 =  mysqli_query($localhotd, $locations8) or die(mysqli_connect_error());
	$row_locationsd8 = mysqli_fetch_assoc($locationed8); 
	
	//ninth segment
	$locations9 = "SELECT * FROM ninth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed9 =  mysqli_query($localhotd, $locations9) or die(mysqli_connect_error());
	$row_locationsd9 = mysqli_fetch_assoc($locationed9); 
	
	//tenth segment
	$locations10 = "SELECT * FROM tenth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed10 =  mysqli_query($localhotd, $locations10) or die(mysqli_connect_error());
	$row_locationsd10 = mysqli_fetch_assoc($locationed10); 
	
	//eleventh segment
	$locations11 = "SELECT * FROM eleventh_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed11 =  mysqli_query($localhotd, $locations11) or die(mysqli_connect_error());
	$row_locationsd11 = mysqli_fetch_assoc($locationed11); 
	
	//twelfh segment
	$locations12 = "SELECT * FROM twelfth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed12 =  mysqli_query($localhotd, $locations12) or die(mysqli_connect_error());
	$row_locationsd12 = mysqli_fetch_assoc($locationed12); 
	
	//thirteenth segment
	$locations13 = "SELECT * FROM thirteenth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed13 =  mysqli_query($localhotd, $locations13) or die(mysqli_connect_error());
	$row_locationsd13 = mysqli_fetch_assoc($locationed13); 
	
	//fourteenth segment
	$locations14 = "SELECT * FROM fourteenth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed14 =  mysqli_query($localhotd, $locations14) or die(mysqli_connect_error());
	$row_locationsd14 = mysqli_fetch_assoc($locationed14); 
	
	//fifteenth segment
	$locations15 = "SELECT * FROM fifteenth_segment WHERE profile_id = '1' ORDER BY id DESC LIMIT 1";
	$locationed15 =  mysqli_query($localhotd, $locations15) or die(mysqli_connect_error());
	$row_locationsd15 = mysqli_fetch_assoc($locationed15); 
?>