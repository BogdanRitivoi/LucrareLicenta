<?php
//	THIS IS USED TO GENERATE A LIST OF ROLES FOR TABLE

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

$arrRowsClass = array("table-active", "table-primary", "table-success", "table-warning");
$index = 0;
//fetch the resulting rows as an array
while( $row = sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC))  
{  
	echo '
	<tr class='.$arrRowsClass[$index].' id='.$row['id'].'>
	<td> '.$row['id'].' </td>
	<td> '.$row['name'].' </td>
	<td> '.$row['description'].' </td>
	</tr>';
	$index = $index + 1;
}

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);
?>