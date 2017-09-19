<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Photographers - Paradise Wedding Hall</title>
        <link rel="stylesheet" type="text/css" href="../core/css/style.css">
        <link rel="stylesheet" type="text/css" href="../core/css/ie7.css">
        <link rel="shortcut icon" href="../core/Paradise_ico.png">
        <!-- Start Slider HEAD section -->
        <link rel="stylesheet" type="text/css" href="../core/engine1/style.css" />
        <script type="text/javascript" src="../core/engine1/jquery.js"></script>
        <!-- End Slider HEAD section -->
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
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="gallery.php">Gallery</a>
				</li>
				<li>
					<a href="blog.php">Blog</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
                                
                                <?php session_start();
                                if(!isset($_SESSION['login'])){echo '<li><a href="login.php">Login Now!</a></li>';}
                                else {echo '<li><a href="../func_files/logout.php">Logout</a></li>';} ?>
                                
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
                            <a href="#" title="wedding"><span><img src="../core/data1/tooltips/wedding.png" alt=""/>1</span></a>
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
    
	<div class="body">
		<div>
			<div>
				<div id="photographers">
					<ul>
						<li>
							<a href="index.php"><img src="../core/images/wedding-ring5.jpg" alt="Image"></a>
							<p>
								<span>Lester Dech</span> dolor sittiam and amet, consectetur adipiscing elit. Namien ac arcu ipsum, veliana suscipit turpis. Phasellus luctus dui ettien nisi porta congue. <span class="date">21/01/12</span>
							</p>
						</li>
						<li>
							<a href="index.php"><img src="../core/images/bridesmaid4.jpg" alt="Image"></a>
							<p>
								<span>Chris Manjow</span> curabitur eu arcu elit, aces post interdum arcu. Maecenas venenatis, orci euro congue pretium, nisi quam convallis erat, non tincidunt tortor quam porta. <span class="date">18/09/12</span>
							</p>
						</li>
						<li>
							<a href="index.php"><img src="../core/images/couples3.jpg" alt="Image"></a>
							<p>
								<span>Sam Smith</span> integer and congue varius odio vitae tincidunt. Aliquam foreget risus in quam iaculis accumasan id sed metus. Quisque tempus lorem id nisl lobortis quis adipiscing. <span class="date">20/09/12</span>
							</p>
						</li>
						<li>
							<a href="index.php"><img src="../core/images/wedding-cake4.jpg" alt="Image"></a>
							<p>
								<span>Ram Cool</span> pellentesque ina habitant morbi tristique senectus et netus et malesuada fames aces turpis egestas aliquam congue lacinia vehicula. Aenean vitae erat. <span class="date">17/09/12</span>
							</p>
						</li>
						<li>
							<a href="index.php"><img src="../core/images/flower7.jpg" alt="Image"></a>
							<p>
								<span>Mike Michaels</span> quisque tempus lorem id nisl lobortis quis adipiscing velit volutpat. Curabitur euro arcu elit, aces and interdum made arcu. Maecenas venenatis. <span class="date">19/09/12</span>
							</p>
						</li>
						<li>
							<a href="index.php"><img src="../core/images/flower8.jpg" alt="Image"></a>
							<p>
								<span>Rude Jude</span> ellentesque et tortor ante, ut euismod libero. Sedice fermentum mattis ante ut venenatis. Etiam nec augue ipsum, ac convallis dui et netus et malesuada fames. <span class="date">15/09/12</span>
							</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<ul>
			<li>
				<a href="blog.php">Blog</a>
			</li>
			<li>
				<a href="studio.php">Studio</a>
			</li>
			<li>
                                <a href="../User/booking.php">Bookings</a>
			</li>
			<li  class="current">
				<a href="photographers.php">Photographers</a>
			</li>
		</ul>
		<p>All Rights Reserved &copy; CSweepers Team</p>
	</div>
</body>
</html>