<?php

require "vendor/fpdf/fpdf/original/fpdf.php";


class myPDF extends FPDF{
   
    function header(){
    $this->setFont('Arial','B',14);
    $this->Cell(195,5,'Waste-Occupancy Average Report',0,0,'C');
    $this->Ln();
    $this->setFont('Times','',12);
    $this->Cell(195,10,'  ',0,0,'C');
    $this->Ln(20);
}


function footer(){
    $this->SetY(-15);
    $this->setFont('Arial','',8);
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
   
    }
    

function headerTable(){
   
    $this->setFont('Times','B',12);
    $this->Cell(10,10,'S.No',1,0,'C');
    $this->Cell(40,10,'Date',1,0,'C');
    $this->Cell(30,10,'Department',1,0,'C');
    $this->Cell(30,10,'Occupancy',1,0,'C');
    $this->Cell(40,10,'Total Waste(kg)',1,0,'C');
    $this->Cell(30,10,'Average',1,0,'C');
    //$this->Cell(30,10,'Status',1,0,'C');
    $this->Ln();
 
}



function viewTable($get_pdf_data){
    $this->setFont('Times','',12);
   $i=1;
    foreach($get_pdf_data as $data){
        $this->setFont('Times','',10);
        $this->Cell(10,10,$i,1,0,'L');
        $this->Cell(40,10,$data['date_time'],1,0,'L');
        $this->Cell(30,10,$data['department'],1,0,'L');
        $this->Cell(30,10,$data['occupancy'],1,0,'L');
        $this->Cell(40,10,round($data['sum_weight'],2),1,0,'L');
        $this->Cell(30,10,round($data['Average'],2),1,0,'L');
        // if($data['issue_date']==0){

        //     $this->Cell(30,10, '',1,0,'L');
        // }
        // else{
        //     $this->Cell(30,10,$data['issue_date'],1,0,'L');
        // }

        // if($data['issue_date']==0){
        //     //$this->SetTextColor(194,8,8);
        //     $this->Cell(30,10, 'Pending',1,0,'L');
        // }
        // else{
           
        //     $this->Cell(30,10,'Success',1,0,'L');
        // }
      
        $this->Ln();
        $i++;
    }


    
   

}
}
$pdf = new myPDF();
$pdf ->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable($get_pdf_data);
$pdf->Output();
