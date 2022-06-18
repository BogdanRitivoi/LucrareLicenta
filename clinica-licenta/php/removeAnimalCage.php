<?php
if (isset($_GET['id']))
	$id = (int)$_GET['id'];
else
	$id = 0;
echo $id;

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}
$available = 1;
//write query
$sql = "UPDATE cages SET available='$available', birthdate=NULL, species=NULL, breed=NULL, petcolor=NULL, illnesses=NULL, treatment=NULL, food=NULL, behavior=NULL, description=NULL, observations=NULL, gender=NULL, fitforadoption=NULL WHERE id = '$id';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results);
sqlsrv_close( $conn); 
header("Location: http://localhost/clinica-licenta/adapost.php");
?>