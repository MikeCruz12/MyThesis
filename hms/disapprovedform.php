<?php
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/client.php';
	require('fpdf17/fpdf.php');

	$query = "SELECT * FROM register AS register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE register.id = " . $_GET['id'];

	$response = mysqli_query($con,$query);
	if($response){
		$row = mysqli_fetch_array($response);
		$row['reason'];
		$row['lastname'];
		$row['dateConfirmed'];
		$row['mountain_name'];
		$row['date'];


	}

	$pdf= new FPDF('P','mm','letter');
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage();

	$pdf->Cell(0,0,"Hiking Mangement System",0,1,C);
	$pdf->Cell(190,10,"",0,1,C);
	

	$pdf->Cell(50,20,"Dear Mr/Mrs. ". ucfirst($row['lastname']),0,0,L);        
	$pdf->Cell(140,20,date("F d, Y",strtotime($row['dateConfirmed'])),0,1,R);

	$pdf->MultiCell(190,8, "												We're sorry to inform you that your request at ".$row['mountain_name']." on ". date("F d, Y",strtotime($row['date']))." has been disapproved due to the reason: ".$row['reason'],0);



	$pdf->Output();



?>