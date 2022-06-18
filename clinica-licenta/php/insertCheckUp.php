<?php
session_start();
$fileId = $_SESSION['fileId'];
echo $fileId;

$weight = $_POST['weight'];
$conformation = $_POST['conformation'];
$maintenance = $_POST['maintenance'];
$condition = $_POST['condition'];
$temperament = $_POST['temperament'];
$skin = $_POST['skin'];
$apparentMembers = $_POST['apparentMembers'];
$explorableCenters = $_POST['explorableCenters'];
$currentDate = date("Y-m-d");
$diagnosis = $_POST['diagnosis'];
$treatment = $_POST['treatment'];
$transfer = $_POST['transfer'];
$nextvisit = $_POST['nextvisit'];
$observations = $_POST['observations'];

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

//write query
$sql = "INSERT INTO checkup (fileId, weight, conformation, maintenance, condition, temperament, skin, apparentMembers, explorableCenters, createDate, diagnosis, treatment, transfer, nextvisit, observations)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
$params = array($fileId, $weight, $conformation, $maintenance, $condition, $temperament, $skin, $apparentMembers, $explorableCenters, $currentDate, $diagnosis, $treatment, $transfer, $nextvisit, $observations);  
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
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Controlul medical cu id: " .$id. " a fost adaugat in baza de date.";
$entity = "Control medical";
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
header("Location: http://localhost/clinica-licenta/vizualizareFisa.php".'?id='.$fileId); 
?>