<!DOCTYPE html>
<?php session_start();
 require_once '../func_classes/dbConnect.php';
$con = new dbConnect();
?>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Add Employee</title>
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
				
				<a class="brand" href="index.html"><span>Paradise Admin</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
		
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Admin Name
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Admin Name
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
    <li><a href="reports.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Reports</span></a></li>
    <li><a href="updateInfo.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Upade Information</span></a></li>  

    <li>
            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Users / Employees</span><span class="label label-important"> 3 </span></a>
            <ul>
                    <li><a class="submenu" href="submenu.php"><i class="icon-file-alt"></i><span class="hidden-tablet">List Users</span></a></li>
                    <li><a class="submenu" href="submenu2.php"><i class="icon-file-alt"></i><span class="hidden-tablet">List Employees</span></a></li>
                    <li><a class="submenu" href="submenu3.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Employees</span></a></li>
            </ul>	
    </li>
    <li>
            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Tables </span><span class="label label-important"> 4 </span></a>
           <ul>
<li><a class="submenu" href="table1.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Package / Resource table </span></a></li>
<li><a class="submenu" href="table2.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Hall table </span></a></li>
<li><a class="submenu" href="table3.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Resource table </span></a></li>
<li><a class="submenu" href="table4.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Package table </span></a></li>
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
					<a href="index.html">Main Admin Page</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Add Employee</a></li>
			</ul>

  
<?php
echo "
<form action='insert.php' method='POST'>
Rank For This Emp 
<select name='booktitle'>";
    
if(@isset($_POST['submit'])){ 
    
$submit = @$_POST['submit'];

if($submit){
$rank = @$_POST['rank'];
$name = @$_POST['name'];
$email = @$_POST['email'];
$password = @$_POST['password'];
$confirm = @$_POST['confirm'];
$NatID = @$_POST['NatID'];
$mob = @$_POST['mob'];



require './subdir/connection.php';

$sql = "INSERT INTO users values ('','$name','$email','$password','$NatID','$price','$mob','$rank')";

$query = mysql_query($sql);

if($query){
    echo 'Your data inserted Successfully';  
}

}

}

$ress = mysql_query("select * from ranks");
while ($row = mysql_fetch_row($ress)) {
    echo "<option value='$row[0]'>$row[1]</option>";
}

echo "
  
</select> <p>

<table border='0'>
<tr>
<td>
Full Name 
</td><td>
<input type='text' name='name'>
</td>
</tr>

<tr>
<td>
Email 
</td><td>
<input type='text' name='email'>
</td>
</tr>

<tr>
<td>
Password
</td><td>
<input type='text' name='password'>
</td>
</tr>

<tr>
<td>
Confirm Password
</td><td>
<input type='text' name='confirm'>
</td>
</tr>


<tr>
<td>
National ID 
</td><td>
<input type='text' name='NatID'>
</td>
</tr>

<tr>
<td>
Mobile Number 
</td><td>
<input type='text' name='mob'>
</td>
</tr>


<tr>
<td>
</td>
<td>
<input type='submit' name='submit' value='Insert'>
<input type='reset' name='reset' value='Clear'>
</td>

</tr>
</table>
</form>
";


?>

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
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
