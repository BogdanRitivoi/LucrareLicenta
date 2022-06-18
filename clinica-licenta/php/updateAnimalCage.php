<?php
$cageId = $_POST['vcageId'];
$petname = $_POST['vpetname'];
$birthdate = $_POST['vbirthdate'];
$species = $_POST['vspecies'];
$breed = $_POST['vbreed'];
$petcolor = $_POST['vpetcolor'];
$illnesses = $_POST['villnesses'];
$treatment = $_POST['vtreatment'];
$food = $_POST['vfood'];
$behavior = $_POST['vbehavior'];
$description = $_POST['vdescription'];
$observations = $_POST['vobservations'];
$gender = $_POST['vgender'];
echo $cageId;

//get boolean values
if(isset($_POST['vfitforadoption']))
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