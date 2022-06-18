<?php
//	THIS IS USED TO GENERATE A LIST OF ROLES FOR SELECT ELEMENT

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
$sql = "SELECT * FROM role;";

//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
$arrRoles = array();
//fetch the resulting rows as an array
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{  
	//echo $row['id'].", " .$row['firstname'].", ".$row['lastname']."\n";
	echo '
	<option value='.$row['id'].'_'.$row['name'].'>'.$row['name'].'</option>';
	array_push($arrRoles, array($row['id'], $row['name'], $row['description']));
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>