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
		body > .bg{
			background-image: linear-gradient(-90deg, #92c3f7, #4287f5);
			width: 100%;
			height: 867px;
			clip-path: polygon(0 0, 100% 0, 100% 50%, 50% 100%, 0 100%, 0% 50%);
			position: absolute;
		}
		.flat-button {
			position: relative;
			width: 300px; height: 200px;
			border: 5px solid #fff;
			margin: 0 auto;
			margin-top: 40px;
			overflow: hidden;
			z-index: 1;
			cursor: pointer;
			transition: color .3s;
			line-height: 60px;
			text-align: center;
			color: #fff;
			font-size: 30px;
			font-weight: bold;
		}

		.flat-button:after {
			position: absolute;
			top: 90%; left: 0;
			width: 100%; height: 100%;
			background: #fff;
			opacity: 0.25;
			content: "";
			z-index: -2;
			transition: transform .3s;
		}

		.flat-button:hover::after {
			transform: translateY(-80%);
			transition: transform .3s;
		}
		.flat-button i{
			font-size: 50px
		}
		.logoimg{
			position: fixed;
			width: 400px;
			height: 400px;
			right: 0px;
			bottom: 0px;
		}
	</style>
</head>
<body>
	<?php include "./elements/navbar.php" ?>
	<img class="logoimg" src="img/logo_black1000.png">
	<div class="bg panel container-fluid">
		<div class="row mb-5">
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/listaFise.php?');">
					<i class="fa fa-clipboard mt-5"></i>
					<p>Lista Fise Pacient</p>
				</div>
			</div>
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/fisaNoua.php');">
					<i class="fa fa-plus mt-5"></i>
					<p>Fisa Pacient Noua</p>
				</div>
			</div>
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/planificator.php');">
					<i class="fa fa-calendar mt-5"></i>
					<p>Planificator</p>
				</div>
			</div>
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/adapost.php');">
					<i class="fa fa-paw mt-5"></i>
					<p>Adapost</p>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/animaleAdoptate.php');">
					<i class="fa fa-file mt-5"></i>
					<p>Formulare adoptie</p>
				</div>
			</div>
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/setariRoluri.php');">
					<i class="fa fa-users mt-5"></i>
					<p>Roluri</p>
				</div>
			</div>
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/setariListaActivitati.php');">
					<i class="fa fa-tasks mt-5"></i>
					<p>Lista activitati</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/setari.php');">
					<i class="fa fa-gears mt-5"></i>
					<p>Setari</p>
				</div>
			</div>
			<div class="col-3">
				<div class='flat-button' onclick="myhref('http://localhost/clinica-licenta/php/logout.php');">
					<i class="fa fa-sign-out mt-5"></i>
					<p>Deconectare</p>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function myhref(web){
		window.location.href = web;
	}
</script>
</html>