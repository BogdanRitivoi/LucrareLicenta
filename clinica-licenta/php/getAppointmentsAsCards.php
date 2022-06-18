<?php
//	THIS IS USED TO GENERATE APPOINTMENTS AS CARDS
//get selectDate
$selectdate = $_SESSION['selectdate'];
$formatStringYear = substr($selectdate, 0, -4);
$formatStringMonth = substr($selectdate, 4, -2);
$formatStringDay = substr($selectdate, -2);
$formatStringDate = $formatStringYear . "-" . $formatStringMonth . "-" . $formatStringDay;
echo $formatStringDate;
$slectFormatTime = strtotime($formatStringDate);

$slectFormatDate = date('Y-m-d',$slectFormatTime);


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
$sql = "SELECT * FROM appointments WHERE appdate LIKE '$slectFormatDate' ORDER BY timestart ASC;";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 
//<span aria-hidden="true">&times;</span>

//data-toggle="modal" data-target="#deleteModal" id='.$row['id'].
//fetch the resulting rows as an array
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{
	$appointDate = $row['appdate']->format('d/m/Y');
	$startString = $row['timestart'] ->format('h:i a');
	$finishString = $row['timefinish'] ->format('h:i a');
	echo '
	<div class="card mb-4">
	<div class="card-header">
	<button type="button" class="close" aria-label="Close" data-toggle="modal" data-target="#deleteModal" name="deletebtn" id='.$row['id'].'>
	<i class="fa fa-trash"></i>
	</button>
	<h4>Dr. '.$row['username'].'</h4>
	</div>
	<div class="card-body">
	<h6 class="card-title">['.$appointDate.'] ['.$startString.' - '.$finishString.']</h6>
	<h6 class="card-text">'.$row['description'].'</h6>
	</div>
	</div>
	';
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>