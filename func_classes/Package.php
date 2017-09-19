<?php
require_once 'dbConnect.php';
$con = new dbConnect();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class pack_res{
    private $id;
    private $type;
    private $quantity;
    private $price;
    function set_res_id($id){
        $this->id = $id;
    }
    function set_res_type($type){
        $this->type = $type;
    }
    function  set_res_quantity($quantity){
        $this->quantity = (int)$quantity;
    }
    function  set_res_price($price_per_unit){
        $this->price = (double)$price_per_unit;
    }
    function get_res_id(){
        return $this->id; 
    }
    function get_res_type(){
        return $this->type;
    }
    function  get_res_quantity(){
        return $this->quantity;
    }
    function  get_res_price(){
        return $this->price;
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class Package {
    private $id;
    private $type;
    private $price;
    private $hall_no;
    private $resource;//array of recources
    private $state;// bool "false" -> basic "true"-> customized
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function __construct($Package_ID){
        $this->id = $Package_ID;
        $result = mysql_query("select pack_type,pack_price,hall_no,state from packages where pack_id='$this->id'");
        $row = mysql_fetch_row($result);
        $this->type = $row[0];
        $this->price = (double)$row[1];
        $this->hall_no = $row[2];
        $this->state = $row[3];
        //////////////////////////////
        //$this->resource =  array();
        $result2 = mysql_query("select res_id,res_quantity from package_resources where pack_id='$this->id' order by res_id");
        $i = 0;
        while($row2 = mysql_fetch_row($result2)){
            $this->resource[$i] = new pack_res();
            $this->resource[$i]->set_res_id($row2[0]);
            $this->resource[$i]->set_res_quantity((int)$row2[1]);
            //////////////////////////////
            $result3 = mysql_query('select res_type,price_per_unit from resources where res_id="'.$this->resource[$i]->get_res_id().'"');
            $row3 = mysql_fetch_row($result3);
            $this->resource[$i]->set_res_type($row3[0]);
            $this->resource[$i]->set_res_price((double)$row3[1]);
            $i++;
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    private function get_max_res($res_id) {
        //get max allowed number of this resource
        $result = mysql_query("select quantity from resources where res_id='$res_id'");
        $row = mysql_fetch_row($result);
        return (int)$row[0]; //max quantity
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    private function find_res($res_id){
        //get the number of different resources in this package
        //search for this resource if exists
        for($no_of_res = count($this->resource)-1; $no_of_res >= 0 ; $no_of_res--){
            if($this->resource[$no_of_res]->get_res_id() == $res_id){
                return (int)$no_of_res; //as index for this resource
            }
        }
        return -1; //not found
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_remained_res($res_id){
        $max_res_quantity = $this->get_max_res($res_id);
        
        if(($index = $this->find_res($res_id)) != -1){
            $remained = $max_res_quantity - $this->resource[$index]->get_res_quantity();
            return $remained;
        }
        else{
            return $max_res_quantity;
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function add_resource($res_id, $quantity){
        //if this resource already exists in this package
        if(($index = $this->find_res($res_id)) != -1){
            //calculate the new package price
            $this->price += ((double)$quantity*$this->resource[$index]->get_res_price());
            (int)$quantity += $this->resource[$index]->get_res_quantity();
            $this->resource[$index]->set_res_quantity($quantity);
        }
        //if this is a new resource to this package
        else
        {
            $new_res_index = count($this->resource);
            $this->resource[$new_res_index] = new pack_res();
            $this->resource[$new_res_index]->set_res_id($res_id);
            $this->resource[$new_res_index]->set_res_quantity($quantity);
            //get resource type
            $result = mysql_query("select res_type,price_per_unit from resources where res_id='$res_id'");
            $res_inf = mysql_fetch_row($result);
            $this->resource[$new_res_index]->set_res_type($res_inf[0]);
            $this->resource[$new_res_index]->set_res_price($res_inf[1]);
            //calculate the new package price
            $this->price += ((double)$quantity*(double)$res_inf[1]);
        }
        //change package state from "basic" to "customized"
        $this->state = TRUE;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function isFree($hallNo, $date){
        $result = mysql_query("SELECT date
                                FROM reservation_config
                                JOIN packages
                                ON packages.pack_id=reservation_config.pack_id
                                AND packages.hall_no='$hallNo'
                                AND reservation_config.date='$date'");
        if(@mysql_num_rows($result) > 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function addNewPackage() {
        mysql_query("INSERT INTO packages (pack_type, pack_price, hall_no, state) VALUES ('$this->type','$this->price','$this->hall_no','$this->state')");
        $result = mysql_query("select max(pack_id) from packages");
        $packID = mysql_fetch_row($result);
        $this->id = $packID[0];
        
        $no_of_res = count($this->resource);
        for($i = 0; $i < $no_of_res; $i++){
           $resId = $this->resource[$i]->get_res_id();
           $resQuantity = $this->resource[$i]->get_res_quantity();
           mysql_query("INSERT INTO package_resources (pack_id, res_id, res_quantity) VALUES ('$this->id', '$resId', '$resQuantity')");
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getPackageID(){
        return $this->id;
    }
    public function getPackageType(){
        return $this->type;
    }
    public function getPackagePrice(){
        return $this->price;
    }
    public function getPackageHallNo(){
        return $this->hall_no;
    }
    public function getPackageResources(){
        return $this->resource;
    }
    public function getPackageState(){
        return $this->state;
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
