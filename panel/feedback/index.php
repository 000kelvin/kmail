<?PHP
$requiredUserLevel = array(2,3,4);
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
    <link href="dist/jquery.bootgrid.css" rel="stylesheet" />
    <script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script src="dist/jquery.bootgrid.min.js"></script>
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
                        Feedback Segment
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-fw fa-file"></i> Feedback
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
    <div class="col-sm-12">
        <table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
            <thead>
            <tr>
                <th data-column-id="id" data-type="numeric" data-identifier="true">Empid</th>
                <th data-column-id="fname">Full Name</th>
                <th data-column-id="email">Email</th>
                <th data-column-id="pnum">Phone Number</th>
                <th data-column-id="feedback">Feedback</th>
                <th data-column-id="minute">M</th>
                <th data-column-id="hour">H</th>

                <th data-column-id="day">D</th>
                <th data-column-id="month">Mo</th>
                <th data-column-id="year">Y</th>
            </tr>
            </thead>
        </table>
    </div>
            </div></div></div></div>

</body>
</html>
<script type="text/javascript">
    $( document ).ready(function() {
        var grid = $("#employee_grid").bootgrid({
            ajax: true,
            rowSelect: true,
            post: function ()
            {
                /* To accumulate custom parameter with the request object */
                return {
                    id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
                };
            },

            url: "response.php",
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            /* Executes after data is loaded and rendered */
            grid.find(".command-edit").on("click", function(e)
            {
                //alert("You pressed edit on row: " + $(this).data("row-id"));
                var ele =$(this).parent();
                var g_id = $(this).parent().siblings(':first').html();
                var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
                console.log(g_id);
                console.log(g_name);

                //console.log(grid.data());//
                $('#edit_model').modal('show');
                if($(this).data("row-id") >0) {

                    // collect the data
                    $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
                    $('#edit_name').val(ele.siblings(':nth-of-type(2)').html());
                    $('#edit_salary').val(ele.siblings(':nth-of-type(3)').html());
                    $('#edit_age').val(ele.siblings(':nth-of-type(4)').html());
                } else {
                    alert('Now row selected! First select row, then click edit button');
                }
            }).end().find(".command-delete").on("click", function(e)
            {

                var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
                alert(conf);
                if(conf){
                    $.post('response.php', { id: $(this).data("row-id"), action:'delete'}
                        , function(){
                            // when ajax returns (callback),
                            $("#employee_grid").bootgrid('reload');
                        });
                    //$(this).parent('tr').remove();
                    //$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                }
            });
        });

        function ajaxAction(action) {
            data = $("#frm_"+action).serializeArray();
            $.ajax({
                type: "POST",
                url: "response.php",
                data: data,
                dataType: "json",
                success: function(response)
                {
                    $('#'+action+'_model').modal('hide');
                    $("#employee_grid").bootgrid('reload');
                }
            });
        }

        $( "#command-add" ).click(function() {
            $('#add_model').modal('show');
        });
        $( "#btn_add" ).click(function() {
            ajaxAction('add');
        });
        $( "#btn_edit" ).click(function() {
            ajaxAction('edit');
        });
    });
</script>
