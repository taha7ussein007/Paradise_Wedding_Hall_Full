<?php
require_once '../core/fpdf/fpdf.php';
class invoicePDF extends FPDF
{
    //Page header
    function Header()
    {
        $this->SetFont('courier','B',12);
        $this->SetY(1);
        $this->cell(0,20,"______________________________________________________________________",0,1);
        //Logo
        $this->SetY(1);
        $this->Image('../core/images/logo.png',11,15,50,20); 
        //Title
        $this->SetXY(147,14);
        $this->Cell(0,5,'Customer invoice',0,1);
        $this->SetXY(147,6);
        $this->cell(0,20,"________________",0,1);
        //Line break
        $this->SetY(23);
        $this->cell(0,20,"______________________________________________________________________",0,1);
    }
    function EventTable($array)
    {
        $this->SetXY(147,18);
        @$id = $array['invoiceId'];
        $this->Cell(0,10,"Invoice ID: $id",0,1);
        $this->SetXY(147,25);
        @$date = $array['invoiceDate'];
        $this->Cell(0,10,"Date: $date",0,1);
        
        $this->SetXY( 10, 50 );

        $this->SetFont('times','B',12);
        $this->Cell(25,10,"Package:",1,0,'L');
        
        @$packId = $array['packageId'];
        @$packState = $array['packageState'];
        $this->SetFont('Arial','I',10);
        $this->Cell(156,10,"ID: $packId / State: $packState",1,1,'C',0);
        
        $this->SetFont('times','B',12);
        $this->Cell(25,10,"Date:",1,0,'L');
        
        @$reservationDate = $array['reservationDate'];
        $this->SetFont('Arial','I',10);
        $this->Cell(156,10,"*Reservation Date* : $reservationDate",1,1,'C',0);

        $this->SetFont('times','B',12);
        $this->Cell(25,10,'Name:',1,0,'L');
        
        @$Name = $array['customerName'];
        $this->SetFont('Arial','I',10);
        $this->Cell(156,10,"$Name",1,1,'C',0);

        $this->SetFont('times','B',12);
        $this->Cell(25,10,'Mobile: ',1,0,'L');
        
        @$mobile = $array['mobile'];
        $this->SetFont('Arial','I',10);
        $this->Cell(156,10,"$mobile",1,1,'C',0);
         
        $this->SetFont('times','B',12);
        $this->Cell(25,10,'Address: ',1,0,'L');
        
        @$address = $array['address'];
        $this->SetFont('Arial','I',10);
        $this->Cell(156,10,"$address",1,1,'C',0);

        $this->SetFont('times','B',12);
        $this->Cell(25,10,'Price: ',1,0,'L');
        
        @$packPrice = $array['packagePrice'];
        $this->SetFont('Arial','I',10);
        $this->Cell(156,10,"$packPrice L.E",1,1,'C',0);

        $this->SetFont('times','B',12);
        $this->Cell(25,10,'Pay by: ',1,0,'L');
        
        @$payBy = $array['payBy'];
        $this->SetFont('Arial','I',10);
        $this->Cell(156,10,"$payBy",1,1,'C',0);
    }
    //Page footer
    function Footer()
    {
         $this->SetY('120');
         $this->SetFont('Arial','B',15);
         $this->cell(0,20,"_____________________________________________________________",0,1);
         $this->SetX(95);
         $this->SetFont('courier','B',12);
         $this->cell(0,10,"Customer signature: . . . . . . . . .",0,1);
    }
}

