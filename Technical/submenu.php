<?php session_start();
 require_once '../func_classes/dbConnect.php';
$con = new dbConnect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Send Reports</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>



<body>

    <!-- start: Header -->
<div class="navbar">
<div class="navbar-inner">
        <div class="container-fluid">
             
                <a class="brand" href="index.html"><span>Paradise Technical</span></a>

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
<ul class="nav pull-right">
    <li>
     <?php
     $res = mysql_query("select * from invoices where state='0'");
     $i = 0;
     while($row = mysql_fetch_row($res)){
        $i++; 
     }
     echo"
    <font color='beige' size='5'>Unpaid Invoices:
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='img/alert.png' width='26'>&nbsp;($i)
    </font><br/>";
     ?>   
    </li>
        <!-- start: User Dropdown -->
        <li class="dropdown">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="halflings-icon white user"></i> <?php echo @$_SESSION['name']; ?>
                        <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                        <li class="dropdown-menu-title">
                                <span>Paradise Admin</span>
                        </li>
                        <li><a href="../func_files/logout.php"><i class="halflings-icon off"></i> Logout</a></li>
                </ul>
        </li>
        <!-- end: User Dropdown -->
</ul>
                </div>
                <!-- end: Header Menu -->

        </div>
</div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
<div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
<div class="nav-collapse sidebar-nav">
<ul class="nav nav-tabs nav-stacked main-menu">
                                                <li><a href="index.html"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Main Page</span></a></li>	


<li>
<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Information / Reports </span><span class="label label-important"> 2 </span></a>
<ul>
<li><a class="submenu" href="submenu.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Send Reports</span></a></li>
<li><a class="submenu" href="submenu2.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Update Information</span></a></li>
</ul>	

</li>

                        </ul>
                </div>
        </div>
        <!-- end: Main Menu -->

<noscript>
        <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
</noscript>

        <!-- start: Content -->
        <div id="content" class="span10">


        <ul class="breadcrumb">
                <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Main Technical Page</a> 
                        <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Send Reports</a></li>
        </ul>

      

                    <?php

echo "
<form action='submenu.php' method='POST'>";
//while($row = mysql_fetch_assoc($query)){
//$id = $row['id'];
//$isbn = $row['isbn'];
//$author = $row['author'];
//$category = $row['category'];
//$title = $row['title'];
//$price = $row['price'];
//
//}

echo "
    
<table border='0'>
<tr>
<td><br> To :</td>
<td><br> Content :</td>
<td></td>
</tr>

<tr>
<td> <input type='email' name='changetitle' size='20'>    </td>
<td> <input type='text' name='changeprice' size='5'>     </td>
</tr>
</table>

</form>



";

if(isset($_POST['submit'])){    //note
    
$booktitle = $_POST['booktitle'];
$changetitle = $_POST['changetitle'];
$changeprice = $_POST['changeprice'];

if($booktitle && $changetitle){
    $sql = "update books set title='$changetitle' , price='$changeprice' where id='$booktitle'";   //note
    
    $query = mysql_query($sql);
    if($query){
        echo "<meta http-equiv='refresh' content='0' >";
    }
}
}
?>

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	

                    
             
      
                  

	
	<footer>

		<p>
<span style="text-align:left;float:left">&copy; 2015 <a href="" alt="Bootstrap_Metro_Dashboard">Paradise Wedding Hall</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
</body>
</html>
