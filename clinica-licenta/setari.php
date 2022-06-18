<!doctype html>
<html lang="en">
<title></title>
<head>
	<?php include "./config/bootstrapInit.html" ?>
	<?php include "./css/navbar.css" ?>
	<?php
	//check if user is logged in
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("Location: http://localhost/clinica-licenta/login.php");
		exit;
	}
	?>
</head>
<body>
	<?php include "./elements/navbar.php" ?>
	<?php include "./elements/deletePopUpUser.php" ?>
	<?php include "./elements/viewUserPopUp.php" ?>
	<?php include "./elements/resetPassPopUp.php" ?>
	<div class="row form-group align-items-center">
		<?php 
		
		if(isset($_SESSION['user_err']) and $_SESSION['user_err']!="")
		{
			$user_err = $_SESSION['user_err'];
			echo '<div class="col-6 text-center pr-0"><div class="alert alert-danger alert-dismissible fade show mt-0" role="alert" id="userErr">
			<strong>Numele de utilizator exista deja.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div></div>';
		}
		else{
			$user_err = "";
		}
		if(isset($_SESSION['pass_err']) and $_SESSION['pass_err']!="")
		{
			$pass_err = $_SESSION['pass_err'];
			echo '<div class="col-6 text-center pl-0"><div class="alert alert-danger alert-dismissible fade show mt-0" role="alert" id="passErr">
			<strong>Parola completata gresit.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div></div>';
		}
		else{
			$pass_err = "";
		}
		?>
	</div>
	<div class="panel container-fluid mt-2">
		<div class="row form-group align-items-center">
			<div class="col" style="font-size: 18px;">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="http://localhost/clinica-licenta/setari.php"><i class="fa fa-user-circle"></i>&nbsp;Utilizatori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/clinica-licenta/setariRoluri.php"><i class="fa fa-users"></i>&nbsp;Roluri</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/clinica-licenta/setariListaActivitati.php"><i class="fa fa-tasks"></i>&nbsp;Lista activitati</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row form-group align-items-center">
			<div class="col">
				<h3>Lista utilizatori</h3>
			</div>
			<div class="col text-right">
				<button name="addUserBtn" type="button" class="btn btn-outline-primary" id="addUser"><span>Adauga </span><i class="fa fa-plus"></i></button>
			</div>
		</div>
		<div id="addUserContainer">
			<form action="php/insertUser.php" method="POST" class="needs-validation5" onsubmit="return validateForm()" novalidate>
				<div class="row form-group align-items-center">
					<div class="col-2"><label class="control-label">Nume utilizator</label></div>
					<div class="col-2"><input type="text" name="username" id="username" class="form-control form-control-sm" autocomplete="off" required/></div>
					<div class="col-2"><label class="control-label">Parola</label></div>
					<div class="col-2"><input type="password" name="password" id="password" class="form-control form-control-sm" autocomplete="off" required /></div>
					<div class="col-2"><label class="control-label">Confirma Parola</label></div>
					<div class="col-2"><input type="password" name="cpassword" id="cpassword" class="form-control form-control-sm" autocomplete="off" required/></div>
				</div>
				<div class="row form-group align-items-center">
					<div class="col-2"><label class="control-label">Nume</label></div>
					<div class="col-2"><input type="text" name="lastname" id="lastname" class="form-control form-control-sm" autocomplete="off"/></div>
					<div class="col-2"><label class="control-label">Prenume</label></div>
					<div class="col-2"><input type="text" name="firstname" id="firstname" class="form-control form-control-sm" autocomplete="off"/></div>
					<div class="col-2"><label class="control-label">Rol</label></div>
					<div class="col-2"> <select class="form-control" id="role" name="role">
						<?php
						//get roles as options
						foreach ($arrRoles as &$value) {
							echo '<option value='.$value[0].'_'.$value[1].'>'.$value[1].'</option>';
						}
						?>
					</select></div>
				</div>
				<div class="row form-group align-items-center">
					<div class="col-2"><label class="control-label">Numar telefon</label></div>
					<div class="col-2"><input type="text" name="phone" id="phone" class="form-control form-control-sm" autocomplete="off"/></div>
					<div class="col-2"><label class="control-label">Email</label></div>
					<div class="col-2"><input type="text" name="email" id="email" class="form-control form-control-sm" autocomplete="off"/></div>
					<div class="col-2"><label class="control-label">Domiciliu</label></div>
					<div class="col-2"><input type="text" name="address" id="address" class="form-control form-control-sm" autocomplete="off"/></div>
				</div>
				<div class="row form-group align-items-center">
					<div class="col text-left ml-0">
						<button name="closeAddBtn" type="button" class="btn btn-outline-danger"><span>Inchide </span></button>
					</div>
					<div class="col text-right mr-0">
						<button type="submit" class="btn btn-outline-primary"><span>Salveaza </span></button>
					</div>
				</div>
			</form>
		</div>
		<div class="row scroll-box-container">
			<div class="col px-0 scroll-box">
				<div class="container-fluid">
					<table class="table table-hover">
						<thead>
							<tr class="thead-dark">
								<th>Id</th>
								<th>Nume utilizator</th>
								<th>Data creare</th>
								<th>Nume</th>
								<th>Prenume</th>
								<th>Rol</th>
								<th>Numar telefon</th>
								<th>Email</th>
								<th>Domiciliu</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php include "./php/getUsers.php" ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	//availability for roles
	var roleid = <?php echo $_SESSION['roleid']; ?>;
	if(roleid !== 1)
	{
		document.getElementById("addUser").disabled = true;
		var btndeleteuser = document.getElementsByName("btndeleteuser");
		btndeleteuser.forEach(element => element.disabled = true);
		var btnviewuser = document.getElementsByName("viewuser");
		btnviewuser.forEach(element => element.disabled = true);
		var btnresetpass = document.getElementsByName("resetpassword");
		btnresetpass.forEach(element => element.disabled = true);
	}

    //validation
    (function() {
    	'use strict';
    	window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation5');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    	form.addEventListener('submit', function(event) {
    		if (form.checkValidity() === false) {
    			event.preventDefault();
    			event.stopPropagation();
    		}
    		form.classList.add('was-validated');
    	}, false);
    });
}, false);
    })();

    //display error messages
    document.getElementById('addUserContainer').style.display = "none";
    $('button[name="closeAddBtn"]') .click(function(){
    	document.getElementById('addUserContainer').style.display = "none";
    });
    $('button[name="addUserBtn"]') .click(function(){
    	document.getElementById('addUserContainer').style.display = "block";
    });

    //delete user
    var duid;
    $('button[name="btndeleteuser"]') .click(function(){
    	duid = this.id;
    });
    $('button[name="confirmdeleteuser"]').click(function(){
    	window.location.href = 'http://localhost/clinica-licenta/php/deleteUser.php' + '?id=' + duid;
    });
    //reset password
    var updId;
    $('button[name="resetpassword"]') .click(function(){
    	updId = this.id;
    });
    $('button[name="confirmpass"]').click(function(){
    	var p1 = document.getElementById("repas1").value;
    	var p2 = document.getElementById("repas2").value;
    	if(p1 === p2 && p1 != '' && p2 != '')
    	{
    		window.location.href = 'http://localhost/clinica-licenta/php/resetPass.php' + '?updid=' + updId + '&updpas=' + p1;
    	}
    	else
    	{
    		alert("Parola completata gresit!");
    		document.getElementById("repas1").value = null;
    		document.getElementById("repas2").value = null;
    	}
    });
	//get current user
	var userid;
	$('button[name="viewuser"]') .click(function(){
		userid = this.id;
		userid = Number(userid);
		var arrUsers = <?php echo json_encode($arrUsers); ?>;
		for(var iIndex in arrUsers)
		{
			if( arrUsers[iIndex][0] === userid)
			{
				document.getElementById("userPopUpHeader").innerHTML = 'Utilizator - ' + arrUsers[iIndex][3] + ' ' + arrUsers[iIndex][4];
				document.getElementById("vuserId").value = arrUsers[iIndex][0];
				document.getElementById("vusername").value = arrUsers[iIndex][1];
				document.getElementById("vlastname").value = arrUsers[iIndex][3];
				document.getElementById("vfirstname").value = arrUsers[iIndex][4];
				document.getElementById("vrole").value = arrUsers[iIndex][9] + '_' + arrUsers[iIndex][5];
				document.getElementById("vphone").value = arrUsers[iIndex][6];
				document.getElementById("vemail").value = arrUsers[iIndex][7];
				document.getElementById("vaddress").value = arrUsers[iIndex][8];
			}
		}
	});
</script>
</html>