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
	<form action="php/insertPacientRecord.php" method="POST" class="needs-validation1" novalidate>
		<div class="panel container-fluid d-flex h-100 flex-column pt-3">
			<div class="panel-header row border-bottom">
				<div class="container-fluid">
					<h3>FIȘĂ PACIENT</h3>
				</div>
			</div>
			<?php include "./elements/contentFisaPacient.php" ?>
			<div class="panel-footer row">
				<div class="container-fluid">
					<div class="col text-right pr-0">
						<button id="salveazaFisa" type="submit" class="btn btn-outline-primary">Salveaza</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
</body>
<script type="text/javascript">

	//availability for roles
	var roleid = <?php echo $_SESSION['roleid']; ?>;
	if(roleid !== 1 && roleid !== 2)
	{
		document.getElementById("salveazaFisa").disabled = true;
	}

	//validation
	(function() {
		'use strict';
		window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation1');
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
</script>
</html>