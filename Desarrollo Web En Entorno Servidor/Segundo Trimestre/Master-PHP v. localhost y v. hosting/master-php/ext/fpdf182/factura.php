<?php

$provPed= $_GET['provPed'];
$locPed= $_GET['locPed'];
$dirPed= $_GET['dirPed'];
$estadoPed= $_GET['estadoPed'];
$idPed= $_GET['idPed'];
$costePed= $_GET['costePed'];
$numProd= $_GET['numProd'];

require('fpdf.php');

define('EURO',chr(128));

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',40);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);

// Agregamos los datos de la empresa
$pdf->Cell(5,$textypos,"TIENDA DE CAMISETAS");
$pdf->SetFont('Arial','B',25);    
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(5,$textypos,"NEGOCIO:");
$pdf->SetFont('Arial','',15);    
$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Tienda de camisetas");
$pdf->setY(60);$pdf->setX(10);
$pdf->Cell(5,$textypos,"www.tiendadecamisetas.com");
$pdf->setY(70);$pdf->setX(10);
$pdf->Cell(5,$textypos,"+34 000000000");
$pdf->setY(80);$pdf->setX(10);
$pdf->Cell(5,$textypos,"camisetas@tiendadecamisetas.com");
$pdf->setY(90);$pdf->setX(10);
$pdf->SetFont('Arial','B',15);  
$pdf->Cell(5,$textypos,"FACTURA NUMERO ".$idPed);

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',25);    
$pdf->setY(110);$pdf->setX(10);
$pdf->Cell(5,$textypos,"CLIENTE: ");
$pdf->SetFont('Arial','',15);    
$pdf->setY(120);$pdf->setX(10);
$pdf->Cell(5,$textypos,"PROVINCIA: ".$provPed);
$pdf->setY(130);$pdf->setX(10);
$pdf->Cell(5,$textypos,"CIUDAD: ".$locPed);
$pdf->setY(140);$pdf->setX(10);
$pdf->Cell(5,$textypos,"DIRECCION: ".$dirPed);

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',25); 
$pdf->SetFont('Arial','',15);    
$pdf->setY(180);$pdf->setX(10);
$pdf->Cell(5,$textypos,"ESTADO: ".$estadoPed);
$pdf->setY(190);$pdf->setX(10);
$pdf->Cell(5,$textypos,"PRODUCTOS: ".$numProd);
$pdf->SetFont('Arial','B',25); 
$pdf->setY(200);$pdf->setX(10);
$pdf->Cell(5,$textypos,"TOTAL A PAGAR: ".$costePed.EURO);

$pdf->Output('factura.pdf','I');



?>