<?php
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn === false )  
{  
	echo "Could not connect.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

//write query for all users
$sql = "SELECT * FROM adoptions ORDER BY ID DESC";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{
	$entryDate = $row['entryDate']->format('d/m/Y');
	$birthdate = $row['birthdate']->format('d/m/Y');
	$gender = $row['gender'];
	if($gender == 0)
		$gender = "femela";
	else
		$gender = "mascul";

	$behavior = $row['behavior'];
	if($behavior == 1)
		$behavior = "bland";
	if($behavior == 2)
		$behavior = "timid";
	if($behavior == 3)
		$behavior = "agresiv";

	echo '
	<div class="col-4">
	<div class="card card-margin">
	<div class="card-header" data-toggle="collapse" data-target='.'#colaspe'.$row['id'].'>
	<div class="row w-100 mt-4">
	<div class="col-6 mb-2">
	<h5 class="card-title"><i class="fa fa-paw"></i>&nbsp;'.$row['petname'].'</h5>
	<h5 class="card-title"><i class="fa fa-user"></i>&nbsp;'.$row['lastname'].' '.$row['firstname'].'</h5>
	</div>
	<div class="col-6 text-right">
	<i class="fa fa-info-circle"></i>
	</div>
	</div>
	</div>
	<div id='.'colaspe'.$row['id'].' class="collapse">
	<div class="card-body">
	<div class="row">
	<div class="col">
	<b>Informatii proprietar</b>
	</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>C.I: '.$row['ci'].'</div>
	<div class="col-6"><label class="control-label"></label>Judet: '.$row['county'].'</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>Adresa: '.$row['adress'].'</div>
	<div class="col-6"><label class="control-label"></label>Nr. telefon: '.$row['phone'].'</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>Email: '.$row['email'].'</div>
	<div class="col-6"><label class="control-label"></label>Data inregistrare: '.$entryDate.'</div>
	</div>
	<div class="row mt-4">
	<div class="col">
	<b>Informatii animal</b>
	</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>Data nasterii: '.$birthdate.'</div>
	<div class="col-6"><label class="control-label"></label>Specie: '.$row['species'].'</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>Rasa: '.$row['breed'].'</div>
	<div class="col-6"><label class="control-label"></label>Culoare: '.$row['petcolor'].'</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>Sex: '.$gender.'</div>
	<div class="col-6"><label class="control-label"></label>Tratament: '.$row['treatment'].'</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>Alimentatie: '.$row['food'].'</div>
	<div class="col-6"><label class="control-label"></label>Comportament: '.$behavior.'</div>
	</div>
	<div class="row">
	<div class="col-6"><label class="control-label"></label>Descriere: '.$row['description'].'</div>
	<div class="col-6"><label class="control-label"></label>Observatii: '.$row['observations'].'</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	';
}

sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>