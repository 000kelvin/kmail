<?PHP
    $requiredUserLevel = array(2,3,4);
    $cfgProgDir = '../';
	include($cfgProgDir . "secure.php");
	$up_id = uniqid();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to kelymail admin page...Local Segment Uploader</title>
	<!-- jQuery -->
	<script type="text/javascript" src="markitup/jquery-1.8.0.min.js"></script>
	<!-- markItUp! -->
	<script type="text/javascript" src="markitup/jquery.markitup.js"></script>
	<!-- markItUp! toolbar settings -->
	<script type="text/javascript" src="markitup/sets/default/set.js"></script>
    
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- NProgress -->
    <link href="../nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style type="text/css">
  #m {
	color: #F00;
}

  </style>    
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
   
         <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Post Local News Segment
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-newspaper-o"></i> <a href="index.php">Post Local news</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-newspaper-o"></i> First Segment
                            </li>
                        </ol> 
                    </div>
      </div>
      <div id="wizard" class="form_wizard wizard_horizontal">
              <ul class="wizard_steps">
                                <li>
                                  <a href="#step-1" style="text-decoration:none;">
                                    <span class="step_no">1</span>
                                    <span class="step_descr">
                                                      Step 1<br />
                                  </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#step-2" style="text-decoration:none;">
                                    <span class="step_no">2</span>
                                    <span class="step_descr">
                                                      Step 2<br />
                                  </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#step-4" style="text-decoration:none;">
                                    <span class="step_no">3</span>
                                    <span class="step_descr">
                                                      Step 3<br />
                                  </span>
                                  </a>
                                </li>
        </ul>

        <div id="step-1">
        <?php include_once("info.php"); ?>
        </div>
        
        <div id="step-2">
                                <h2 class="StepTitle">Step 2</h2>
<div>
<div class="col-lg-12" style=" border:solid; border-color:#F3F3F3; padding-top:10px;">
<b>Upload the news file(s)</b>
<hr>
<form id="news-form" class="form-horizontal form-label-left" target="_self" action="upload.php#step-4" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image: <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="files" type="file" id="files" required class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title of the news: <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="title" cols="100" rows="5" id="title" required class="form-control col-md-7 col-xs-12" placeholder="for example: I've nothing to do with Avengers - Jonathan cries out "/>
                                                </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">News category: <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="category" type="text" id="category" size="100" required class="form-control col-md-7 col-xs-12" placeholder="for example: headline, article etc"/>
                                                </div>
                                              </div>
                                              
                                              <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">News: <span class="required">*</span></label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea id="news" name="news" cols="80" rows="20" required class="form-control col-md-7 col-xs-12">
        
</textarea>
        <input type="hidden" name="pi_id" id="pi_id" value="1"/>
        </div>
                                              </div>
                                                                              
                                              <div class="form-group">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="reset" name="Reset" value="Reset" class="btn btn-default" style="float:right;" />
                                              <input type="submit" name="submit" value="Upload" class="btn btn-default" style="float:right;" /> 
                                              </div>
                                              </div>
        </form>
        <div>
        <?php
		include_once 'dbconfig.php';
        if(isset($_POST['submit']))
        {
	        $title = mysqli_real_escape_string($connection, $_POST['title']);
	        $link = 'index.php';
			$pi_id = mysqli_real_escape_string($connection, $_POST['pi_id']);
	        $cat = mysqli_real_escape_string($connection, $_POST['category']);
			$content = mysqli_real_escape_string($connection, $_POST['news']);
			$time = date('H:i:s');
	        $date = date('Y-m-d');

			$title = trim($title);
			$link = trim($link);
			$pi_id = trim($pi_id);
			$cat = trim($cat);
			$content = trim($content);
            
			if((!empty($_FILES["files"])) && ($_FILES['files']['error'] == 0))
			{
			//Check if the file is JPEG image and it's size is less than 350Kb
				$filename = basename($_FILES['files']['name']);
				$ext = substr($filename, strrpos($filename, '.') + 1);
                $size = getimagesize($_FILES["files"]["tmp_name"]);
                $size_width = $size[0];
                $size_height = $size[1];
				if(($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/jpg") || ($_FILES["files"]["type"] == "image/gif") && ($_FILES["files"]["size"] < 10000000))
				{
                if($size_width >= $size_height)
                {
			//Determine the path to which we want to save this file
					$newname = dirname(__FILE__).'/div1/'.$filename;
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['files']['tmp_name'],$newname)))
				{
			      $sql = ("INSERT into	first_segment(id,p_name,name,title,link,news_content,profile_id,category,pi_id,time,date_time) VALUES('','$login','$filename','$title','$link','$content','1','$cat','$pi_id','$time','$date')");
				   mysqli_query($connection, $sql);
				   print("Successfully uploaded the image </br>");
				   print ("It's done! The file has been saved as: ".$filename);
				
        }
		else
				{
					print ("Error: A problem occurred during file upload!");
				}
			}
               else
               {
                   print("Error: The image width must be greater than or equal to the image height.");
               }
                }
			else
			{
				print ("Error: File ".$_FILES["files"]["name"]." already exists, or try using a supported file type");
			}

			}
			else
				{
					print ("Error: Only .jpg images under 10Mb are accepted for upload");
				}
			} 
			else
			{
				print ("Error: No file uploaded");
			}
        ?>
        </div>
        </div>
        </div>
        </div>
        
 <div id="step-3">
            <h2 class="StepTitle col-lg-12">Step 3</h2>
            
            <div class="col-lg-12" style=" border:solid; border-color:#F3F3F3; padding-top:10px;">
<b>Upload the image file(s)</b>
<hr>

<div>
<script src="jquery-1.4.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">

// allow all extensions
var exts = "";

// only allow specific extensions
// var exts = "jpg|jpeg|gif|png|bmp|tiff|pdf";

function checkExtension(value)
{
    if(value=="")return true;
    var re = new RegExp("^.+\.("+exts+")$","i");
    if(!re.test(value))


    {
        alert("Your file extension is not allowed: \n" + value + "\n\nOnly the following extensions are allowed: "+exts.replace(/\|/g,',')+" \n\n");
        return false;
    }

    return true;
}

$(document).ready(function() { 
//

//show the progress bar only if a file field was clicked
	var show_bar = 0;
    $('input[type="file"]').click(function(){
		show_bar = 1;
    });

//show iframe on form submit
    $("#upload-form").submit(function(){

		if (show_bar === 1) { 
			$('#progress-frame').show();
			function set () {
				$('#progress-frame').attr('src','progress-frame.php?up_id=<?php echo $up_id; ?>');
			}
			setTimeout(set);
		}
    });
//

});


var next_id=0;

var max_number =4;

	function _add_more() {
		
		if (next_id>=max_number)
		{
			alert("You reached maximum number of 5 files!");
			return;
		}

		next_id=next_id+1;
		var next_div=next_id+1;
		var txt = "<br><input type=\"file\" name=\"item_file[]\" onChange=\"checkExtension(this.value)\" required class=\"form-control\" style=\"margin-left:260px;\">";
		txt+='<div id="dvFile'+next_div+'"></div>';
		document.getElementById("dvFile" + next_id ).innerHTML = txt;
	}


	function validate(f){
		var chkFlg = false;
		for(var i=0; i < f.length; i++) {
			if(f.elements[i].type=="file" && f.elements[i].value != "") {
				chkFlg = true;
			}
		}
		if(!chkFlg) {
			alert('Please browse/choose at least one file');
			return false;
		}
		f.pgaction.value='upload';
		return true;
	}
</script>

<form enctype="multipart/form-data" class="form-horizontal form-label-left" target="_self" action="upload.php#step-4" method="post" id="upload-form">

        <!--hidden field-->
        <div>
        <input type="hidden" value="demo" name="<?php echo ini_get("session.upload_progress.name"); ?>"/>
        <input type="hidden" value="1" name="ci_id" id="ci_id" />
        </div>
        <!---->
        <div class="form-group">
        <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">The image file(s): <span class="required">*</span>
        </label>
       <div id="dvFile0" class="col-md-6 col-sm-6 col-xs-12">
       <input type="file" name="item_file[]" onChange="checkExtension(this.value)" required class="form-control col-md-7 col-xs-12">
       <input type="file" name="item_file[]" onChange="checkExtension(this.value)" required class="form-control col-md-7 col-xs-12">
       </div>
       <div id="dvFile1" class="col-md-6 col-sm-6 col-xs-12">
       </div>
        <a href="javascript:_add_more(0);" class="col-md-6 col-sm-6 col-xs-12"><B>(+) Add file</B></a>
        </div>
        
        <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12">
	   <input type="submit" value="Upload" class="btn btn-default" style="float:right;" />
       <input type="reset" value="Reset" class="btn btn-default" style="float:right;" />
       </div>
       </div>
       
</form>
	<!--Include the progress bar frame-->
    <div id="step-4">
   	 <iframe style="position: relative; top: 5px;" id="progress-frame" name="progress-frame" border="0" src="" scrollbar="no" frameborder="0" scrolling="no"> </iframe>    
     </div> 
     <?php
	 error_reporting(0);
	 include_once 'dbconfig.php';
	if (!isset($_FILES["item_file"]))
	     
		echo("<b> No news files uploaded</b><br>");
    
	$segment = "first_segment";
	$date = date('Y-m-d h:i:s');
	$file_count = count($_FILES["item_file"]['name']);
	
	echo $file_count . " file(s) sent... <BR><BR>";
	if(count($_FILES["item_file"]['name'])>0) 
	{ 
		for($j=0; $j < count($_FILES["item_file"]['name']); $j++) 
		{ //loop the uploaded file array
			
			$filen = $_FILES["item_file"]['name'][$j];
			$filet = $_FILES["item_file"]['type'][$j];

            $sizes = getimagesize($_FILES["item_file"]["tmp_name"][$j]);
            $sizes_width = $sizes[0];
            $sizes_height = $sizes[1];
			// ingore empty input fields
			if ($filen!="")
			{
				// destination path - you can choose any file name here (e.g. random)
				$path = $file_path . $filen;
				$ext = substr($filen, strrpos($filen, '.') + 1);

				if (($filet == "image/jpeg") || ($filet == "image/png") || ($filet == "image/jpg") || ($filet == "image/gif") && ($_FILES["files"]["size"] < 10000000))
                {
                if($sizes_width >= $sizes_height)
                {
				if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)) 
				{ 
					$sql = ("INSERT into news_pictures(id,i_name,p_name,segment,pi_id,p_date_time) VALUES('','$filen','$login','$segment','$ci_id','$date')");
				   mysqli_query($connection, $sql);			    
					echo "File# ".($j+1)." ($filen) uploaded successfully!<br>";
				} 
				
				else
				{
					echo  "Errors occured during file upload!";
				}
                }
                else
                    {
                        print("Error: The image width must be greater than or equal to the image height.");
                    }
				}
				else
				{
					echo  "Please upload a valid image file under 2MB!";
				}
			}	
            else
			{
				echo "Upload atleast one file";
			}
		
	}
 }
?>
     <div>

</div>                       
                                          </div>
                    </div>                                                                 
      </div>
                   
  </div>
  </div>
</div>
    
    <div>
     <!-- Bootstrap Core JavaScript -->
     <script src="../js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <!--<script src="../jquery/dist/jquery.min.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>-->
     <!-- Bootstrap -->
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Dropzone.js -->
    <!--<script src="../dropzone/dist/min/dropzone.min.js"></script>-->  
    <!-- <script src="../../jquery/jquery.js"></script>
    /jQuery Smart Wizard -->
    <script src="assets/jquery-1.12.4-jquery.min.js"></script>
    </div>
</body>
</html>
