<?php
require ("../_autoloader/manage.php");
spl_autoload_register(function ($c){
    include '../_classes/'.$c.'.php';

});
$feed = new pdo_dbconnections('localhost', 'root', '', 'kely_feedback');
$pur = new secureInput();

if(isset($_POST['submit']))
{
	$fname = $_POST['fname'];
	$fname2 = $_POST['fname2'];
	$fname3 = $_POST['fname3'];
	$fname5 = $_POST['fname5'];
	$hour = date("h");
	$minute = date("i");
	$day = date("d");
	$month = date("m");
	$year = date("Y");
	
	$fname = trim($fname);
	$fname2 = trim($fname2);
	$fname3 = trim($fname3);
    $fname5 = trim($fname5);
	$hour = trim($hour);
	$minute = trim($minute);
	$day = trim($day);
	$month = trim($month);
	$year = trim($year);

    $fname = $feed->escapeString($fname);
    $fname = $pur->hmtl_pur($fname);

    $fname2 = $feed->escapeString($fname2);
    $fname2 = $pur->hmtl_pur($fname2);

    $fname3 = $feed->escapeString($fname3);
    $fname3 = $pur->hmtl_pur($fname3);

    $fname5 = $feed->escapeString($fname5);
    $fname5 = $pur->hmtl_pur($fname5);

    $feed->insert('feedback', array('id' => '', 'fname' => addslashes($fname), 'email' => addslashes($fname2), 'pnum' => addslashes($fname3), 'feedback' => addslashes($fname5), 'hour' => $hour, 'minute' => $minute, 'day' => $day, 'month' => $month, 'year' => $year));
		if($feed)
		{
			?>
			<script>alert('...thank you for the feed back');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('Error while accepting your feedback...');</script>
			<?php
		}		
	
}
?>
<!--including the header-->
<?php
$page_title = 'contact us';
include_once("../header.inc.php");
?>
<!--done with including the header-->

<!--and now the body-->
<div class="col-xs-12">
    <div style="margin-left: 40px;">
        <div class="reportd">Contact Us...</div>

    <hr class="hr_title">

<div class="contact reported" style="font-size: 14px;">
<span class="ca">Address</span><p></p>
<span class="ca1">The Audit and Systems Solutions Nigeria,</span><br>
<span class="ca2">110B Awolowo way,</span><br>
<span class="ca3">Ikeja,</span><br>
<span class="ca4">Lagos, Nigeria.</span>
</div>

<div class="contact reported">
<span class="ca">Phone number</span><p></p>
<span class="ca1">+234 708 879 5078</span><br>
<span class="ca2">+234 812 118 4813</span><br>
</div>

<div class="contact reported">
<span class="ca">Email Address</span><p></p>
<span class="ca1"><a href="mailto:kelvinvip8@gmail.com">kelvinvip8@gmail.com</a></span><br>
</div>

        <div class="reportd reporting">Feedback...</div>

    <hr class="hr_title">

<div class="reporting">
<span class="ca">Please do give us your feedback</span><p></p>
</div>
<form id="news-form" data-ajax="false" class="form-horizontal" style="margin-top: 30px;" target="_self" action="index.php" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><b>Fullname</b> : <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="fname" type="text" id="fname" size="100" required="required" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="fname2" class="control-label col-md-3 col-sm-3 col-xs-12">Email address : 
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="fname2" type="email" id="fname2" size="100" class="form-control col-md-7 col-xs-12" placeholder="for example: test@test.com"/>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><b>Feedback* </b>:
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="fname5" id="fname5" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                              </div>                                 
                                              <div class="form-group">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="submit" name="submit" value="Submit" class="btn btn-default" style="float:right;" />
                                              </div>
                                              </div>
                                                                                
                                            </form>
    </div></div>
<!--done with the body-->

<!--including the footer-->
<?php
include_once("../footer.inc.php");
?>
<!--done with including the footer-->
