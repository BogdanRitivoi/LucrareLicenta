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
		body{
			background: #F4F7FD;
		}

		.card-margin {
			margin-bottom: 1.875rem;
		}

		.card {
			border: 0;
			box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
		}
		.card {
			position: relative;
			display: flex;
			flex-direction: column;
			min-width: 0;
			word-wrap: break-word;
			background-color: #ffffff;
			background-clip: border-box;
			border: 1px solid #e6e4e9;
			border-radius: 8px;
		}

		.card .card-header.no-border {
			border: 0;
		}
		.card .card-header {
			background: none;
			padding: 0 0.9375rem;
			font-weight: 500;
			display: flex;
			align-items: center;
			min-height: 50px;
		}
		.card-header i{
			font-size: 28px;
		}
		.card-header:first-child {
			border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
		}
	</style>
</head>
<body>
	<?php include "./elements/navbar.php" ?>
	<div class="panel container-fluid">
		<div class="panel-header row mt-2 mb-1">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h3>Animale adoptate</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php include "./php/getAdoptionsAsCards.php" ?>
		</div>
	</div>
	
</body>
<script type="text/javascript">
	
</script>
</html>