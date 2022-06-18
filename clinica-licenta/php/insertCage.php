<?php
$cagename = $_POST['cagename'];
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

//write query
$sql = "INSERT INTO cages (name, available)
VALUES (?,?);";
$params = array($cagename, 1);  
$result = sqlsrv_query($conn,$sql,$params);
if($result === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
sqlsrv_free_stmt( $result);
sqlsrv_close( $conn);
header("Location: http://localhost/clinica-licenta/adapost.php"); 
?>