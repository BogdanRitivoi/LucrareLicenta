<?php
//	THIS IS USED TO STORE AN NEW APPOINTMENT IN DB
//get form data
$timestart = $_POST['timestart'];
$timefinish = $_POST['timefinish'];
$fulluser = $_POST['fulluser'];
$date = $_POST['date1'];
$description = $_POST['description'];
$arr = explode("_", $fulluser);
$userid = $arr[0];
$firstName = $arr[1];
$lastName = $arr[2];
$fullName = $firstName.' '.$lastName;
//insert in db
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}
//write query
$sql = "INSERT INTO appointments (userid, username, description, appdate, timestart, timefinish)
VALUES (?,?,?,?,?,?);";
$params = array($userid, $fullName, $description, $date, $timestart, $timefinish);  
$result = sqlsrv_query($conn,$sql,$params);
if($result === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
sqlsrv_free_stmt( $result);
session_start();

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
$descriptionAct = "Programarea cu id: " .$id. " a fost adaugata in baza de date.";
$entity = "Programare";
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
$date = $_SESSION['selectdate'];
header("Location: http://localhost/clinica-licenta/planificator.php".'?date='.$date); 
?>