<!doctype html>
<html lang="en">
<title></title>
<head>
	<?php include "./config/bootstrapInit.html" ?>
	<style type="text/css">
		body,html{
			height:100%;
			background-image: linear-gradient(0deg, #75a8fa, #4388f7);
		}
		.card{
			border-width: 6px;
			border-color: white;
			background-color: transparent;
			color: white;
			font-weight: bold;
		}
		.btncolored{
			background-color: white;
			color: black;
			font-weight: bold;
		}
		.btncolored:hover{
			color: #fff;
			background-color: #0061ff;
		}
	</style>
</head>
<body>
	<div class="row ml-2">
		<div class="col-12 text-center position-fixed">
			<img src="img/logo_white1000.png" class="img-fluid" style="width: 300px; height: 300px; transform: scale(1.30)">
		</div>
	</div>
	<div class="container h-100 pt-5">
		<div class="row h-100 justify-content-center align-items-center">
			<form action="php/loginform.php" method="POST" class="col-6">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col">
								<h5>Log In</h5>
							</div>
							<div class="col text-right">
								<i class="fa fa-user-circle" aria-hidden="true" style="font-size: 30px;"></i>
							</div>
						</div>
						
					</div>
					<div class="card-body">
						<?php if (isset($_GET['error'])) { ?>
							<div class="col-12 text-center p-0"><div class="alert alert-danger alert-dismissible fade show mt-0" role="alert" id="userErr">
								<strong><?php echo $_GET['error']; ?></strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div></div>
						<?php } ?>
						<div class="row form-group align-items-center">
							<div class="col">Nume utilizator:</div>
						</div>
						<div class="row form-group align-items-center">
							<div class="col">
								<input type="text" name="username" class="form-control form-control-sm" autocomplete="off"/>
							</div>
						</div>
						<div class="row form-group align-items-center">
							<div class="col">Parola:</div>
						</div>
						<div class="row form-group align-items-center">
							<div class="col">
								<input type="password" name="password" class="form-control form-control-sm"/>
							</div>
						</div>
						<div class="row form-group align-items-center mt-5">
							<div class="col-12 d-flex justify-content-center">
								<button type="submit" class="btn btn-sm w-50 border-0 btncolored">Log In</button>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
	</div>
</body>
</html>
