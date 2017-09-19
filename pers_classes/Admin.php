<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
require_once 'Employee.php';
require_once 'Technical.php';
class Admin extends Employee{
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function add_tech(Technical $tech){
         //fetch data
        $sql2 = mysql_query("SELECT * FROM users WHERE email = '".$tech->get_email()."' OR n_id = '".$tech->get_n_id()."' OR mob = '".$tech->get_mob()."'");
        $no_rows2 = mysql_num_rows($sql2);	
            if ($no_rows2 > 0)
            {
                return FALSE;
            }
        $sql_add = "INSERT INTO users('name','email','password','n_id','mob','rank') VALUES ('".$tech->get_name()."', '".$tech->get_email()."', '".$tech->get_password()."', '".$tech->get_n_id()."', '".$tech->get_mob()."', '".$_SESSION['Technical']."')";
        $sql = mysql_query($sql_add);
        $no_rows = mysql_num_rows($sql);
        if ($no_rows == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }      
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function deletetech($tech_email){
        //fetch data
        $sql = mysql_query("SELECT * FROM users WHERE email = '".$tech_email."'");
        $no_rows = mysql_num_rows($sql);	
            if ($no_rows == 1)
            {
                $sql_del = "DELETE FROM users WHERE email = '".$tech_email."'";
                $sql = mysql_query($sql_del);
                $no_rows = mysql_num_rows($sql);
                if ($no_rows == 1)
                {
                    return TRUE;
                }
            }
            return FALSE;           
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function view_tech_reports(){
      $sql = mysql_query("SELECT * FROM reports WHERE rank ='".$_SESSION['Technical']."'");
      $reports_data = mysql_fetch_array($sql);
      $no_rows = mysql_num_rows($sql);	
            if ($no_rows > 0)
            {
                return $reports_data['content'];
            }
            else
            {
                return FALSE;
            }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function listusers(){
       $sql = mysql_query("SELECT * FROM users WHERE rank ='".$_SESSION['User']."'");
       $users_data = mysql_fetch_array($sql);
       $no_rows = mysql_num_rows($sql);	
            if ($no_rows > 0)
            {
                return $users_data;
            }
            else
            {
                return FALSE;
            }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function listEmployees(){
       $sql = mysql_query("SELECT * FROM users WHERE rank not in('".$_SESSION['Admin']."','".$_SESSION['User']."')");
       $Employees_data = mysql_fetch_array($sql);
       $no_rows = mysql_num_rows($sql);	
            if ($no_rows > 0)
            {
                return $Employees_data;
            }
            else
            {
                return FALSE;
            }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
