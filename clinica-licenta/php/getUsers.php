<?php
//	THIS IS USED TO GENERATE THE LIST OF USERS

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
$sql = "SELECT * FROM users;";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 
$createdString = "";
$arrUsers = array();
//fetch the resulting rows as an array
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{  
	//echo $row['id'].", " .$row['firstname'].", ".$row['lastname']."\n";
	if($row['created'] !== null)
		$createdString = $row['created'] -> format('Y-m-d H:i:s');
	else
		$createdString = "";
	echo '
	<tr id='.$row['id'].'>
	<td> '.$row['id'].' </td>
	<td> '.$row['username'].' </td>
	<td> '.$createdString.' </td>
	<td> '.$row['lastname'].' </td>
	<td> '.$row['firstname'].' </td>
	<td> '.$row['role'].' </td>
	<td> '.$row['phone'].' </td>
	<td> '.$row['email'].' </td>
	<td> '.$row['address'].' </td>
	<td class="text-right"><button type="button" name="btndeleteuser" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModalUser" id='.$row['id'].'><i class="fa fa-trash"></i></button> <button type="button" name="resetpassword" class="btn btn-outline-secondary" data-toggle="modal" data-target="#resetModal" id='.$row['id'].'><i class="fa fa-key"></i></button> <button type="button" name="viewuser" class="btn btn-outline-primary" data-toggle="modal" data-target="#viewUserPopUp" id='.$row['id'].'><i class="fa fa-share"></i></button></td>
	</tr>';
	array_push($arrUsers, array($row['id'], $row['username'], $createdString, $row['lastname'], $row['firstname'], $row['role'], $row['phone'], $row['email'], $row['address'], $row['roleid']));
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>