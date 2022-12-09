<?Php
require "connection_data.php";//connection to database
$test=date("Y/m/d");
//SQL to get 10 records
$count="select * from customers";
require('fpdf/fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage('L');
$title = 'GULFMAX NUETRAL CARE LIMITED';
$pdf->SetTitle($title);
// Select Arial bold 15
$pdf->SetFont('Arial','B',15);
    // Move to the right
     $pdf->Cell(20);
    // Framed title
	// Logo
    $pdf->Image('images/logo.png',10,10,20);
    // Arial bold 15
    $pdf->SetFont('Times','',11);
    // Move to the right
    $pdf->Cell(80);
    // Title
	$pdf->SetTextColor(45,100,211);
    $pdf->Cell(10,10,'GULFMAX NUETRAL CARE LIMITED',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10);
	$pdf->Cell(240,10,'072347272',0,0,'C');
	/// Line break
	$pdf->Cell(80,20,'',0,0,'L');
    $pdf->Ln(15);
	$pdf->Cell(90,10,'Date:  '.$test,0,0,'L');
	$pdf->Cell(180,10,'Customers Report',0,0,'R');
	$width_call=array(40,50,60,50,40,30);
    $pdf->SetFont('Arial','B',12);

//Background color of header//
$pdf->SetFillColor(62,236,22);
$pdf->Ln(15);
// Header starts /// 
    $pdf->Cell($width_call[0],10,'Phone Number',1,0,'C',true);
	$pdf->Cell($width_call[1],10,'Customer Name',1,0,'C',true);
	$pdf->Cell($width_call[2],10,'Location',1,0,'C',true);
	$pdf->Cell($width_call[3],10,'Address',1,0,'C',true);
	$pdf->Cell($width_call[4],10,'Phone',1,0,'C',true);
	$pdf->Cell($width_call[5],10,'Phone',1,0,'C',true);
   $pdf->SetFont('Arial','I',12);
   $pdf->Ln(10);
//Background color of header//
$pdf->SetFillColor(250,250,250); 
//to give alternate background fill color to rows// 
$fill=false;
// each record is one row  ///
foreach ($conn->query($count) as $row) {
	$pdf->Cell($width_call[0],10,$row['customer_no'],1,0,'C',$fill);
	$pdf->Cell($width_call[1],10,$row['customer_name'],1,0,'C',$fill);
	$pdf->Cell($width_call[2],10,$row['customer_location'],1,0,'C',$fill);
	$pdf->Cell($width_call[3],10,$row['customer_address'],1,0,'C',$fill);
	$pdf->Cell($width_call[4],10,$row['customer_phone'],1,0,'C',$fill);
	$pdf->Cell($width_call[5],10,$row['customer_phone'],1,0,'C',$fill);
	$pdf->Ln(10);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 
    // Select Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Print centered page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo(),0,0,'C');
$pdf->Output();

?>
