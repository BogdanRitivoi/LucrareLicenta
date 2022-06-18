<?php
session_start();
//connect to database
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn === false )  
{  
	echo "Could not connect.\n";  
	die( print_r( sqlsrv_errors(), true));  
}

if (isset($_POST['username']) && isset($_POST['password'])) {
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	if(empty($username)){
		header("Location: http://localhost/clinica-licenta/login.php?error=Nume utilizator este obligatoriu");
		exit();
	}else if(empty($password)){
		header("Location: http://localhost/clinica-licenta/login.php?error=Parola este obligatorie");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE username LIKE '$username';";

		//--------
		$result = sqlsrv_query($conn, $sql);
		if($result === false)  
		{  
			echo "Error in query preparation/execution.\n";  
			die( print_r( sqlsrv_errors(), true));  
		}
		$row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC);
		if($row){
			if($row['username'] === $username){
				if(password_verify($password, $row["password"]))
				{
					//logged in
					$_SESSION['loggedin'] = true;
					$_SESSION['username'] = $row['username'];
					$_SESSION['lastname'] = $row['lastname'];
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['roleid'] = $row['roleid'];
					header("Location: http://localhost/clinica-licenta/home.php");
					exit();
				}
				else
				{
					header("Location: http://localhost/clinica-licenta/login.php?error=Nume utilizator sau parola incorecta");
					exit();
				}
				
			}
			else{
				header("Location: http://localhost/clinica-licenta/login.php?error=Nume utilizator sau parola incorecta");
				exit();
			}
		}
		else{
			header("Location: http://localhost/clinica-licenta/login.php?error=Nume utilizator sau parola incorecta");
			exit();
		}
	}
}
?>