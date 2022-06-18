<?php
$formid = $_POST['formid'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$ci = $_POST['ci'];
$county = $_POST['county'];
$adress = $_POST['adress'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$entryDate = $_POST['entryDate'];
$petname = $_POST['petname'];
echo( $petname);
$birthdate = $_POST['birthdate'];
$species = $_POST['species'];
$breed = $_POST['breed'];
$petcolor = $_POST['petcolor'];
$treatment = $_POST['treatment'];
$food = $_POST['food'];
$behavior = $_POST['behavior'];
$description = $_POST['description'];
$observations = $_POST['observations'];
$gender = $_POST['gender'];
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

//write query
$sql = "INSERT INTO adoptions (lastname, firstname, ci, county, adress, phone, email, entryDate, petname, birthdate, species, breed, petcolor, treatment, food, behavior, description, observations, gender, fitforadoption)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$params = array($lastname, $firstname, $ci, $county, $adress, $phone, $email, $entryDate, $petname, $birthdate, $species, $breed, $petcolor, $treatment, $food, $behavior, $description, $observations, $gender, $fitforadoption);  
$result = sqlsrv_query($conn,$sql,$params);
if($result === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
sqlsrv_free_stmt( $result);

//update cage
$available = 1;
$sql2 = "UPDATE cages SET available='$available', birthdate=NULL, species=NULL, breed=NULL, petcolor=NULL, illnesses=NULL, treatment=NULL, food=NULL, behavior=NULL, description=NULL, observations=NULL, gender=NULL, fitforadoption=NULL WHERE id = '$formid';";
$result2 = sqlsrv_query($conn, $sql2);
sqlsrv_free_stmt( $result2);
sqlsrv_close( $conn); 
?>