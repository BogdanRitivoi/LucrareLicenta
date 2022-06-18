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
	<style type="text/css">
		.card{
			min-height: 200px;
			border-radius: 25px;
			font-size: 30px;
			width: 85%;
			margin-left: 7.5%;
		}
		.card:hover{
			transform: scale(1.08);
		}
		.card-title{
			font-size: 30px;
		}
		.huge{
			font-size: 100px;
		}
	</style>
</head>
<body>
	<?php include "./elements/navbar.php" ?>
	<?php include "./elements/addCagePopUp.php" ?>
	<?php include "./elements/addCageAnimalPopUp.php" ?>
	<?php include "./elements/deleteCagePopUp.php" ?>
	<?php include "./elements/viewCageAnimalPopUp.php" ?>
	<?php include "./elements/deleteAnimalCagePopUp.php" ?>
	<form method="POST" class="needs-validation" novalidate>
		<div class="panel container-fluid d-flex h-100 flex-column pt-3">
			<div class="panel-header row border-bottom">
				<div class="col">
					<h3>Adapost</h3>
				</div>
				<div class="col text-right">
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addCage"><i class="fa fa-plus" ></i> Adauga</button>
				</div>
			</div>
			<div class="allRows mt-2" style="color: #fff;">
				<div class="row mt-3">
					<?php include "./php/getCagesAsCards.php" ?>
				</div>
			</div>
			
			<div class="panel-footer">
				<div class="container-fluid">
					<div class="row form-group align-items-center">
						<div class="col text-right pr-0">
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
		//add cage animal
		var cageId;
		$('div[name="addCageAnimal"]') .click(function(){
			cageId = this.id;
			document.getElementById("cageId").value = cageId;
		});
		//delete cage
		$('button[name="confirmdeletecage"]').click(function(){
			window.location.href = 'http://localhost/clinica-licenta/php/deleteCage.php' + '?id=' + cageId;
		});
		//view cage animal
		var vcageId
		$('div[name="viewCageAnimal"]') .click(function(){
			vcageId = this.id;
			vcageId = Number(vcageId);
			document.getElementById("vcageId").value = vcageId;
			var arrCages = <?php echo json_encode($arrCages); ?>;
			for( var iIndex in arrCages)
			{
				if(arrCages[iIndex][0] === vcageId)
				{
					document.getElementById("vpetname").value = arrCages[iIndex][2];
					document.getElementById("vbirthdate").value = arrCages[iIndex][3];
					document.getElementById("vpetcolor").value = arrCages[iIndex][4];
					document.getElementById("vgender").value = arrCages[iIndex][5];
					document.getElementById("villnesses").value = arrCages[iIndex][6];
					document.getElementById("vtreatment").value = arrCages[iIndex][7];
					document.getElementById("vfood").value = arrCages[iIndex][8];
					document.getElementById("vbehavior").value = arrCages[iIndex][9];

					if(arrCages[iIndex][10] == 1)
						document.getElementById("vfitforadoption").checked = true;
					else
						document.getElementById("vfitforadoption").checked = false;

					document.getElementById("vobservations").value = arrCages[iIndex][11];
					document.getElementById("vdescription").value = arrCages[iIndex][12];
					document.getElementById("vbreed").value = arrCages[iIndex][13];
					document.getElementById("vspecies").value = arrCages[iIndex][14];

				}
			}
		});
		//remove animal
		$('button[name="confirmdeleteanimalcage"]').click(function(){
			window.location.href = 'http://localhost/clinica-licenta/php/removeAnimalCage.php' + '?id=' + vcageId;
		});
		//generate form
		$('button[name="generateform"]').click(function(){
			window.location.href = 'http://localhost/clinica-licenta/formularAdoptieNou.php' + '?id=' + vcageId;
		});
	</script>
</footer>
</html>
