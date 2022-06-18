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
	<?php include "./php/getInfoCageAnimal.php" ?>
	<form action="php/insertAdoptions.php" method="POST" class="needs-validationadf" novalidate>
		<div class="panel container-fluid d-flex h-100 flex-column pt-3">
			<div class="panel-header row border-bottom">
				<div class="container-fluid">
					<h3>Formular adoptie</h3>
				</div>
			</div>
			<h4 class="mb-3 mt-4">Informații proprietar</h4>
			<div class="row form-group align-items-center">
				<input type="text" name="formid" id="formid" style="display: none;"/>
				<div class="col-1"><label class="control-label">Nume</label></div>
				<div class="col-3">
					<input type="text" name="lastname" class="form-control form-control-sm" value="" id="lastname"  autocomplete="off" required/>
				</div>
				<div class="col-1"><label class="control-label">Prenume</label></div>
				<div class="col-3">
					<input type="text" name="firstname" class="form-control form-control-sm" id="firstname"  autocomplete="off" required/>
				</div>
				<div class="col-1"><label class="control-label">C.I.</label></div>
				<div class="col-3">
					<input type="text" name="ci" class="form-control form-control-sm" id="ci"  autocomplete="off" required/>
				</div>
			</div>
			<div class="row form-group align-items-center">
				<div class="col-1"><label class="control-label">Județ</label></div>
				<div class="col-3">
					<input type="text" name="county" class="form-control form-control-sm" id="county" autocomplete="off" required/>
				</div>
				<div class="col-1"><label class="control-label">Adresă</label></div>
				<div class="col-7">
					<div class="input-group input-group-sm">
						<input type="text" name="adress" class="form-control form-control-sm" id="adress" autocomplete="off" required/>
						<div class="input-group-append"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
					</div>
				</div>
			</div>
			<div class="row form-group align-items-center">
				<div class="col-1"><label class="control-label">Nr. telefon</label></div>
				<div class="col-3">
					<div class="input-group input-group-sm">
						<input type="text" name="phone" class="form-control form-control-sm" id="phone" autocomplete="off" required/>
						<div class="input-group-append"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
					</div>
				</div>
				<div class="col-1"><label class="control-label">Email &midast;</label></div>
				<div class="col-3">
					<div class="input-group input-group-sm date">
						<input type="text" name="email" class="form-control form-control-sm" id="email" autocomplete="off"/>
						<div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
					</div>
				</div>
				<div class="col-1"><label class="control-label">Dată înregistrare</label></div>
				<div class="col-3">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control form-control-sm" name="entryDate" id="entryDate" autocomplete="off" required/>
						<div class="input-group-append" name="btn_date_1"><span class="input-group-text "><i class="fa fa-calendar"></i></span></div>
					</div>
				</div>
			</div>
			<h4 class="mb-3 mt-4">Informații animal</h4>
			<div class="row form-group align-items-center">
				<div class="col-1"><label class="control-label">Nume</label></div>
				<div class="col-3">
					<input type="text" name="petname" id="petname" class="form-control form-control-sm" autocomplete="off" required />
				</div>
				<div class="col-1"><label class="control-label">Data nasterii</label></div>
				<div class="col-3">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control form-control-sm" name="birthdate" id="birthdate" autocomplete="off" required/>
						<div class="input-group-append" name="btn_date_birthdate"><span class="input-group-text "><i class="fa fa-calendar"></i></span></div>
					</div>
				</div>
				<div class="col-1"><label class="control-label">Specie</label></div>
				<div class="col-3">
					<input type="text" name="species" id="species" class="form-control form-control-sm" autocomplete="off" required />
				</div>
			</div>
			<div class="row form-group align-items-center">
				<div class="col-1"><label class="control-label">Rasa</label></div>
				<div class="col-3">
					<input type="text" name="breed" id="breed" class="form-control form-control-sm" autocomplete="off" required />
				</div>
				<div class="col-1"><label class="control-label">Culoare</label></div>
				<div class="col-3">
					<input type="text" name="petcolor" id="petcolor" class="form-control form-control-sm" autocomplete="off" required />
				</div>
				<div class="col-1"><label class="control-label">Probleme sanatate*</label></div>
				<div class="col-3">
					<input type="text" name="illnesses" id="illnesses" class="form-control form-control-sm" autocomplete="off" />
				</div>
			</div>
			<div class="row form-group align-items-center">
				<div class="col-1"><label class="control-label">Tratament*</label></div>
				<div class="col-3">
					<input type="text" name="treatment" id="treatment" class="form-control form-control-sm" autocomplete="off" />
				</div>
				<div class="col-1"><label class="control-label">Alimentatie</label></div>
				<div class="col-3">
					<input type="text" name="food" id="food" class="form-control form-control-sm" autocomplete="off" required />
				</div>
				<div class="col-1"><label class="control-label">Comportament</label></div>
				<div class="col-3">
					<select name="behavior" id="behavior" class="form-control form-control-sm behavior" autocomplete="off" required style="font-weight: bold;">
						<option value="1">Bland</option>
						<option value="2">Timid</option>
						<option value="3">Agresiv</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-1"><label class="control-label">Descriere</label></div>
				<div class="col-3">
					<input type="text" name="description" id="description" class="form-control form-control-sm" value=""  autocomplete="off" required />
				</div>
				<div class="col-1"><label class="control-label">Observatii*</label></div>
				<div class="col-3">
					<textarea class="form-control form-control-sm" name="observations" id="observations" rows="3"></textarea>
				</div>
				<div class="col-4">
					<div class="row">
						<div class="col-3"><label class="control-label">Sex</label></div>
						<div class="col-9">
							<select name="gender" id="gender" class="form-control form-control-sm" autocomplete="off" required style="font-weight: bold;">
								<option value="0">Femela</option>
								<option value="1">Mascul</option>
							</select>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-3"><label class="control-label">Apt adoptie</label></div>
						<div class="col-3">
							<input type="checkbox" name="fitforadoption" id="fitforadoption" style="width: 25px; height: 25px;" />
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="container-fluid">
					<div class="row form-group align-items-center">
						<div class="col text-right pr-0">
							<button id="" type="submit" class="btn btn-outline-primary">Salveaza</button>
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
		//get data
		var formid = <?php echo json_encode($id); ?>;
		if(formid !== "")
		{
			document.getElementById("formid").value = formid;
			document.getElementById("formid").setAttribute("readonly", "readonly");
		}
		var petname = <?php echo json_encode($petname); ?>;
		if(petname !== "")
		{
			document.getElementById("petname").value = petname;
			document.getElementById("petname").setAttribute("readonly", "readonly");
		}
		var birthdate  = <?php echo json_encode($birthdate); ?>;
		if(birthdate !== "")
		{
			document.getElementById("birthdate").value = birthdate;
			document.getElementById("birthdate").setAttribute("readonly", "readonly");
		}
		var species  = <?php echo json_encode($species); ?>;
		if(species !== "")
		{
			document.getElementById("species").value = species;
			document.getElementById("species").setAttribute("readonly", "readonly");
		}
		var breed  = <?php echo json_encode($breed); ?>;
		if(breed !== "")
		{
			document.getElementById("breed").value = breed;
			document.getElementById("breed").setAttribute("readonly", "readonly");
		}
		var petcolor  = <?php echo json_encode($petcolor); ?>;
		if(petcolor !== "")
		{
			document.getElementById("petcolor").value = petcolor;
			document.getElementById("petcolor").setAttribute("readonly", "readonly");
		}
		var illnesses  = <?php echo json_encode($illnesses); ?>;
		if(illnesses !== "")
		{
			document.getElementById("illnesses").value = illnesses;
			document.getElementById("illnesses").setAttribute("readonly", "readonly");
		}
		var treatment  = <?php echo json_encode($treatment); ?>;
		if(treatment !== "")
		{
			document.getElementById("treatment").value = treatment;
			document.getElementById("treatment").setAttribute("readonly", "readonly");
		}
		var food  = <?php echo json_encode($food); ?>;
		if(food !== "")
		{
			document.getElementById("food").value = food;
			document.getElementById("food").setAttribute("readonly", "readonly");
		}
		var behavior  = <?php echo json_encode($behavior); ?>;
		if(behavior !== "")
		{
			document.getElementById("behavior").value = behavior;
			document.getElementById("behavior").setAttribute("readonly", "readonly");
		}
		var description  = <?php echo json_encode($description); ?>;
		if(description !== "")
		{
			document.getElementById("description").value = description;
			document.getElementById("description").setAttribute("readonly", "readonly");
		}
		var observations  = <?php echo json_encode($observations); ?>;
		if(observations !== "")
		{
			document.getElementById("observations").value = observations;
			document.getElementById("observations").setAttribute("readonly", "readonly");
		}
		var gender  = <?php echo json_encode($gender); ?>;
		if(gender !== "")
		{
			document.getElementById("gender").value = gender;
			document.getElementById("gender").setAttribute("readonly", "readonly");
		}
		var fitforadoption  = <?php echo json_encode($fitforadoption); ?>;
		if(fitforadoption !== "")
		{
			if(fitforadoption === 1)
				document.getElementById("fitforadoption").checked = true;
			else
				document.getElementById("fitforadoption").checked = false;
		}
		//datepicker
		$(document).ready(function(){
			var date_input1=$('input[name="birthdate"]');
			var options={
				format: 'yyyy/mm/dd',
				todayHighlight: true,
				autoclose: true,
				orientation: 'bottom',
			};
			var date_input2=$('input[name="entryDate"]');
			var options={
				format: 'yyyy/mm/dd',
				todayHighlight: true,
				autoclose: true,
				orientation: 'bottom',
			};
			date_input2.datepicker(options);
			date_input1.datepicker(options);

			$('div[name="btn_date_birthdate]').click(function(){
				date_input1.datepicker('show');
			});
		});
  //validation
  (function() {
  	'use strict';
  	window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validationadf');
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
