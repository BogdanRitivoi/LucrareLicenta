<?php
//	THIS IS USED TO GENERATE THE LIST OF FILES

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

//get fileId
$fileId = $_SESSION['fileId'];

//write query for all users
$sql = "SELECT * FROM checkup WHERE fileid = '$fileId'
ORDER BY id DESC;";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

$arrcuids = array();
//fetch the resulting rows as an array
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{  
	if($row['createDate'] !== null)
		$createdString = $row['createDate'] -> format('Y/m/d');
	else
		$createdString = "";

	if($row['nextvisit'] !== null)
		$nextvisitString = $row['nextvisit'] -> format('Y/m/d');
	else
		$nextvisitString = "";

	echo '
	<tr id='.$row['id'].'>
	<td> '.$row['id'].' </td>
	<td> '.$createdString.' </td>
	<td> '.$nextvisitString.' </td>
	<td> '.$row['observations'].' </td>
	<td class="text-right"> <button type="button" name="deletebtncu" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModalcu" id='.$row['id'].'><i class="fa fa-trash"></i></button> <button type="button" name="viewcu" class="btn btn-outline-primary" data-toggle="modal" data-target="#viewCheckUp" id='.$row['id'].'><i class="fa fa-share"></i></button></td>
	</tr>';

	array_push($arrcuids, array($row['id'], $row['fileid'], $row['weight'], $row['conformation'], $row['maintenance'], $row['condition'], $row['temperament'], $row['skin'], $row['apparentMembers'], $row['explorableCenters'], $createdString, $row['diagnosis'], $row['treatment'], $row['transfer'], $nextvisitString, $row['observations']));
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>