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
$_SESSION['reservation_main_state'] = FALSE;
$_SESSION['extras_state'] = TRUE;
$_SESSION['checkout_state'] = FALSE;
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
unset($_SESSION['book1']);
$_SESSION['book1'] = array(
    'hall' => @$_GET['hallNo'],
    'package' => @$_GET['packId'],
    'res_date' => @$_GET['reseDate'],
    'streetaddress' => "myaddress",
    'city' => "cairo",
    'state' => "",
    'postal' => "12121",
    'country' => "Egypt"
);
if(isset($_SESSION['$_pack'])){
    unset($_SESSION['$_pack']);
}
$_SESSION['$_pack'] = new Package(@$_GET['packId']);
////////////////////////////////////////////////////////////////////////////////
echo "<script>setTimeout(\"location.href = '_booking.php';\",0);</script>";

