<?PHP
    $requiredUserLevel = array(2,3,4);
    $cfgProgDir = '../';
	include($cfgProgDir . "secure.php");
	$up_id = uniqid();

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

      <title>Welcome to kelymail admin page...Local Segment Uploader</title>

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
                <a class="navbar-brand" href="file:///C|/xampp/htdocs/kmail/local/2016/index.html">kelymail.com Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?PHP echo $login ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="file:///C|/xampp/htdocs/kmail/local/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="file:///C|/xampp/htdocs/kmail/local/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                                <i class="fa fa-fw fa-newspaper-o"></i> Second Segment
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
<form id="news-form" data-ajax="false" target="_self" class="form-horizontal form-label-left" action="upload_h.php#step-4" method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Main Image: <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="files" type="file" id="files" required class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                              </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image Source:
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="source" id="source" class="form-control col-md-7 col-xs-12" placeholder="this is very optional but essential e.g google, wiki"/>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title of the news: <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input name="title" id="title" required class="form-control col-md-7 col-xs-12" placeholder="for example: I've nothing to do with Avengers - Jonathan cries out "/>
                                                </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">News category: <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select title="category" name="category[]" size="9" multiple="multiple" tabindex="1" required class="form-control col-md-7 col-xs-12"><option selected="selected" value="Headline">Headline</option>
                                                        <option value="Hot">Hot</option>
                                                        <option value="Gossip">Gossip</option>
                                                        <option value="Fashion">Fashion</option>
                                                        <option value="Sport">Sport</option>
                                                        <option value="Science">Science</option>
                                                        <option value="Health">Health</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Entertainment">Entertainment</option></select>
                                                </div>
                                              </div>
                                              
                                              <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">News: <span class="required">*</span></label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">

                                                      <textarea title="news" id="news" name="news" class="form-control col-md-7 col-xs-12"></textarea>
        <input type="hidden" name="pi_id" id="pi_id" value="1"/>
        </div>
                                              </div>

                                            <!--For the image files--extension-->
                                            <!--hidden field-->
                                            <div>
                                                <input type="hidden" value="demo" name="<?php echo ini_get("session.upload_progress.name"); ?>"/>
                                                <input type="hidden" value="2" name="ci_id" id="ci_id" />
                                            </div>
                                            <!---->
                                            <div class="form-group">
                                                <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">The sub image file(s): <span class="required">*</span>
                                                </label>
                                                <div id="dvFile0" class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" name="item_file[]" onChange="checkExtension(this.value)" class="form-control col-md-7 col-xs-12">
                                                    <input type="text" name="item_source[]" placeholder="image-source: this is very optional but essential e.g google, wiki" onChange="checkExtension(this.value)" required class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div id="dvFile1" class="col-md-6 col-sm-6 col-xs-12">
                                                </div>
                                                <a href="javascript:_add_more(0);" class="col-md-6 col-sm-6 col-xs-12"><B>(+) Add file</B></a>
                                            </div>
                                            <iframe style="position: relative; top: 5px;" id="progress-frame" name="progress-frame" src="" frameborder="0" scrolling="no"> </iframe>

                                              <div class="form-group">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="reset" name="Reset" value="Reset" class="btn btn-default" style="float:right;" />
                                              <input type="submit" name="submit" value="Upload" class="btn btn-default" style="float:right;" />
                                              </div>
                                              </div>
        </form>
    <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
<!--    selector: '#news',-->
<!--    browser_spellcheck: true,-->
<!--    branding: false,-->
<!--    height: 400,-->
<!--    menu: {-->
<!--    file: {title: 'File', items: 'newdocument'},-->
<!--    edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},-->
<!--    insert: {title: 'Insert', items: 'link media | template hr'},-->
<!--    view: {title: 'View', items: 'visualaid'},-->
<!--    format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},-->
<!--    table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},-->
<!--    tools: {title: 'Tools', items: 'spellchecker code'}-->
<!--    },-->
<!--    menubar: 'file edit insert view format table tools help',-->
<!--    toolbar: ['undo', 'redo','searchreplace', 'preview'],-->
<!--    plugins: [ 'code', 'lists', 'autolink', 'preview', 'searchreplace', 'wordcount'],-->
<!--    encoding: 'xml'-->
    <script>
        tinymce.init({
            selector: '#news',
            browser_spellcheck: true,
            branding: false,
            height: 400,
            menubar: 'file edit insert view format table tools help',
            toolbar: "insertfile undo redo | styleselect | bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            plugins: [ "advlist autolink lists link charmap print preview anchor",
                       "searchreplace visualblocks code fullscreen",
                       "insertdatetime table contextmenu paste"],
            encoding: 'xml'
        });
    </script>

        <div>
        <?php
		$ins = new insert('localhost', 'root', '', 'kel_local');
		$db = new pdo_dbconnections('localhost', 'root', '', 'kel_local');
		$em = new send_email('localhost', 'root', '', 'kely_subscribers');
		$pur = new secureInput();
        $sexy = new sexy_url();
		$ss = new slug();
        if(isset($_POST['submit'])) {
            $title = $_POST['title'];
            $source = $_POST['source'];
            $pi_id = $_POST['pi_id'];
            $content = $_POST['news'];
            $time = date('h:i:s');
            $date = date('Y-m-d');
            $cat = implode(',', $_POST['category']);

            $title = trim($title);
            $source = trim($source);
            $pi_id = trim($pi_id);
            $cat = trim($cat);
            $content = trim($content);

            $title_md = md5($title);

            $title = $db->escapeString($title);
            $title = $pur->hmtl_pur($title);

            $source = $db->escapeString($source);
            $source = $pur->hmtl_pur($source);

            $pi_id = $db->escapeString($pi_id);
            $pi_id = $pur->hmtl_pur($pi_id);

            $cat = $db->escapeString($cat);
            $cat = $pur->hmtl_pur($cat);

            $content = $db->escapeString($content);
            $content = $pur->hmtl_pur($content);

            $post_con = html_entity_decode($content);
            $post_con = htmlspecialchars_decode($post_con);
            $post_con = str_replace('----', '', $post_con);

//            $postslug = $ss->postSlug($title);
            $postslug = $sexy->slug($title);
            $ci_id = 1;

            $file_count = count($_FILES["item_file"]['name']);
            echo $file_count . " file(s) sent from the sub image section... <BR><BR>";

        if (count($_FILES["item_file"]['name'])>0) {
            if ((!empty($_FILES["files"])) && ($_FILES['files']['error'] == 0)) {
                if (($_FILES["files"]["type"] == "image/jpg") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/gif") && ($_FILES["files"]["size"] < 10000000)) {

                    $filename = basename($_FILES['files']['name']);
                    $ext = substr($filename, strrpos($filename, '.') + 1);
                    $size = getimagesize($_FILES["files"]["tmp_name"]);
                    $size_width = $size[0];
                    $size_height = $size[1];

                    if ($size_width >= $size_height) {
                        $newname = '../../local/imageh/' . $filename;
                        if ((move_uploaded_file($_FILES['files']['tmp_name'],$newname)))
                        {
                            $ins->insert('headline', array('id' => '', 'post_id' => $ci_id, 'post_cat' => $cat, 'post_title' => addslashes($title), 'post_title_md' => addslashes($title_md), 'post_cont' => addslashes($content), 'post_image_name' => addslashes($filename), 'post_image_source' => addslashes($source), 'post_date' => $date, 'post_date_mod' => $date, 'post_time' => $time, 'post_ad_name' => addslashes($login), 'post_slug' => addslashes($postslug)));
                            $em->email($title, $post_con);
                        }else {
                            echo '<b>Error: Errors occurred during the upload of the main image file!</b><br>';
                        }

                        for($j=0; $j < count($_FILES["item_file"]['name']); $j++)
                        {
                            $filen = $_FILES["item_file"]['name'][$j];
                            $filet = $_FILES["item_file"]['type'][$j];
                            $item_source = $_POST['item_source'][$j];
                            $item_source = $db->escapeString($item_source);
                            $item_source = $pur->hmtl_pur($item_source);

                            $sizes = @getimagesize($_FILES["item_file"]["tmp_name"][$j]);
                            $sizes_width = $sizes[0];
                            $sizes_height = $sizes[1];

                            if ($filen != "") {
                                $path = '../../local/imageh_r/' . $filen;
                                $ext = substr($filen, strrpos($filen, '.') + 1);

                                if (($filet == "image/jpeg") || ($filet == "image/png") || ($filet == "image/jpg") || ($filet == "image/gif") && ($_FILES["files"]["size"] < 10000000)) {
                                    if ($sizes_width >= $sizes_height) {

                                        if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path))
                                        {
                                            $ins->insert('news_imageh', array('image_id' => '', 'image_post_id' => $ci_id, 'image_name' => addslashes($filen), 'image_source' => addslashes($item_source), 'image_date' => $date, 'image_time' => $time, 'image_ad_name' => addslashes($login), 'post_title_md' => addslashes($title_md)));
                                            echo '<b>1. File# ' . ($j + 1) .'('.$filen.')'.' for sub image files uploaded successfully!</b><br>';
                                        }else {
                                            echo '<b>Error: Errors occurred during the upload of the main image file!</b><br>';
                                        }



                                        }else{
                                        echo '<b>Error: The sub image file(s) width must be greater than or equal to the image height. Try again to avoid errors</b><br>';
                                    }

                                }else{
                                    echo '<b>Error: Only .jpg images under 10Mb are accepted for upload for the main image file, try again.</b><br>';
                                }
                            }
                        }

                        if ($ins) {
                            echo '<b>2. The image has been succefully uploaded as: '. $filename .'</b></br>';
                        } else {
                            echo 'Data was not successfully uploaded, try again or contact Kelly!';
                        }

                    }else
                    {
                        echo '<b>Error: The main image width must be greater than or equal to the image height. Try again to avoid errors</b><br>';
                    }

                }else
                {
                    echo '<b>Error: Only .jpg images under 10Mb are accepted for upload for the main image file, try again.</b><br>';
                }

            }else{
                echo '<b>Error: An error occurred. Try making sure your main image and sub image file(s) are valid.</b><br>';
            }
        }
        }
        ?>
        </div>
        </div>
        </div>
        </div>
        
 <div id="step-3">
            <h2 class="StepTitle col-lg-12">Step 3</h2>
            
            <div class="col-lg-12" style=" border:solid; border-color:#F3F3F3; padding-top:10px;">
<b>Successful?</b>
<hr>
How do You know you successfully uploaded the post:<br>
1. There are no errors displayed.<br>
2. The image files you uploaded are displayed as successful.<br>
3. Please re-do the process of submission if there are any errors present.<br>
Thanks for uploading your news post on kelymail, we are glad you did.<br>
You can view the news file you just uploaded for previews or further corrections by clicking the link below.<br>
                <a target="_blank" href="/kmail/index.php#<?php echo @$_POST['title']; ?>">right here</a>
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
			alert("You reached maximum number of 5 files! You can merge the pictures together for efficiency.");
			return;
		}

		next_id=next_id+1;
		var next_div=next_id+1;
		var txt = "<br><input type=\"file\" name=\"item_file[]\" onChange=\"checkExtension(this.value)\" required class=\"form-control\" style=\"margin-left:260px;\">" +
            "<input type=\"text\" name=\"item_source[]\" placeholder=\"image-source: this is very optional but essential e.g google, wiki\" onChange=\"checkExtension(this.value)\" required class=\"form-control\" style=\"margin-left:260px;\">";
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

	<!--Include the progress bar frame-->
    <div id="step-4">

     </div> 
     <?php
	 error_reporting(0);
?>
     <div>

</div>                       
                                          </div></div>
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
