<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
class Person {
    private $name = "";
    private $id;
    private $email = "";
    private $password = "";
    private $n_id = "";
    private $mob = "";
    //setters & getters
    public function set_name($name){
        $this->name = $name;
    }
    public function set_id($id){
        $this->id = $id;
    }
    public function set_email($email){
        $this->email = $email;
    }
    public function set_password($password){
        $this->password = $password;
    }
    public function set_n_id($national_id){
        $this->n_id = $national_id;
    }
    public function set_mob($mob){
        $this->mob = $mob;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_name(){
       return $this->name;
    }
    public function get_id(){
       return $this->id;
    }
    public function get_email(){
       return $this->email;
    }
    public function get_password(){
       return $this->password;
    }
    public function get_n_id(){
       return $this->n_id;
    }
    public function get_mob(){
       return $this->mob;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function __construct($email , $password){
        $this->email = $email;
        $this->password = $password;
        //fetch data
        $sql = mysql_query("SELECT * FROM users WHERE email = '".$this->email."'");
        $person_data = mysql_fetch_array($sql);
        $no_rows = mysql_num_rows($sql);
        if ($no_rows == 1){
        $this->name = $person_data['name'];
        $this->id = $person_data['id'];
        $this->n_id = $person_data['n_id'];
        $this->mob = $person_data['mob'];
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function detect_rank($email = null, $password = null){
        //fetch data
        if ($email == null) {$email = $this->email;}
        if ($password == null) {$password = $this->password;}
        $sql = mysql_query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
        $no_rows = mysql_num_rows($sql);	
            if ($no_rows == 1)
            {
                $person_data = mysql_fetch_array($sql);
                return $person_data['rank'];
            }
            else
            {
                return '0';
            }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function Login(){
    $res = mysql_query("SELECT * FROM users WHERE id = '".$this->id."'");
    $no_rows = mysql_num_rows($res);			
        if ($no_rows == 1)
        {
            $user_data = mysql_fetch_array($res);
                $_SESSION['login'] = TRUE;
                $_SESSION['welcome'] = FALSE;
                $_SESSION['name'] = $user_data['name'];
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['password'] = $user_data['password'];
                $_SESSION['n_id'] = $user_data['n_id'];
                $_SESSION['mob'] = $user_data['mob'];
                $_SESSION['rank'] = (int)$user_data['rank'];
                //
                setcookie("email",$this->email, time() + 60*60*24*30);
                return TRUE;
        }
                return FALSE;			 				 
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function logout(){         
        session_unset(); 
        // destroy the session 
        session_destroy();
        setcookie("email", $this->email, time() - 60*60*24*30);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function updatemyinfo(){
        $sqlupdate="UPDATE users SET password='".$this->password."' , email= '".$this->email."' , mob='".$this->mob."' WHERE id='".$this->id."'";
        $queryupdate = mysql_query($sqlupdate);
        if($queryupdate)
        {
            return TRUE;
        }
        return FALSE;
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////