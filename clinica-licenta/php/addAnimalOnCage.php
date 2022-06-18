<?php
$cageId = $_POST['cageId'];
$petname = $_POST['petname'];
$birthdate = $_POST['birthdate'];
$species = $_POST['species'];
$breed = $_POST['breed'];
$petcolor = $_POST['petcolor'];
$illnesses = $_POST['illnesses'];
$treatment = $_POST['treatment'];
$food = $_POST['food'];
$behavior = $_POST['behavior'];
$description = $_POST['description'];
$observations = $_POST['observations'];
$gender = $_POST['gender'];
echo $cageId;

//get boolean values
if(isset($_POST['fitforadoption']))
	$fitforadoption = 1;
else
	$fitforadoption = 0;

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}
$available = 0;
//write query
$sql = "UPDATE cages SET petname='$petname', birthdate='$birthdate', species='$species', breed='$breed', petcolor='$petcolor', illnesses='$illnesses', treatment='$treatment', food='$food', behavior='$behavior', description='$description', observations='$observations', gender='$gender', fitforadoption='$fitforadoption', available='$available' WHERE id = '$cageId';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results);
sqlsrv_close( $conn); 
header("Location: http://localhost/clinica-licenta/adapost.php");

?>