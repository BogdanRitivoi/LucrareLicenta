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
	<?php include "./elements/deletePopUp.php" ?>
	<div class="panel container-fluid d-flex h-100 flex-column pt-3">
		<div class="panel-header row">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h3>Lista Fise Pacienti</h3>
					</div>
					<div class="col text-right mb-2">
						<button type="button" class="btn btn-outline-primary" id="newFile"><span>Adauga </span><i class="fa fa-plus"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="row scroll-box-container">
			<div class="col px-0 scroll-box">
				<div class="container-fluid">
					<table class="table table-hover">
						<thead>
							<tr class="thead-dark">
								<th style="width: 6%">Id</th>
								<th>Nume proprietar</th>
								<th>Prenume proprietar</th>
								<th>Nr. telefon</th>
								<th>Email</th>
								<th>Nume pacient</th>
								<th>Specie</th>
								<th>Rasa</th>
								<th>Data inregistrare</th>
								<th style="width: 20px"></th>
							</tr>
							<tr>
								<th><input type="text" name="filterid" id="filterid" class="form-control form-control-sm filterSearch"></th>
								<th><input type="text" name="filtername" id="filtername" class="form-control form-control-sm filterSearch"></th>
								<th><input type="text" name="filterfirstname" id="filterfirstname" class="form-control form-control-sm filterSearch"></th>
								<th><input type="text" name="filterphone" id="filterphone" class="form-control form-control-sm filterSearch"></th>
								<th><input type="text" name="filteremail" id="filteremail" class="form-control form-control-sm filterSearch"></th>
								<th><input type="text" name="filterpatientname" id="filterpatientname" class="form-control form-control-sm filterSearch"></th>
								<th><input type="text" name="filterspecies" id="filterspecies" class="form-control form-control-sm filterSearch"></th>
								<th><input type="text" name="filterbreed" id="filterbreed" class="form-control form-control-sm filterSearch"></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_GET['filterid']))
								$filterid = (string)$_GET['filterid'];
							else
								$filterid = "";
							$_SESSION['filterid'] = $filterid;

							if (isset($_GET['filtername']))
								$filtername = (string)$_GET['filtername'];
							else
								$filtername = "";
							$_SESSION['filtername'] = $filtername;

							if (isset($_GET['filterfirstname']))
								$filterfirstname = (string)$_GET['filterfirstname'];
							else
								$filterfirstname = "";
							$_SESSION['filterfirstname'] = $filterfirstname;

							if (isset($_GET['filterphone']))
								$filterphone = (string)$_GET['filterphone'];
							else
								$filterphone = "";
							$_SESSION['filterphone'] = $filterphone;

							if (isset($_GET['filteremail']))
								$filteremail = (string)$_GET['filteremail'];
							else
								$filteremail = "";
							$_SESSION['filteremail'] = $filteremail;

							if (isset($_GET['filterpatientname']))
								$filterpatientname = (string)$_GET['filterpatientname'];
							else
								$filterpatientname = "";
							$_SESSION['filterpatientname'] = $filterpatientname;

							if (isset($_GET['filterspecies']))
								$filterspecies = (string)$_GET['filterspecies'];
							else
								$filterspecies = "";
							$_SESSION['filterspecies'] = $filterspecies;

							if (isset($_GET['filterbreed']))
								$filterbreed = (string)$_GET['filterbreed'];
							else
								$filterbreed = "";
							$_SESSION['filterbreed'] = $filterbreed;

							include "./php/getFise.php" 
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<?php include "./js/listaFise.js"?>
	<script type="text/javascript">
		//availability for roles
		var roleid = <?php echo $_SESSION['roleid']; ?>;
		if(roleid !== 1 && roleid !== 2)
		{
			document.getElementById("newFile").disabled = true;
			var btndeletefisa = document.getElementsByName("deletebtn");
			btndeletefisa.forEach(element => element.disabled = true);
		}

		//filters
		$(document).ready(function(){
			
			//get and set currentURL
			var currentURL = window.location.href;
			var hasFilters = currentURL.includes("?");
			if(!hasFilters)
				window.location.href = "?";
			//get all existing filters
			var allFilters = window.location.search.substr(1).split("&");
			var fil = {};
			for (var i = 0; i < allFilters.length; i++) {
				var temp = allFilters[i].split("=");
				fil[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
				//set inputs to existing value
				if(decodeURIComponent(temp[0])!=="")
					$('#' + decodeURIComponent(temp[0])).val(decodeURIComponent(temp[1]));
			}

			//filter events
			$('.filterSearch').on('change', function(){
				var attVal = $(this).val();
				var attName = $(this).attr('name');
				var attFormat = "&" + attName + "=";
				var hasThisFilter = currentURL.includes(attFormat + fil[attName]);
				if(hasThisFilter && attVal != "")
					currentURL = currentURL.replace(attFormat + fil[attName], attFormat + attVal);
				if(hasThisFilter && attVal == "")
					currentURL = currentURL.replace(attFormat + fil[attName], "");
				if(!hasThisFilter && attVal != "")
					currentURL = currentURL + attFormat + attVal;
				window.location.href = currentURL;
			});

		});
	</script>
</footer>
</html>