<?php
require ("../_autoloader/manage.php");
spl_autoload_register(function ($c){
    include '../_classes/'.$c.'.php';

});
$feed = new pdo_dbconnections('localhost', 'root', '', 'kely_report');
$pur = new secureInput();
if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $email = $_POST['fname2'];
    $pnum = $_POST['fname3'];
    $tnews = $_POST['fname4'];
    $news = $_POST['fname5'];
    $hour = date("h");
    $minute = date("i");
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    $fname = trim($fname);
    $email = trim($email);
    $pnum = trim($pnum);
    $news = trim($news);
    $hour = trim($hour);
    $minute = trim($minute);
    $day = trim($day);
    $month = trim($month);
    $year = trim($year);

    $fname = $feed->escapeString($fname);
    $fname = $pur->hmtl_pur($fname);

    $email = $feed->escapeString($email);
    $email = $pur->hmtl_pur($email);

    $pnum = $feed->escapeString($pnum);
    $pnum = $pur->hmtl_pur($pnum);

    $tnews = $feed->escapeString($tnews);
    $tnews = $pur->hmtl_pur($tnews);

    $news = $feed->escapeString($news);
    $news = $pur->hmtl_pur($news);
	
	$file = rand(1000,100000)."-".$_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
	$file_size = $_FILES['image']['size'];
	$file_type = $_FILES['image']['type'];
	$folder="report/";
	// new file size in KB
	$new_size = $file_size/2048;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
/*	mysqli_connect("localhost","kely_report","myreport101");
	mysqli_select_db("kely_report") or die(mysqli_error()); */
	
	$imageName = $_FILES["image"]["name"];
    $imageName = $feed->escapeString($imageName);
    $imageName = $pur->hmtl_pur($imageName);

	$imageData = file_get_contents($_FILES["image"]["tmp_name"]);
    $imageData = $feed->escapeString($imageData);
    $imageData = $pur->hmtl_pur($imageData);

    $imageType = $_FILES["image"]["type"];
    $imageType = $feed->escapeString($imageType);
    $imageType = $pur->hmtl_pur($imageType);
	
if(move_uploaded_file($file_loc,$folder.$final_file))
{
	if(substr($imageType,0,5) == "image")
	{
		$sql = 
		"INSERT INTO report(id,name,image,fname,email,pnum,tnews,news,hour,minute,day,month,year) VALUES('','$imageName','$imageData','$fname','$email','$pnum','$tnews','$news','$hour','$minute','$day','$month','$year')";

        $feed->insert('report', array('id' => '','name' => addslashes($imageName),'image' => addslashes($imageData), 'fname' => addslashes($fname), 'email' => addslashes($email), 'pnum' => addslashes($pnum),'tnews' => addslashes($tnews),'news' => addslashes($news), 'hour' => $hour, 'minute' => $minute, 'day' => $day, 'month' => $month, 'year' => $year));
		?>
        <script>alert('Thank you...your report has been uploaded');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('Error while accepting your report...');</script>
		<?php
	}
	
}
}
?>
<!--including the header-->
<?php
include_once("../header.inc.php");
?>
<!--done with including the header-->

<!--and now the body-->
<div class="col-xs-12">
<div class="reportd">
Report your story...
</div>

<div style="margin-top:50px;">
<form id="news-form" data-ajax="false" class="form-horizontal form-label-left" target="_self" action="index.php" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><b>Fullname</b> : <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="fname" type="text" id="fname" size="100" required="required" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="fname2" class="control-label col-md-3 col-sm-3 col-xs-12"><b>Email address</b> : <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="fname2" type="email" id="fname2" size="100" required="required" class="form-control col-md-7 col-xs-12" placeholder="for example: test@test.com"/>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="fname2" class="control-label col-md-3 col-sm-3 col-xs-12">Phonenumber : 
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="fname3" type="tel" id="fname3" size="100" class="form-control col-md-7 col-xs-12" placeholder=""/>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><b>Title of news</b> : <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="fname4" type="text" id="fname4" size="100" required="required" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><b>News</b> : <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="fname5" id="fname5" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><b>Image</b> : <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="image" type="file" required="required" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                              </div> 
                                              <p>&nbsp;</p>                                
                                              <div class="form-group">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="reset" name="Reset" value="Reset" class="btn btn-default" style="float:right;" />
                                              <input type="submit" name="submit" value="Submit" class="btn btn-default" style="float:right;" /> 
                                              </div>
                                              </div>
                                                                                
                                            </form>
                                            </div>
<p>&nbsp;</p>
</div>
<!--done with the body-->

<!--including the footer-->
<?php
include_once("../footer.inc.php");
?>
<!--done with including the footer-->
