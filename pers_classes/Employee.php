<?php
require_once 'Person.php';

class Employee extends Person {
    private $salary;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($email , $password){
        Person::__construct($email , $password);
        //fetch data
        $sql = mysql_query("SELECT * FROM salaries WHERE e_id = '".$this->get_id()."'");
        $emp_data = mysql_fetch_array($sql);
        $no_rows = mysql_num_rows($sql);
        if ($no_rows == 0){
        $this->salary = $emp_data['salary'];
            }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     
    public function set_salary($salary){
        $this->salary = $salary;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_salary(){
       return $this->salary;
    }
    public function Login(){
    $res = mysql_query("SELECT * FROM users JOIN salaries ON users.id = '".$this->get_id()."' AND users.id=salaries.e_id");
    $no_rows = mysql_num_rows($res);			
        if ($no_rows == 1)
        {
            $user_data = mysql_fetch_array($res);
            //if session not started -> start session
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            ////////////////////////////////////////////////////////////////////////////////
                $_SESSION['login'] = TRUE;
                $_SESSION['welcome'] = FALSE;
                $_SESSION['name'] = $user_data['name'];
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['password'] = $user_data['password'];
                $_SESSION['n_id'] = $user_data['n_id'];
                $_SESSION['mob'] = $user_data['mob'];
                $_SESSION['rank'] = $user_data['rank'];
                $_SESSION['salary'] = $user_data['salary'];
                //
                setcookie("email",$this->get_email(), time() + 60*60*24*30);
                return TRUE;
        }
                return FALSE;			 				 
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
