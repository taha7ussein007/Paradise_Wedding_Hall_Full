<?php
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
require_once 'Person.php';
require_once '../func_classes/PersonRank.php';
require_once '../func_classes/Package.php';
require_once '../func_classes/PDFGenerator.php';
class User extends Person{    
    ///////////////////////////////////////////////////////////////////////////
    public function regme(){
        //fetch data
        $sql = mysql_query("SELECT * FROM users WHERE email = '".$this->get_email()."' OR n_id = '".$this->get_n_id()."' OR mob = '".$this->get_mob()."'");
        $no_rows = mysql_num_rows($sql);
            if ($no_rows > 0)
            {
                return FALSE;
            }
            $sql_add = "INSERT INTO users(name, email, password, n_id, mob, rank) values('".$this->get_name()."','".$this->get_email()."','".$this->get_password()."','".$this->get_n_id()."','".$this->get_mob()."','".$_SESSION['User']."')";
            mysql_query($sql_add);
                return TRUE;            
    }
    ///////////////////////////////////////////////////////////////////////////
    public function reserve($packageId){
        $pack = new Package($packageId);
        $u_id = $_SESSION['id'];
        $address = $_SESSION['book1']['streetaddress'].", ".$_SESSION['book1']['city'].", ".$_SESSION['book1']['state'].", ".$_SESSION['book1']['country'].". Postal: ".$_SESSION['book1']['postal'].".";
        
        if($pack->isFree($_SESSION['book1']['hall'], $_SESSION['book1']['res_date'])){
            
            if(@isset($_POST['credit'])){
                $card_no = cryptomizer::disguise(@$_POST['card_no']);
                $fname = @$_POST['fname'];
                $lname = @$_POST['lname'];
                $exp_day = @$_POST['exp_day'];              
                if (strlen($exp_day) === 1){$exp_day = "0".$exp_day;}
                $exp_date = $exp_day.'/'.@$_POST['exp_month'].'/'.@$_POST['exp_year'];   
                 //if(strtotime($exp_date) <= strtotime(date("d/m/Y"))){return -1;} //means card has been expired!
                mysql_query("insert into user_payment (u_id,address,card_no,fname_on_card,lname_on_card,expiration_date)"
                        . " values ('$u_id','$address','$card_no','$fname','$lname','$exp_date')");
                $res = mysql_query("select max(id) from user_payment");
                $paymentID = mysql_fetch_row($res);
                $payId = $paymentID[0];
            }            
            else{
                $payId = 0;
            }
            
            $resDate = $_SESSION['book1']['res_date'];
            mysql_query("INSERT INTO reservation_config (u_id,pack_id,payment_id,date) VALUES ('$u_id','$packageId','$payId','$resDate')");
            //get reservation id
            $resIdData = mysql_query("select max(id) from reservation_config");
            $resId = mysql_fetch_row($resIdData);
            //get id for the invoice
            $maxInvData = mysql_query("select max(id) from invoices");
            $maxInv = mysql_fetch_row($maxInvData);
            $invoice_id = $maxInv[0]+1;
            //make the invoice
            $invoice = new invoicePDF('P','mm',array(200,200));
            $invoice->AddPage();
            $ivoiceData = array(
                'invoiceId' => "$invoice_id",
                'invoiceDate' => date("d/m/Y"),
                'packageId' => "$packageId",
                'packageState' => $pack->getPackageState() ? "Customized" : "Basic",
                'reservationDate' => "$resDate",
                'customerName' => $_SESSION['name'],
                'mobile' => $_SESSION['mob'],
                'address' => "$address",
                'packagePrice' => $payId ? $pack->getPackagePrice() : (string)((int)$pack->getPackagePrice()+50),
                'payBy' => $payId ? "Credit" : "Cash / ('We will contact you shortly, Kindly save this invoice, Thank You ☺')"
            );
            $invoice->EventTable($ivoiceData);
            $filePath = "../User/invoices/invoice".$invoice_id.".pdf";
            $invoice->Output("$filePath",'F');
            //insert the invoice to the data base
            $type_state = ($payId ? 1 : 0);
            mysql_query("INSERT INTO invoices(reserv_id, path, type, state) VALUES ('$resId[0]','$filePath','$type_state','$type_state')");
            //insert comments
            if($_SESSION['book1']['comment']){
                $comment = $_SESSION['book1']['comment'];
                mysql_query("insert into reservation_comments (reserv_id,comment) values ('$resId[0]','$comment')");
            }
            $invoice->Output("$filePath",'I');
            $invoice->Close();
        }
        else
        {
            return FALSE;
        }
    }
    ///////////////////////////////////////////////////////////////////////////
}
