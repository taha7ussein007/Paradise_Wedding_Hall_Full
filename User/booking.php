<?php 
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
$_SESSION['reservation_main_state'] = TRUE;
$_SESSION['extras_state'] = FALSE;
$_SESSION['checkout_state'] = FALSE;
////////////////////////////////////////////////////////////////////////////////
echo "<script>setTimeout(\"location.href = '_booking.php';\",0);</script>";