<?php

require "vendor/fpdf/fpdf/original/fpdf.php";


class myPDF extends FPDF{
   
    function header(){
    $this->setFont('Arial','B',14);
    $this->Cell(195,5,'Waste Collection Report',0,0,'C');
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
    $this->Cell(6,10,'ID',1,0,'C');
    $this->Cell(60,10,'Organization',1,0,'C');
    $this->Cell(30,10,'Category',1,0,'C');
    $this->Cell(30,10,'Weight',1,0,'C');
    $this->Cell(30,10,'Collection Date',1,0,'C');
   // $this->Cell(40,10,'Collected By',1,0,'C');
    $this->Ln();
 
}



function viewTable($get_pdf_data){
    $this->setFont('Times','',12);
   $i=1;
    foreach($get_pdf_data as $data){
        $this->setFont('Times','B',12);
        $this->Cell(6,10,$i,1,0,'L');
        $this->Cell(60,10,$data['organization'],1,0,'L');
        $this->Cell(30,10,$data['category'],1,0,'L');
        $this->Cell(30,10,$data['weight'],1,0,'L');
        $this->Cell(30,10,$data['date'],1,0,'L');
       // $this->Cell(40,10,$data['weight'],1,0,'L');
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
