<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Studio - Paradise Wedding Hall</title>
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
    
	<div id="body">
		<div id="studio">
			<div>
				<div>
					<p>This website template has been designed by
						<a href="http://www.freewebsitetemplates.com/">Free Website Templates</a>
						for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the
						<a href="http://www.freewebsitetemplates.com/forums/">Forum</a>
						. Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What's more, they're absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the
						<a href="http://www.freewebsitetemplates.com/about/terms">Terms of Use</a>
						. You can even remove all our links if you want to. Looking for more templates? Just browse through all our
						<a href="http://www.freewebsitetemplates.com/">Free Website Templates</a>
						and find what you're looking for. But if you don't find any website template you can use, you can try our
						<a href="http://www.freewebsitetemplates.com/freewebdesign/">Free Web Design</a>
						service and tell us all about it. Maybe you're looking for something different, something special. And we love the challenge of doing something different and something special. If you're experiencing issues and concerns about this website template, join the discussion
						<a href="http://www.freewebsitetemplates.com/forums/">on our forum</a>
						and meet other people in the community who share the same interests with you.</p>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<ul>
			<li>
				<a href="blog.php">Blog</a>
			</li>
			<li class="current">
				<a href="studio.php">Studio</a>
			</li>
			<li>
                                <a href="../User/booking.php">Bookings</a>
			</li>
			<li>
				<a href="photographers.php">Photographers</a>
			</li>
		</ul>
		<p>All Rights Reserved &copy; CSweepers Team</p>
	</div>
</body>
</html>