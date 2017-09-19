<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
    require_once '../func_files/include.php';
    require_all_once();
    //case login
    if(@$_POST['login'])
    {
       $con_now = new dbConnect();
       $person = new Person(strip_tags($_POST['email']),strip_tags($_POST['password']));
       switch ($person->detect_rank())
       {
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////
           case $_SESSION['Admin']:
               $Admin = new Admin($person->get_email(), $person->get_password());
               $Admin->Login();
               echo "<script>alert('Welcome ".$Admin->get_name()." ☺')</script>";
               echo "<script>setTimeout(\"location.href = '../Admin/index.php';\",0);</script>";
               break;
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////
           case $_SESSION['Manager']:
               $Manager = new Manager($person->get_email(), $person->get_password());
               $Manager->Login();
               echo "<script>alert('Welcome ".$Manager->get_name()." ☺')</script>";
               echo "<script>setTimeout(\"location.href = '../Manager/index.php';\",0);</script>";
               break;
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////
           case $_SESSION['Financial']:
               $Financial = new Financial($person->get_email(), $person->get_password());
               $Financial->Login();
               echo "<script>alert('Welcome ".$Financial->get_name()." ☺')</script>";
               echo "<script>setTimeout(\"location.href = '../Financial/index.php';\",0);</script>";
               break;
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////
           case $_SESSION['Technical']:
               $Technical = new Technical($person->get_email(), $person->get_password());
               $Technical->Login();
               echo "<script>alert('Welcome ".$Technical->get_name()." ☺')</script>";
               echo "<script>setTimeout(\"location.href = '../Technical/index.php';\",0);</script>";
               break;
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////
           case $_SESSION['User']:
               $User = new User($person->get_email(), $person->get_password());
               $User->Login();
               echo "<script>alert('Welcome ".$User->get_name()." ☺')</script>";
               echo "<script>setTimeout(\"location.href = '../User/index.php';\",0);</script>";
               break;
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////
           default:
               echo "<script>alert('Email or Password Not Correct')</script>";
               goto LOGIN_PAGE;
               break;
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////           
       }//endswitch
    }//endif
    //case register
    else if(@$_POST['register'])
    {
    $con_now = new dbConnect();
        @ $user = new User(strip_tags($_POST['email']),strip_tags($_POST['password']));
            @$user->set_name(strip_tags($_POST['name']));
            @$confirm_pass = strip_tags($_POST['confirm_password']);
            @$user->set_n_id(strip_tags($_POST['n_id']));
            @$user->set_mob(strip_tags($_POST['mob_no']));
            if($user->get_password() == $confirm_pass)
            {
                    $is_exist = $user->detect_rank($user->get_password(), $user->get_email());
                    if(!$is_exist)
                    {
                            $register = $user->regme();
                            if($register) // Registration Success  
                            {
                                     echo "<script>alert('Registration Successful ☺')</script>";
                                     $user->Login();
                                     echo "<script>setTimeout(\"location.href = '../User/index.php';\",0);</script>";
                            }
                            else // Registration Failed
                            {
                                    echo "<script>alert('Registration Not Successful :(')</script>";
                                    goto LOGIN_PAGE;
                            }
                    } 
                    else
                    {
                            echo "<script>alert('Email Already Exist!')</script>";
                            goto LOGIN_PAGE;
                    }
            }
            else
            {
                    echo "<script>alert('Password Not Match!')</script>";
                    goto LOGIN_PAGE;

            }
    }
    //case browsing
    else
    { 
        LOGIN_PAGE:
        //$result = mysql_query("select * from pages where PageName='loginpage'");
        //$no_rows = mysql_num_rows($result);
        //if ($no_rows == 1)
        //{
        //$loginpage = mysql_fetch_row($result); 
        //echo $loginpage[1];
        echo file_get_contents('login.html');
        //}
        //else
        //{
           // echo "<script>alert('Error While Loading The Page! Please Try Again')</script>";
        //}

    }
