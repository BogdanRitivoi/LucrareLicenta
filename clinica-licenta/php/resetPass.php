<?php
if (isset($_GET['updid']))
	$updid = (int)$_GET['updid'];
else
	$updid = 0;
if (isset($_GET['updpas']))
	$updpas = (string)$_GET['updpas'];
else
	$updpas = 0;

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}
$passwordPar = password_hash($updpas, PASSWORD_DEFAULT);
//write query
$sql = "UPDATE users SET password='$passwordPar' WHERE id = '$updid';";
$results = sqlsrv_query($conn, $sql);

sqlsrv_free_stmt( $results);
sqlsrv_close( $conn); 
header("Location: http://localhost/clinica-licenta/setari.php");  
?>