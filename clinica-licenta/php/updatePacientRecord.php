<?php
//get file id
session_start();
$fileId = $_SESSION['fileId'];

//get values
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

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}
$sql = "UPDATE patient_file SET lastname='$lastname', firstname='$firstname', ci='$ci', county='$county', adress='$adress', phone='$phone', email='$email', patientName='$patientName', species='$species', breed='$breed', entryDate='$entryDate', birthDate='$birthDate', chronic='$chronic', conditions='$conditions', comments='$comments', vaccine='$vaccine', extDeworm='$extDeworm', intDeworm='$intDeworm', neutred='$neutred', sex='$sex' WHERE id = '$fileId';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results);

//store activity
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Fisa pacient cu id: " .$fileId. " a fost modificata in baza de date.";
$entity = "Fisa pacient";
$color = "primary";
$type = "Modificare";

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
header("Location: http://localhost/clinica-licenta/vizualizareFisa.php".'?id='.$fileId); 
?>