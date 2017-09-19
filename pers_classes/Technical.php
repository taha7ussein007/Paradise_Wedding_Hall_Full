<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
require_once 'Employee.php';
require_once '../func_classes/PersonRank.php';

class Technical extends Employee{
     public function view_user_reports(){
      $sql = mysql_query("SELECT * FROM reports WHERE rank ='".$_SESSION['User']."'");
      $no_rows = mysql_num_rows($sql);	
            if ($no_rows > 0)
            {
                $reports_data = mysql_fetch_array($sql);
                return $reports_data['content'];
            }
            else
            {
                return FALSE;
            }
    }
}