<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
require_once 'Employee.php';
require_once 'Financial.php';

class Manager extends Employee{
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function updateSalary($newFinancialSalary , $FinancialID)
    {
        $Financial = new Financial();
        if($Financial->updateSalary($newFinancialSalary, $FinancialID))
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }     
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function listEmployees(){
       $sql = mysql_query("SELECT * FROM users WHERE rank in('".$_SESSION['Financial']."','".$_SESSION['Technical']."')");
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
