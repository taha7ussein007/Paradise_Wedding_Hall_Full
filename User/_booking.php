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
if(@isset($_POST['add_extras'])){
    unset($_SESSION['book1']);
    $_SESSION['book1'] = array(
        'hall' => @$_POST['hall'],
        'package' => @$_POST['package'],
        'res_date' => @$_POST['res_date'],
        'streetaddress' => @$_POST['streetaddress'],
        'city' => @$_POST['city'],
        'state' => @$_POST['state'],
        'postal' => @$_POST['postal'],
        'country' => @$_POST['country'],
        'comment' => @$_POST['comment']
    );
    if(isset($_SESSION['$_pack'])){
        unset($_SESSION['$_pack']);
    }
    $_SESSION['$_pack'] = new Package(@$_POST['package']);
////////////////////////////////////////////////////////////////////////////////
$_SESSION['reservation_main_state'] = FALSE;
$_SESSION['extras_state'] = TRUE;
$_SESSION['checkout_state'] = FALSE;
////////////////////////////////////////////////////////////////////////////////
}
if(@isset($_POST['res_main_checkout'])){
    unset($_SESSION['book1']);
    $_SESSION['book1'] = array(
        'hall' => @$_POST['hall'],
        'package' => @$_POST['package'],
        'res_date' => @$_POST['res_date'],
        'streetaddress' => @$_POST['streetaddress'],
        'city' => @$_POST['city'],
        'state' => @$_POST['state'],
        'postal' => @$_POST['postal'],
        'country' => @$_POST['country'],
        'comment' => @$_POST['comment']
    );
    if(isset($_SESSION['$_pack'])){
        unset($_SESSION['$_pack']);
    }
////////////////////////////////////////////////////////////////////////////////
$_SESSION['reservation_main_state'] = FALSE;
$_SESSION['extras_state'] = FALSE;
$_SESSION['checkout_state'] = TRUE;
////////////////////////////////////////////////////////////////////////////////
}
if(@isset($_POST['add_res'])){ 
  $_SESSION['$_pack']->add_resource(@$_POST['resource'], @$_POST['quantity']);
    //$newPrice = $_SESSION['$_pack']->getPackagePrice();
    //echo "<script>alert('Added to your package,\nNew Price: $newPrice\L.E ☺')</script>";
}
if(@isset($_POST['extras_checkout'])){
////////////////////////////////////////////////////////////////////////////////
$_SESSION['reservation_main_state'] = FALSE;
$_SESSION['extras_state'] = FALSE;
$_SESSION['checkout_state'] = TRUE;
////////////////////////////////////////////////////////////////////////////////
}
if(@isset($_POST['reservationSubmit'])){  
    
    if(isset($_SESSION['$_pack'])){
        if($_SESSION['$_pack']->getPackageState() == TRUE){
            $_SESSION['$_pack']->addNewPackage();
        }
        $packageId = $_SESSION['$_pack']->getPackageID();
    }
    else{
        $packageId = $_SESSION['book1']['package'];
    }
    $user = new User($_SESSION['email'], $_SESSION['password']);
    
    $result = $user->reserve($packageId);
    if($result == -1){
        echo"<script>alert('Sorry, Your Card Has Been Expired!!!')</script>";
        echo "<script>setTimeout(\"location.href = 'booking.php';\",0);</script>";
    }
    elseif($result == FALSE){
        echo"<script>alert('Reservation Not Successful :(\nPlease Try Again Shortly...')</script>";
        echo "<script>setTimeout(\"location.href = 'booking.php';\",0);</script>";
    }
    else{
         //should echo the invoice
    }
}
if(@isset($_POST['extras_back'])){
////////////////////////////////////////////////////////////////////////////////
$_SESSION['reservation_main_state'] = TRUE;
$_SESSION['extras_state'] = FALSE;
$_SESSION['checkout_state'] = FALSE;
////////////////////////////////////////////////////////////////////////////////
}
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
					<a href="rescheduling.php">My Reservations</a>
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
    
        <br><br><center><h2 class="myh2">Book Now!</h2></center>
    	<div id="body"><div><div><div></div></div></div></div>
        <?php if( $_SESSION['reservation_main_state'] == TRUE){
        echo'<link rel="stylesheet" type="text/css" href="view.css" media="all">
        <div id="main_body">
            <div id="form_container">
            <h1><a>Reservation</a></h1>
            <form id="reservation_main_form" class="appnitro" method="post">
                <div class="form_description">
                        <h2>Reservation</h2>
                        <p></p>
                </div>			
                    <ul>
                    
                    <li id="li_1" >
                     <div class="left">
                         <label class="description" for="hall">Hall </label>
                             <select class="element select medium" id="hall" name="hall" required=""> 
                             <option value="" selected="selected">Choose Hall</option>
                        ';?>
                        <?php
                        $halls_info = mysql_query("select hall_no,hall_name from halls");
                        while($hall = mysql_fetch_row($halls_info))
                        {
                            echo"<option value='$hall[0]'>$hall[0]- $hall[1]</option>";
                        }
                        ?>
                        <?php echo'
                             </select>
                    </div> 

                     <div class="right">
                        <label class="description" for="package">Choose Package </label>
                        <select class="element select medium" id="package" name="package" required="" disabled="disabled"> 
                        <option value="" selected="selected">Select Package</option>
                        ';?>
                        <?php
                        $result = mysql_query("select pack_id from packages where state=false order by pack_id");
                        $ind = 0;
                        while($pack_id = mysql_fetch_row($result))
                        {
                            $package[$ind] = new Package($pack_id[0]);
                            //with ajax to disable packs                            
                            $title = "Price\n".$package[$ind]->getPackagePrice();
                            echo"<option class='".$package[$ind]->getPackageHallNo()."' title='$title' value='".$package[$ind]->getPackageID()."' disabled='disabled'>".$package[$ind]->getPackageID()."- ".$package[$ind]->getPackageType().", ".$package[$ind]->getPackagePrice()."L.E"."</option>";
                            //will used later
                            $hall_no[$ind] = $package[$ind]->getPackageHallNo();
                            //
                            $ind++;
                        }
                        ?>
                        <?php echo'
                        </select>                     
                    </div> 
                    </li>
                    
                    <li id="li_1" >
                     <div>
                        <label class="description" for="date">Choose Date:</label>
                        <select class="element select medium" id="date" type="post" name="res_date" required="" disabled="disabled">
                            <option value="" selected="selected">Select a date</option>
                        ';?>
                        <?php
                        $i = 2;
                        while($i < 23)
                        {
                            $date = date("d/m/Y", time()+(86400*$i));
                            for($j = 0; $j < count($hall_no); $j++){
                                if(Package::isFree($hall_no[$j], $date)){
                                    echo"<option class='c$hall_no[$j]' value='$date'>$date</option>";
                                }
                                else{
                                    echo"<option class='cbusy$hall_no[$j]' value='$date'>$date</option>";
                                }
                            }
                            $i++;
                        }
                        ?>
                        <?php echo'
                        </select>
                    </div> 
                    </li>
                     
                     <li id="li_1" >
                     <label class="description" for="streetaddress" >Address </label>

                     <div>
                             <input id="streetaddress" name="streetaddress" class="element text large" value="" type="text" required="">
                             <label for="streetaddress">Street Address</label>
                     </div>
 
                     <div class="left">
                             <input id="city" name="city" class="element text medium" value="" type="text" required="">
                             <label for="city">City</label>
                     </div>

                     <div class="right">
                             <input id="state" name="state" class="element text medium" value="" type="text" required="">
                             <label for="state">State / Province / Region</label>
                     </div>

                     <div class="left">
                             <input id="postal" name="postal" class="element text medium" maxlength="15" value="" type="text" required="">
                             <label for="postal">Postal / Zip Code</label>
                     </div>

                     <div class="right">
                             <select class="element select medium" id="country" name="country" required=""> 
                             <option value="" selected="selected">Select Your Country</option>
                             <option value="Egypt" >Egypt</option>
                             </select>
                     <label for="country">Country</label>
                     </div>
                     </li>
                     <li id="li_2" >
                     <label class="description" for="comment">Add Comment </label>
                     <div>
                    <textarea id="comment" name="comment" class="element textarea small" value="" maxlength="255"></textarea> 
                     </div><p class="guidelines" id="guide_2"><small>Enter Your Comments </small></p> 
                     </li>
                     </ul>
                    <!-- Bootstrap core CSS -->
                    <link href="../core/dist/css/bootstrap.min.css" rel="stylesheet">
                    <link href="../core/dist/css/custom.css" rel="stylesheet">
                    <link href="../core/dist/css/custom_btn.css" rel="stylesheet">
                    <center><div class="btn-group">
                        <button type="submit" name="add_extras" class="btn btn-default btn-sm col-sm-pull-7">Add Extras to my package</button>
                        <button type="submit" name="res_main_checkout" class="btn btn-default btn-sm col-sm-push-7">Checkout -></button>
                    </div></center>
                    <link rel="stylesheet" type="text/css" href="view.css" media="all">
                    </form>
             </div>                                
        </div>';} ?>
        
    <script>
    //--------------------------------------------------------------------------
    $("#hall").change(function(){
        $('#package').val(""); //reset to default value
        $('#date').val(""); //reset to default value
        if($(this).val() !== ""){$(this).nextAll().remove();
            //enable the drop-down list
            $('#package').prop('disabled', false);
            $('#date').prop('disabled', false);
            //get the selected hall
            var selectedHall = $(this).val();
            //enable all packages of the selected hall
            $("#package").ready(function() {
                //iterate and disable all packs first
                $("#package > option").each(function() {
                    $(this).attr("disabled", true);
                });
                //iterate to hide & disable all dates first
                $("#date > option").each(function() {
                    $(this).hide();
                    $(this).attr("disabled", true);
                });
                //enable first option by value
                $("#package option[value='']").attr("disabled", false);
                $("#date option[value='']").show();
                $("#date option[value='']").attr("disabled", false);
                /*enable all available packages and show all
                free dates of the selected hall by class name*/
                //packs
                $("."+selectedHall).prop("disabled",false);
                //dates
                $(".c"+selectedHall).show();
                $(".c"+selectedHall).prop("disabled",false);
                $(".cbusy"+selectedHall).show();
            });
        }//endif
        else{$(this).after('<font color="red">*required field</font>');
            $('#package').prop('disabled', true);
            $('#date').prop('disabled', true);            
        }
    });
    //--------------------------------------------------------------------------
    $('#package').change(function(){
        if($(this).val() !== ""){$(this).nextAll().remove();}
        else{$(this).after('<font color="red">*required field</font>');}
    });
    //--------------------------------------------------------------------------
    $('#date').change(function(){
        if($(this).val() !== ""){$(this).nextAll().remove();}
        else{$(this).after('<font color="red">*required field</font>');}
    });
    //--------------------------------------------------------------------------
    
    $('#streetaddress').change(function(){
        if($(this).val() !== ""){$(this).nextAll().remove();}
        else{$(this).after('<font color="red">*required field</font>');}
    });
    //--------------------------------------------------------------------------
    $('#city').change(function(){
        if($(this).val() !== ""){$(this).nextAll().remove();}
        else{$(this).after('<font color="red">*required field</font>');}
    });
    //--------------------------------------------------------------------------
    $('#state').change(function(){
        if($(this).val() !== ""){$(this).nextAll().remove();}
        else{$(this).after('<font color="red">*required field</font>');}
    });
    //--------------------------------------------------------------------------
    $('#postal').change(function(){
        if($(this).val() !== ""){$(this).nextAll().remove();}
        else{$(this).after('<font color="red">*required field</font>');}
    });
    //--------------------------------------------------------------------------
    $('#country').change(function(){
        if($(this).val() !== ""){$(this).nextAll().remove();}
        else{$(this).after('<font color="red">*required field</font>');}
    });
    //--------------------------------------------------------------------------
    </script>
        
    <?php if( $_SESSION['extras_state'] == TRUE ){
    echo'<link rel="stylesheet" type="text/css" href="view.css" media="all">
    <div id="main_body">
        <div id="form_container">
        <h1><a>Extras</a></h1>
        <form id="extras" class="appnitro"  method="post" action="">
            <div class="form_description">
                    <h2>Extras</h2>
                    <p></p>
            </div>
        <ul> 
        <li id="li_1">
        
        <div class="left">
        <label class="description" for="resource">Resource </label>
        <select class="element select large" id="resource" name="resource"> 
            <option value="" selected="selected">Choose Resource</option>
            ';?>
            <?php
            $res_inf = mysql_query("select res_id,res_type,price_per_unit,quantity from resources");
            while ($resource = mysql_fetch_row($res_inf)){
                $packTmp = new Package($_SESSION['book1']['package']);
                if($packTmp->get_remained_res($resource[0]) > 0)
                {
                    echo"<option value='$resource[0]'>$resource[0]- $resource[1], $resource[2]L.E Per Unit</option>";    
                }
             }
            ?>
            <?php echo'
        </select>
        </div> 

        <div class="right">
        <label class="description" for="quantity">Quantity </label>
        <select class="element select" id="quantity" name="quantity" disabled="disabled"> 
            <option value="" selected="selected">Select Quantity</option>
            ';?>
            <?php
            $res_inf2 = mysql_query("select res_id from resources order by res_id");
            while ($resource = mysql_fetch_row($res_inf2)){
                for($t = 1; $t <= $packTmp->get_remained_res($resource[0]) ; $t++){
                    echo"<option class='res$resource[0]' value='$t' disabled='disabled'>$t</option>";    
                }
            }
            ?>
            <?php echo'
        </select> 
        </div>
        
        </li>
        </ul><br>
            
        <!-- Bootstrap core CSS -->
        <link href="../core/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../core/dist/css/custom.css" rel="stylesheet">
        <link href="../core/dist/css/custom_btn.css" rel="stylesheet">
        <center><div class="btn-group">
            <button type="button" name="extras_back" onclick="window.location=\'booking.php\'" class="btn btn-default btn-sm col-sm-pull-6"><- Back</button>
            <button type="button" name="add_res" id="add_res" class="btn btn-default btn-sm">Add to my package</button>
            <button type="submit" name="extras_checkout" class="btn btn-default btn-sm col-sm-push-6">Checkout -></button>
        </div></center>
        <link rel="stylesheet" type="text/css" href="view.css" media="all">
        </form>
        </div>
    </div>';} ?>
    <script>
    //--------------------------------------------------------------------------
    $("#resource").change(function(){
        $('#quantity').val(""); //reset to default value
        if($(this).val() !== ""){ $(this).nextAll().remove();
            //enable the drop-down list
            $('#quantity').prop("disabled", false);
            //add required attribute
            $(this).attr('required', true);
            $('#quantity').attr('required', true);
            //get the selected resource
            var selectedResource = $(this).val(); //selected option
            //enable available quantity of the selected resource
            $("#quantity").ready(function() {
                //iterate to hide & disable all quantities first
                $("#quantity > option").each(function() {
                    $(this).hide();
                    $(this).attr("disabled", true);     
                });
                //show & enable first option by value
                $("#quantity option[value='']").show();
                $("#quantity option[value='']").attr("disabled", false);
                //show & enable resource options by class name
                $(".res"+selectedResource).show();
                $(".res"+selectedResource).attr("disabled", false);
                //insert all at first of the list
                $(".res"+selectedResource).insertAfter('#quantity option:first-child');
            });
        }//endif
        else{
            $('#quantity').prop('disabled', true);
            //remove required attribute
            $(this).removeAttr('required');
            $('#quantity').removeAttr('required');
        }
    });
    //--------------------------------------------------------------------------
    $('#add_res').click(function(){
        if($('#quantity').val() !== ""){
            $(this).prop('type', 'submit');
        }
        else{
            $(this).prop('type', 'button');
            alert('Nothing To Add!!!');
        }
    });
    //--------------------------------------------------------------------------
    </script>
    
    <?php if($_SESSION['checkout_state'] == TRUE ){
    echo'<link rel="stylesheet" type="text/css" href="view.css" media="all">
    <div id="main_body">
	<div id="form_container">
        <h1><a>Payment</a></h1>
        <form id="form_1005923" class="appnitro"  method="post" action="">
            <div class="form_description">
                    <h2>Payment</h2>
                    <p></p>
            </div>						
            <ul >	
		<li id="li_4">
		<label class="description" for="cash">Choose Method </label>
		<span>
                <input id="cash" name="cash" class="checkbox" type="checkbox" value="cash" checked=""/>
                <label class="choice" for="cash">Cash</label>
                <input id="credit" name="credit" class="checkbox" type="checkbox" value="credit" />
                <label class="choice" for="credit">Visa / Credit - Debit Card</label>
		</span><p class="guidelines" id="guide_4"><small>**In case cash shipping expenses 50L.E will be added.</small></p> 
		</li>
                
    <div id="caseCredit" hidden>
                <li id="li_1" >
		<label class="description" for="card_no">Card Number </label>
		<div>
                        <input id="card_no" name="card_no" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Enter your Card Number</small></p> 
		</li>
                
                <li id="li_2" >
		<label class="description" for="fname">Name On Card </label>
		<span>
			<input id="fname" name= "fname" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
                        <input id="lname" name= "lname" class="element text" maxlength="255" size="14" value=""/>
                        <label>Last</label>
		</span><p class="guidelines" id="guide_2"><small>Enter the on your Card</small></p> 
		</li>
                
                <li id="li_3" >
		<label class="description" for="element_3_2">Expiration Date </label>
                <span>
                        <input id="element_3_2" name="exp_day" class="element text" size="2" value="" maxlength="2" type="text"> /
			<label for="element_3_2">DD</label>
		</span>
		<span>
			<input id="element_3_1" name="exp_month" class="element text" size="2" value="" maxlength="2" type="text"> /
			<label for="element_3_1">MM</label>
		</span>
		<span>
	 		<input id="element_3_3" name="exp_year" class="element text" size="4" value="" maxlength="4" type="text">
			<label for="element_3_3">YYYY</label>
		</span>
		<span id="calendar_3">
			<img id="cal_img_3" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField   : "element_3_3",
			baseField    : "element_3",
			displayArea  : "calendar_3",
			button	     : "cal_img_3",
			ifFormat     : "%B %e, %Y",
			onSelect     : selectDate
			});
		</script>
		<p class="guidelines" id="guide_3"><small>Enter When the Card will Expire !!</small></p> 
		</li>
    </div>			
                </ul>
        <!-- Bootstrap core CSS -->
        <link href="../core/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../core/dist/css/custom.css" rel="stylesheet">
        <link href="../core/dist/css/custom_btn.css" rel="stylesheet">
        <center><div class="btn-group">
            <button type="button" name="checkout_back" onclick="window.location=\'booking.php\'" class="btn btn-default btn-sm col-sm-pull-12"><- Back</button>
            <button type="submit" name="reservationSubmit" class="btn btn-default btn-sm col-sm-push-12">Submit -></button>
        </div></center>
        <link rel="stylesheet" type="text/css" href="view.css" media="all">
        </form>
        </div>                                
    </div>';} ?>
    <!-- Make Check Boxes Act Like Radio Buttons -->
    <script>
    var selectedBox = null;
    $(document).ready(function() {
        $(".checkbox").click(function() {
            selectedBox = this.id;
            $(".checkbox").each(function() {
                if ( this.id === selectedBox )
                {
                    this.checked = true;                 
                    //show credit div
                    if('credit' === selectedBox ){
                        $('#caseCredit').show();
                        $('#card_no').attr("required",true);
                        $('#fname').attr("required",true);
                        $('#lname').attr("required",true);
                        $('#exp_day').attr("required",true);
                        $('#exp_month').attr("required",true);
                        $('#exp_year').attr("required",true);
                    }
                }
                else
                {
                    this.checked = false;
                    //hide credit div
                    $('#caseCredit').hide();
                    $('#card_no').attr("required",false);
                    $('#fname').attr("required",false);
                    $('#lname').attr("required",false);
                    $('#exp_day').attr("required",false);
                    $('#exp_month').attr("required",false);
                    $('#exp_year').attr("required",false);
                    
                };        
            });
        });    
    });
    </script>

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
