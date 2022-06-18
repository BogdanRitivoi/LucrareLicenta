<?php
//connect to database
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
$sql = "SELECT * FROM cages;";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
$arrCages = array();
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{
	$availability = $row['available'];
	$cageId = $row['id'];
	if($availability === 0)
	{
		echo '<div class="col-3 mb-5">
		<div  name="viewCageAnimal" class="card bg-primary" id='.$cageId.' data-toggle="modal" data-target="#viewCageAnimal">
		<div class="card-body">
		<h5 class="card-title text-center">'.$row['name'].'</h5>
		<div class="row">
		<div class="col-6 pl-5">
		<p class="card-text">'.$row['petname'].'</p>
		<p class="card-text">'.$row['species'].'</p>
		</div>
		<div class="col-6 text-right pr-5">
		<i class="fa fa-clipboard huge"></i>
		</div>
		</div>
		</div>
		</div>
		</div>';
	}
	else
	{
		echo '<div class="col-3 mb-5">
		<div name="addCageAnimal" class="card bg-success" id='.$cageId.' data-toggle="modal" data-target="#addCageAnimal">
		<div class="card-body">
		<h5 class="card-title text-center">'.$row['name'].'</h5>
		<p class="card-text text-center"><i class="fa fa-plus huge"></i></p>
		</div>
		</div>
		</div>';
	}

	if($row['birthdate'] !== null)
		$birthdate = $row['birthdate'] -> format('Y/m/d');
	else
		$birthdate = "";
	array_push($arrCages, array($row['id'], $row['available'], $row['petname'], $birthdate, $row['petcolor'], $row['gender'], $row['illnesses'], $row['treatment'], $row['food'], $row['behavior'], $row['fitforadoption'], $row['observations'], $row['description'], $row['breed'], $row['species'], $row['name']));
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
header("Location: http://localhost/clinica-licenta/animaleAdoptate.php");
?>