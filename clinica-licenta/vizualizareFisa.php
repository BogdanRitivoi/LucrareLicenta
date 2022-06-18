<!doctype html>
<html lang="en">
<title></title>
<head>
	<?php include "./config/bootstrapInit.html" ?>
	<?php include "./css/navbar.css" ?>
	<?php include "./php/currentFisa.php" ?>
	<?php include "./elements/AddCheckUp.php" ?>
	<?php include "./elements/viewCheckUp.php" ?>
	<?php include "./elements/addIntervention.php" ?>
	<?php include "./elements/viewIntervention.php" ?>
</head>
<body>
	<?php include "./elements/navbar.php" ?>
	<?php include "./elements/deletePopUpCheckUp.php" ?>
	<?php include "./elements/deletePopUpIntervention.php" ?>
	<form action="php/updatePacientRecord.php" method="POST" class="needs-validation2" novalidate>
		<div class="panel container-fluid d-flex h-100 flex-column pt-3">
			<div class="panel-header row border-bottom">
				<div class="container-fluid">
					<h3>FIȘĂ PACIENT - Salvata</h3>
				</div>
			</div>
			<?php include "./elements/contentFisaPacient.php" ?>
			<div class="row">
				<div class="col-6">
					<?php include "./elements/contentCheckUp.php" ?>
				</div>
				<div class="col-6">
					<?php include "./elements/contentInterventions.php" ?>
				</div>
			</div>
			<div class="panel-footer">
				<div class="container-fluid">
					<div class="row form-group align-items-center">
						<div class="col text-right pr-0">
							<button id="updaterecord" type="submit" class="btn btn-outline-primary">Salveaza</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
</div>
</body>
<footer>
	<script type="text/javascript">
		//availability for roles
		var roleid = <?php echo $_SESSION['roleid']; ?>;
		if(roleid !== 1 && roleid !==2)
		{
			document.getElementById("updaterecord").disabled = true;
			document.getElementById("adaugaControl").disabled = true;
			document.getElementById("adaugaInterventie").disabled = true;
			var btndelcontrol = document.getElementsByName("deletebtncu");
			btndelcontrol.forEach(element => element.disabled = true);
			var btndelinterventie = document.getElementsByName("deletebtnint");
			btndelinterventie.forEach(element => element.disabled = true);
			document.getElementById("btnupdateint").disabled = true;
			document.getElementById("btnupdatecu").disabled = true;
		}
		document.getElementById("lastname").value = <?php echo json_encode($lastname); ?>;
		document.getElementById("firstname").value = <?php echo json_encode($firstname); ?>;
		document.getElementById("ci").value = <?php echo json_encode($ci); ?>;
		document.getElementById("county").value = <?php echo json_encode($county); ?>;
		document.getElementById("adress").value = <?php echo json_encode($adress); ?>;
		document.getElementById("phone").value = <?php echo json_encode($phone); ?>;
		document.getElementById("email").value = <?php echo json_encode($email); ?>;
		document.getElementById("entryDate").value = <?php echo json_encode($entryDate); ?>;
		document.getElementById("patientName").value = <?php echo json_encode($patientName); ?>;
		document.getElementById("species").value = <?php echo json_encode($species); ?>;
		document.getElementById("breed").value = <?php echo json_encode($breed); ?>;
		document.getElementById("birthDate").value = <?php echo json_encode($birthDate); ?>;
		document.getElementById("chronic").value = <?php echo json_encode($chronic); ?>;
		document.getElementById("conditions").value = <?php echo json_encode($conditions); ?>;
		document.getElementById("comments").value = <?php echo json_encode($comments); ?>;
		//boolean values
		if(<?php echo json_encode($vaccine); ?> === 1)
		document.getElementById("vaccine").checked = true;
		else
			document.getElementById("vaccine").value = false;

		if(<?php echo json_encode($extDeworm); ?> === 1)
		document.getElementById("extDeworm").checked = true;
		else
			document.getElementById("extDeworm").value = false;

		if(<?php echo json_encode($intDeworm); ?> === 1)
		document.getElementById("intDeworm").checked = true;
		else
			document.getElementById("intDeworm").value = false;

		if(<?php echo json_encode($neutred); ?> === 1)
		document.getElementById("neutred").checked = true;
		else
			document.getElementById("neutred").value = false;

		if(<?php echo json_encode($sex); ?> === 1)
		document.getElementById("sex").checked = true;
		else
			document.getElementById("sex").value = false;

		//get id to delete checkup
		var did;
		$('button[name="deletebtncu"]') .click(function(){
			did = this.id;
		});

		$('button[name="confirmdeletecu"]').click(function(){
			window.location.href = 'http://localhost/clinica-licenta/php/deleteCheckUp.php' + '?id=' + did;
		});

		//get current checkUp
		var cuid;
		$('button[name="viewcu"]') .click(function(){
			cuid = this.id;
			cuid = Number(cuid);
			var arrcuids = <?php echo json_encode($arrcuids); ?>;
			for(var iIndex in arrcuids)
			{
				if( arrcuids[iIndex][0] === cuid)
				{
					document.getElementById("vweight").value = arrcuids[iIndex][2];
					document.getElementById("vconformation").value = arrcuids[iIndex][3];
					document.getElementById("vmaintenance").value = arrcuids[iIndex][4];
					document.getElementById("vcondition").value = arrcuids[iIndex][5];
					document.getElementById("vtemperament").value = arrcuids[iIndex][6];
					document.getElementById("vskin").value = arrcuids[iIndex][7];
					document.getElementById("vapparentMembers").value = arrcuids[iIndex][8];
					document.getElementById("vexplorableCenters").value = arrcuids[iIndex][9];
					document.getElementById("vcuid").value = arrcuids[iIndex][0];
					document.getElementById("createDate").innerHTML = "Control medical: " + arrcuids[iIndex][10]
					document.getElementById("vdiagnosis").value = arrcuids[iIndex][11];
					document.getElementById("vtreatment").value = arrcuids[iIndex][12];
					document.getElementById("vtransfer").value = arrcuids[iIndex][13];
					document.getElementById("vnextvisit").value = arrcuids[iIndex][14];
					document.getElementById("vobservations").value = arrcuids[iIndex][15];
				}
			}
		});

		//get id to delete intervention
		var didint;
		$('button[name="deletebtnint"]') .click(function(){
			didint = this.id;
		});

		$('button[name="confirmdeleteint"]').click(function(){
			window.location.href = 'http://localhost/clinica-licenta/php/deleteIntervention.php' + '?id=' + didint;
		});

		//get current intervention
		var intid;
		$('button[name="viewint"]').click(function(){
			intid = this.id;
			intid = Number(intid);
			var arrint = <?php echo json_encode($arrint); ?>;
			for(var iIndex in arrint)
			{
				if(arrint[iIndex][0] === intid)
				{
					document.getElementById("vintid").value = arrint[iIndex][0];
					document.getElementById("vdoctorname").value = arrint[iIndex][2];
					document.getElementById("vinttype").value = arrint[iIndex][3];
					document.getElementById("vintdiagnosis").value = arrint[iIndex][4];
					document.getElementById("vpretreatment").value = arrint[iIndex][5];
					document.getElementById("vposttreatment").value = arrint[iIndex][6];
					document.getElementById("vintdate").value = arrint[iIndex][7];
					document.getElementById("vindications").value = arrint[iIndex][8];
				}
			}
		});

		//validation
		(function() {
			'use strict';
			window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation2');
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
</footer>
</html>
