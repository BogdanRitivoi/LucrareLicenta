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

//get fileId
$fileId = $_SESSION['fileId'];

//write query for all users
$sql = "SELECT * FROM interventions WHERE fileid = '$fileId'
ORDER BY id DESC;";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

$arrint = array();
//fetch the resulting rows as an array
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{  
	//conver date to stiring
	if($row['intdate'] !== null)
		$intdate = $row['intdate'] -> format('Y/m/d');
	else
		$intdate = "";

	//get name
	$fullnamerow = $row['doctorname'];
	$arrname = explode("_", $fullnamerow);
	$firstName = $arrname[1];
	$lastName = $arrname[2];
	$fullname = $arrname[1]." ".$arrname[2];
	echo '
	<tr id='.$row['id'].'>
	<td> '.$row['id'].' </td>
	<td> '.$intdate.' </td>
	<td> '.$row['inttype'].' </td>
	<td> '.$fullname.' </td>
	<td class="text-right"> <button type="button" name="deletebtnint" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModalint" id='.$row['id'].'><i class="fa fa-trash"></i></button> <button type="button" name="viewint" class="btn btn-outline-primary" data-toggle="modal" data-target="#ViewIntervention" id='.$row['id'].'><i class="fa fa-share"></i></button></td>
	</tr>';

	$arrDate = date_format($row['intdate'], "Y/m/d");
	array_push($arrint, array($row['id'], $row['fileid'], $row['doctorname'], $row['inttype'], $row['intdiagnosis'], $row['pretreatment'], $row['posttreatment'], $arrDate, $row['indications']));
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>