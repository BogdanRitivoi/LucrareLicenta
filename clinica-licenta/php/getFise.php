<?php
//	THIS IS USED TO GENERATE THE LIST OF FILES
//get filters
if (isset($_SESSION['filterid']))
	$filterid = (string)$_SESSION['filterid'];
else
	$filterid = '';

if (isset($_SESSION['filtername']))
	$filtername = (string)$_SESSION['filtername'];
else
	$filtername = '';

if (isset($_SESSION['filterfirstname']))
	$filterfirstname = (string)$_SESSION['filterfirstname'];
else
	$filterfirstname = '';

if (isset($_SESSION['filterphone']))
	$filterphone = (string)$_SESSION['filterphone'];
else
	$filterphone = '';

if (isset($_SESSION['filteremail']))
	$filteremail = (string)$_SESSION['filteremail'];
else
	$filteremail = '';

if (isset($_SESSION['filterpatientname']))
	$filterpatientname = (string)$_SESSION['filterpatientname'];
else
	$filterpatientname = '';

if (isset($_SESSION['filterspecies']))
	$filterspecies = (string)$_SESSION['filterspecies'];
else
	$filterspecies = '';

if (isset($_SESSION['filterbreed']))
	$filterbreed = (string)$_SESSION['filterbreed'];
else
	$filterbreed = '';

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

//write query
$sql = "SELECT * FROM patient_file 
WHERE id LIKE '%$filterid%' AND 
lastname LIKE '%$filtername%' AND 
firstname LIKE '%$filterfirstname%' AND
phone LIKE '%$filterphone%' AND
email LIKE '%$filteremail%' AND
patientName LIKE '%$filterpatientname%' AND
species LIKE '%$filterspecies%' AND
breed LIKE '%$filterbreed%'
ORDER BY id DESC;";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

//fetch the resulting rows as an array
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{  
	if($row['birthDate'] !== null)
		$birthDate = $row['birthDate'] -> format('Y-m-d');
	else
		$birthDate = "";

	if($row['entryDate'] !== null)
		$entryDate = $row['entryDate'] -> format('Y-m-d');
	else
		$entryDate = "";

	echo '
	<tr id='.$row['id'].'>
	<td name="view"> '.$row['id'].' </td>
	<td name="view"> '.$row['lastname'].' </td>
	<td name="view"> '.$row['firstname'].' </td>
	<td name="view"> '.$row['phone'].' </td>
	<td name="view"> '.$row['email'].' </td>
	<td name="view"> '.$row['patientName'].' </td>
	<td name="view"> '.$row['species'].' </td>
	<td name="view"> '.$row['breed'].' </td>
	<td name="view"> '.$entryDate.' </td>
	<td> <button type="button" name="deletebtn" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" id='.$row['id'].'><i class="fa fa-trash"></i></button></td>
	</tr>';
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn); 
?>