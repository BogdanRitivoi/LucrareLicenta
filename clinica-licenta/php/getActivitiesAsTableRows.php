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
$sql = "SELECT TOP 100 * FROM activities ORDER BY id DESC;";

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
	if($row['activitydate'] !== null)
		$createdString = $row['activitydate'] -> format('Y-m-d H:i:s');
	else
		$createdString = "";
	echo '
	<tr class=table-'.$row['color'].' id='.$row['id'].'>
	<td> '.$createdString.' </td>
	<td> '.$row['username'].' </td>
	<td> '.$row['type'].' </td>
	<td> '.$row['entity'].' </td>
	<td> '.$row['description'].' </td>
	</tr>';
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>