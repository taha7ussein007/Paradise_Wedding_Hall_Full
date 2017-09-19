<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
require_once '../func_classes/PersonRank.php';
///////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_SESSION['rank'])){
    switch ($_SESSION['rank'])
    {   
        case $_SESSION['Admin']:
            header("location: ../Admin/index.php");
        break;
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        case $_SESSION['Manager']:
            header("location: ../Manager/index.php");
        break;
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        case $_SESSION['Financial']:
            header("location: ../Financial/index.php");
        break;
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        case $_SESSION['Technical']:
            header("location: ../Technical/index.php");
        break;
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        case $_SESSION['User']:
            header("location: ../User/index.php");
        break;
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        default: //Visitor /*Should Not Appear!*/
            echo file_get_contents('index.html');
            break;
    }//endswitch
}//endif
else
{
    echo file_get_contents('index.html');
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////