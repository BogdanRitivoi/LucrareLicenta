<?php
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$currentdate = date("Y-m-d h:i:sa");
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
//get role and roleid
$roleAndId = $_POST['role'];
$arrR = explode("_", $roleAndId);
$roleid = $arrR[0];
$role = $arrR[1];

$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

//check if username exists in db
$sql = "SELECT id FROM users WHERE username like '$username'";
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 
if(sqlsrv_fetch_array( $results, SQLSRV_FETCH_ASSOC)){
	$user_err="Numele de utilizator exista deja";
}
else{
	$user_err = "";
}
//check if password is correct
if($password !== $cpassword)
{
	$pass_err = "Parola completata gresit";
}
else{
	$pass_err = "";
}

sqlsrv_free_stmt( $results);
//save error on session
session_start();
$_SESSION['user_err'] = $user_err;
$_SESSION['pass_err'] = $pass_err;
//insert user in db
if($user_err === "" and $pass_err ==="")
{
	$sql = "INSERT INTO users (username, password, created, lastname, firstname, role, phone, email, address, roleid)
	VALUES (?,?,?,?,?,?,?,?,?,?);";
	//create a password hash
	$passwordPar = password_hash($password, PASSWORD_DEFAULT);
	$params = array($username, $passwordPar, $currentdate, $lastname, $firstname, $role, $phone, $email, $address, $roleid);  
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
	sqlsrv_free_stmt( $result2);
	//store activity
	$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
	$dateActivity = date("Y-m-d h:i:sa");
	$descriptionAct = "Utilizatorul cu id: " .$id. " a fost adaugat in baza de date.";
	$entity = "Utilizator";
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
}

//store activity
sqlsrv_close( $conn);
header("Location: http://localhost/clinica-licenta/setari.php");
?>