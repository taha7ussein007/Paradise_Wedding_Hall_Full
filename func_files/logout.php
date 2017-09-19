<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
    require_once '../pers_classes/Person.php';
    require_once '../func_classes/dbConnect.php';
    if(isset($_SESSION['login']))
    {
        $con_now = new dbConnect();
        $Person = new Person($_SESSION['email'], $_SESSION['password']);
        $Person->logout();
        echo '<script>alert("Logged Out Successfully ☺")</script>';
        echo "<script>setTimeout(\"location.href = '../Visitor/index.php';\",0);</script>"; 
    }
    else
    {
        echo "<script>alert('You Must Login First!')</script>";
        //header( "refresh:0; url='../Visitor/login.php'" );
        echo "<script>setTimeout(\"location.href = '../Visitor/login.php';\",0);</script>";   
    }

