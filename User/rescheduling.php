<?php
require_once '../func_files/include.php';
require_once '../func_classes/Package.php';
require_all_once();
new dbConnect();
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
if(!isset($_SESSION['login']))
    {
        echo "<script>alert('You Must Login First!')</script>";
        echo "<script>setTimeout(\"location.href = '../Visitor/login.php';\",0);</script>";   
    }
elseif($_SESSION['rank'] == $_SESSION['User']){
//------------------------------------------------------------------------------
//get all variables here

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Bookings - Paradise Wedding Hall</title>
        <link rel="stylesheet" type="text/css" href="../core/css/style.css">
	<link rel="stylesheet" type="text/css" href="../core/css/ie7.css">
        <link rel="shortcut icon" href="../core/Paradise_ico.png"> 
        <!-- Start Slider HEAD section -->
        <link rel="stylesheet" type="text/css" href="../core/engine1/style.css" />
        <script type="text/javascript" src="../core/engine1/jquery.js"></script>
        <!-- End Slider HEAD section -->
        <script type="text/javascript" src="view.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="assets/js/ie-emulation-modes-warning.js"></script>
        <!-- Calendar js -->
        <script src="calendar.js"></script>
</head>

<body>
	<div id="header">
		<div>
			<a href="index.php"><img src="../core/images/logo.png" alt="Image"></a>
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="../Visitor/about.php">About</a>
				</li>
				<li>
					<a href="../Visitor/gallery.php">Gallery</a>
				</li>
				<li>
					<a href="../Visitor/blog.php">Blog</a>
				</li>
				<li>
					<a href="../Visitor/contact.php">Contact</a>
				</li>
                                <li>
                                    <a href="../func_files/logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>
        <div id="figure"><br>
            <!-- Start Slider BODY section -->
            <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    <li><img src="../core/data1/images/wedding.png" alt="" title="" id="wows1_0"/></li>
                    <li><img src="../core/data1/images/wedding1.png" alt="wedding1" title="wedding1" id="wows1_1"/></li>
                    <li><img src="../core/data1/images/wedding2.png" alt="wedding2" title="wedding2" id="wows1_2"/></li>
                    <li><img src="../core/data1/images/wedding3.png" alt="wedding3" title="wedding3" id="wows1_3"/></li>
                    <li><img src="../core/data1/images/wedding4.png" alt="wedding4" title="wedding4" id="wows1_4"/></li>
                    <li><img src="../core/data1/images/wedding5.png" alt="wedding5" title="wedding5" id="wows1_5"/></li>
                    <li><img src="../core/data1/images/wedding6.png" alt="wedding6" title="wedding6" id="wows1_6"/></li>
                </ul>
            </div>
                    <div class="ws_bullets">
                        <div>
                            <a href="#" title=""><span><img src="../core/data1/tooltips/wedding.png" alt=""/>1</span></a>
                            <a href="#" title="wedding1"><span><img src="../core/data1/tooltips/wedding1.png" alt="wedding1"/>2</span></a>
                            <a href="#" title="wedding2"><span><img src="../core/data1/tooltips/wedding2.png" alt="wedding2"/>3</span></a>
                            <a href="#" title="wedding3"><span><img src="../core/data1/tooltips/wedding3.png" alt="wedding3"/>4</span></a>
                            <a href="#" title="wedding4"><span><img src="../core/data1/tooltips/wedding4.png" alt="wedding4"/>5</span></a>
                            <a href="#" title="wedding5"><span><img src="../core/data1/tooltips/wedding5.png" alt="wedding5"/>6</span></a>
                            <a href="#" title="wedding6"><span><img src="../core/data1/tooltips/wedding6.png" alt="wedding6"/>7</span></a>
                       </div>
                    </div>
            </div>	
            <script type="text/javascript" src="../core/engine1/wowslider.js"></script>
            <script type="text/javascript" src="../core/engine1/script.js"></script>
            <!-- End Slider BODY section -->
        </div>
    
<br><br><center><h2 class="myh2" style="font-size: 30px;">My Reservations</h2></center>
    	<div id="body"><div><div><div></div></div></div></div>
        <!-- Bootstrap core CSS -->
        <link href="../core/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../core/dist/css/custom.css" rel="stylesheet">
        <link href="../core/dist/css/custom_btn.css" rel="stylesheet">
         <!-- Table Of Contents from database ================================================== -->  
    <div class="container mekky">
        <div class="panel panel-primary mekky">
        <!-- Default panel contents -->
        <div class="panel-heading mekky"><center><font size='4'>▼&nbsp;&nbsp;&nbsp; Your   Reservations &nbsp;&nbsp;&nbsp;▼</font></center></div>
        <form method="post">
        <!-- Table -->
        <table class="table" border='2' border-color='blue'>
            <?php
            echo "<th bgcolor=#efe2d3>#</th>";
            echo "<th bgcolor=#efe2d3>Date</th>";
            echo "<th bgcolor=#efe2d3>Show Invoice</th>";
            echo "<th bgcolor=#efe2d3>Change Date</th>";
            echo "<th bgcolor=#efe2d3>Add Extras</th>";
            
            //Do the query
            $u_id = $_SESSION['id'];
            $query = "SELECT id,date,pack_id FROM reservation_config WHERE u_id='$u_id'";
            $result = mysql_query($query);
            //iterate over all the rows
            while($row = mysql_fetch_row($result))
            {
                $q = mysql_query("SELECT packages.hall_no
                            FROM packages
                            JOIN reservation_config
                            ON packages.pack_id=reservation_config.pack_id
                            AND reservation_config.id = '$row[0]'");
                $hallNo = mysql_fetch_row($q);
                //
                $invquery = "SELECT path FROM invoices WHERE reserv_id='$row[0]'";
                $invPath = mysql_query($invquery);
                $path = mysql_fetch_row($invPath);                
                echo "
                    <tr>
                       <td bgcolor=#efe2d3>$row[0]</td>
                       <td bgcolor=#efe2d3>$row[1]</td>
                       <td bgcolor=#efe2d3><a href='#' onclick='window.open(\"$path[0]\")'>Show Invoice</a></td>";
                
                    $resDate = $row[1];
                    $resDateHold = $row[1];
                    $splittedDate = explode('/', $resDate);
                    $resDate = $splittedDate[2].'-'.$splittedDate[1].'-'.$splittedDate[0];
                    $datetime1 = new DateTime($resDate);
                    $datetime2 = new DateTime(date("Y-m-d", time()+60*60*24));
                    $interval = $datetime1->diff($datetime2);
                    
                    if($interval->format('%a') > '1')
                    {
                        $i = 1;
                        echo '<td bgcolor=#efe2d3>'
                        . '<select name="rescDate" onchange="this.form.submit()">'
                        . "<option value='' >Choose Date</option>";
                        
                        while($i < 22)
                        {
                            $date = date("d/m/Y", time()+(86400*$i));
                            if(Package::isFree($hallNo[0], $date)){
                                echo"<option value='$date'>$date</option>";
                            }
                            else{
                                echo"<option value='$date' disabled='disabled'>$date</option>";
                            }
                            $i++;
                        }
                        echo '</select>'
                        . '</td>';
                        
                        
                        if(@isset($_POST['rescDate']) && @strlen($_POST['rescDate']) > 8){
                            $resDateHold = @$_POST['rescDate'];
                            mysql_query("UPDATE paradise_wedding_hall.reservation_config SET date='$resDateHold' WHERE reservation_config.id='$row[0]'");
                            echo "<script>setTimeout(\"location.href = 'rescheduling.php';\",0);</script>";
                        }
                        echo "<td bgcolor=#efe2d3><a href='extras.php?packId=$row[2]&resId=$row[0]&hallNo=$hallNo[0]&reseDate=$row[1]'>Add Extras</</a></td>";
                    }
                    else
                    {
                        echo"<td bgcolor=#efe2d3><a href='#' onclick='alert(\"You Cannot Change This Reservation!\")'>Change Date</a></td>";
                        echo"<td bgcolor=#efe2d3><a href='#' onclick='alert(\"You Cannot Change This Reservation!\")'>Add Extras</a></td>";
                    }
            }
            ?>
        </table>
       </form>
      </div>
    </div>
    <!-- Footer ================================================== -->      
    <link rel="stylesheet" type="text/css" href="../core/css/style.css">
    <div id="body"><div><div><div></div></div></div></div>

    <div id="footer">
            <ul>
                    <li>
                            <a href="../Visitor/blog.php">Blog</a>
                    </li>
                    <li>
                            <a href="../Visitor/studio.php">Studio</a>
                    </li>
                    <li class="current">
                            <a href="../User/booking.php">Bookings</a>
                    </li>
                    <li>
                            <a href="../Visitor/photographers.php">Photographers</a>
                    </li>
            </ul>
            <p>All Rights Reserved &copy; CSweepers Team</p>
    </div>
        
        
    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    
</body>
</html>
<?php
    }
    else
    {
        echo '<script>alert("You Don\'t Have Permission To Access This Page!")</script>';
        echo file_get_contents('../func_files/closew.html'); 
    }






















