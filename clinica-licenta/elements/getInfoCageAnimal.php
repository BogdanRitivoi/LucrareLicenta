<?php
if (isset($_GET['id'])){
	$id = (int)$_GET['id'];
}
else
	$id = 0;


//connect to database
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false )  
{  
	echo "Could not connect.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

//write query for all users
$sql = "SELECT * FROM cages WHERE id = '$id';";
//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

if( sqlsrv_fetch( $results ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$id = sqlsrv_get_field($results, 0);
$name = sqlsrv_get_field($results, 1);
$available = sqlsrv_get_field($results, 2);
$petname = sqlsrv_get_field($results, 3);
$birthdate = sqlsrv_get_field($results, 4);
$birthdate = date_format($birthdate, "Y/m/d");
$petcolor = sqlsrv_get_field($results, 5);
echo $petcolor
$gender = sqlsrv_get_field($results, 6);
$illnesses = sqlsrv_get_field($results, 7);
$treatment = sqlsrv_get_field($results, 8);
$food = sqlsrv_get_field($results, 9);
$behavior = sqlsrv_get_field($results, 10);
$fitforadoption = sqlsrv_get_field($results, 11);
$observations = sqlsrv_get_field($results, 12);
$description = sqlsrv_get_field($results, 13);
$species = sqlsrv_get_field($results, 14);
$breed = sqlsrv_get_field($results, 15);

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);

?>