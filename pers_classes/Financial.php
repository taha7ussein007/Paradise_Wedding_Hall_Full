<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
require_once 'Employee.php';

class Financial extends Employee{
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function updateSalary($newSalary , $EmployyeeID)
    {
       $res = mysql_query("select * from salaries where e_id='$EmployyeeID'");
       $rows = mysql_num_rows($res);
       if($rows)
       {
            $res = mysql_query("update salaries set salary='$newSalary' where e_id='$EmployyeeID'");
            @$rows = mysql_num_rows($res);
            if($rows)
            {
                return TRUE;
            }
            return FALSE;
       }
       else
       {
            $res = mysql_query("insert into salaries values('$EmployyeeID','$newSalary')");
            @$rows = mysql_num_rows($res);
            if($rows)
            {
                return TRUE;
            }
            return FALSE;
       }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function listEmployees(){
       $sql = mysql_query("SELECT name , id , salary FROM users , salaries WHERE rank <>'".$_SESSION['User']."'");
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
