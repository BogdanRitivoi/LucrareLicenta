<?php
session_start();
$fileId = $_SESSION['fileId'];
echo $fileId;

$inttype = $_POST['inttype'];
$intdiagnosis = $_POST['intdiagnosis'];
$pretreatment = $_POST['pretreatment'];
$posttreatment = $_POST['posttreatment'];
$intdate = $_POST['intdate'];
$indications = $_POST['indications'];
$doctorname = $_POST['doctorname'];

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

//write query
$sql = "INSERT INTO interventions (fileId, inttype, intdiagnosis, pretreatment, posttreatment, intdate, indications, doctorname)
VALUES (?,?,?,?,?,?,?,?);";
$params = array($fileId, $inttype, $intdiagnosis, $pretreatment, $posttreatment, $intdate, $indications, $doctorname);  
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
$descriptionAct = "Interventia medicala cu id: " .$id. " a fost adaugata in baza de date.";
$entity = "Interventie medicala";
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