<?php
require('fpdf/fpdf.php');
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta"); 
$sql = "
		SELECT
		  user.fullname,
		  invoice.id_invoice,
		  invoice.total_tagihan,
		  invoice.status,
		  invoice.date
		FROM `invoice`
		LEFT JOIN user 
		  ON invoice.id_user = user.id_user
		WHERE 
		invoice.date BETWEEN '".$_GET['from']." 00:00:00' AND '".$_GET['to']." 23:59:00' AND
		invoice.status = 'selesai'
		ORDER BY invoice.id_invoice ASC
       ";
$rs = mysqli_query($koneksi, $sql);

class PDF extends FPDF {
	function Header(){
	    $this->SetFont('Arial','B',14);
	    // Move to the right $this->Cell(80);
	    // Framed title
	    $this->Cell(0,7,"LAPORAN PENJUALAN ONLINE CLUTCH",0,1,"C");
		$this->Cell(0,7,"PERIODE : ".$_GET['from']." - ".$_GET['to']."",0,1,"C");
		$this->Cell(0,10,"-----------------------------------------------------------------------------",0,1,"C");
	    // Line break $this->Ln(10);
	}
	function Footer() {
	    $this->SetY(-20);
	    // Select Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Print centered page number
	    // $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	    $this->Cell(0,5,"CLUTCH",0,1,"L");
		$this->Cell(0,5,"Jl. Bambu Kuning, BojongGede, Kelurahan BojongGede, Bogor.",0,1,"L");
		$this->Cell(0,5,"Telepon (62-21) 888 9999, 888 7777, website : www.clutch.com .",0,1,"L");
	}
}


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,8,'',0);
$pdf->Cell(40,8,'Nama Pembeli',1);
$pdf->Cell(40,8,'Total Belanja',1);
$pdf->Cell(50,8,'Tanggal Pembayaran',1);
$pdf->Cell(40,8,'Status',1);

//new line
$pdf->Ln();

$total= 0;
//Data
while($rw = mysqli_fetch_array($rs)){
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(20,8,'',0);
	$pdf->Cell(40,8,''.$rw['fullname'].'',1);
	$pdf->Cell(40,8,''.$rw['total_tagihan'].'',1);
	$pdf->Cell(50,8,''.$rw['date'].'',1);
	$pdf->Cell(40,8,''.$rw['status'].'',1);
	$pdf->Ln();
	$total += $rw['total_tagihan'];
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'',0);
$pdf->Cell(170,8,'Total : Rp. '.$total.'',1,1,'R');

$pdf->SetFontSize(14);
$pdf->Output();
?>
