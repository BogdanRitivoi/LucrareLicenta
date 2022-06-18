<?php
//	THIS IS USED TO STORE A NEW FILE IN DB
//get form values
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$ci = $_POST['ci'];
$county = $_POST['county'];
$adress = $_POST['adress'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$patientName = $_POST['patientName'];
$species = $_POST['species'];
$breed = $_POST['breed'];
$entryDate = $_POST['date1'];
$birthDate = $_POST['date2'];
$chronic = $_POST['chronic'];
$conditions = $_POST['conditions'];
$comments = $_POST['comments'];

//get boolean values
if(isset($_POST['vaccine']))
	$vaccine = 1;
else
	$vaccine = 0;

if(isset($_POST['extDeworm']))
	$extDeworm = 1;
else
	$extDeworm = 0;

if(isset($_POST['intDeworm']))
	$intDeworm = 1;
else
	$intDeworm = 0;

if(isset($_POST['neutred']))
	$neutred = 1;
else
	$neutred = 0;

if(isset($_POST['sex']))
	$sex = 1;
else
	$sex = 0;


//set connection
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

//write query
$sql = "INSERT INTO patient_file (lastname, firstname, ci, county, adress, phone, email, entryDate, patientName, species, breed, birthDate, chronic, conditions, comments, vaccine, extDeworm, intDeworm, neutred, sex)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$params = array($lastname, $firstname, $ci, $county, $adress, $phone, $email, $entryDate, $patientName, $species, $breed, $birthDate, $chronic, $conditions, $comments, $vaccine, $extDeworm, $intDeworm, $neutred, $sex);  
$result = sqlsrv_query($conn,$sql,$params);
if($result === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
sqlsrv_free_stmt( $result);


//get last id

$sql2 = "SELECT @@IDENTITY as id";
$result2 = sqlsrv_query($conn, $sql2);
if($result2 === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

if( sqlsrv_fetch( $result2 ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$id = sqlsrv_get_field($result2, 0);
echo $id;
sqlsrv_free_stmt( $result2);

//store activity
session_start();
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Fisa pacient cu id: " .$id. " a fost adaugata in baza de date.";
$entity = "Fisa pacient";
$color = "success";
$type = "Adaugare";

$sqla = "INSERT INTO activities (username, description, entity, color, activitydate, type)
VALUES (?,?,?,?,?,?);";
$paramsa = array($sessionUserName, $descriptionAct, $entity, $color, $dateActivity, $type);  
$resulta = sqlsrv_query($conn,$sqla,$paramsa);
if($resulta === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
sqlsrv_free_stmt($resulta);

sqlsrv_close( $conn); 
header("Location: http://localhost/clinica-licenta/vizualizareFisa.php".'?id='.$id); 
?>