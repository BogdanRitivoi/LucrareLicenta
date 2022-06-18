<!doctype html>
<html lang="en">
<title></title>
<head>
	<style type="text/css">
		body{
			background: #F4F7FD;
		}
		.card {
			box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
		}
	</style>
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
	<?php include "./elements/addAppointPopUp.php" ?>
	<div class="panel container-fluid d-flex h-100 flex-column pt-3">
		<div class="panel-header row">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h3>Planificator zilnic</h3>
					</div>
					<div class="col-3 text-center">
						<div class="input-group input-group-xl">
							<input type="text" class="form-control form-control-xl" name="selectdate" id="selectdate" autocomplete="off"/>
							<div class="input-group-append" name="btn_date_select"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
						</div>
					</div>
					<div class="col text-right mb-2">
						<button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addAppoint"><span>Adauga </span><i class="fa fa-plus"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="row scroll-box-container mt-4">
			<div class="col px-0 scroll-box text-center">
				<div class="container-fluid w-75"> 
					<?php
					if (isset($_GET['date']))
						$date = (int)$_GET['date'];
					else
						$date = 0;
					$_SESSION['selectdate'] = $date;
					include "./php/getAppointmentsAsCards.php";
					?>
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<form action="php/.php" method="POST"></form>
	<div class="modal fade" id="deleteModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminare vizita</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">
					<p>Doriti sa stergeti aceasata vizita?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Inchide</button>
					<button type="button" name="confirmdelete" class="btn btn-outline-danger" data-dismiss="modal">Sterge</button>
				</div>
			</div>

		</div>
	</div>
	<script type="text/javascript">

		 //datepicker
		 $(document).ready(function(){
		 	var date_input1=$('input[name="selectdate"]');
		 	var options={
		 		format: 'yyyy/mm/dd',
		 		todayHighlight: true,
		 		autoclose: true,
		 		orientation: 'bottom',
		 	};

		 	date_input1.datepicker(options);
		 	
		 	//get selected Date from url
		 	var Sdate = <?php
		 	if (isset($_GET['date']))
		 		$Sdate = (int)$_GET['date'];
		 	else
		 		$Sdate = 0;
		 	echo $Sdate;
		 	?>;
		 	if(Sdate != ""){
		 		Sdate = String(Sdate);
		 		var YSdate = Sdate.slice(0,4);
		 		var MSdate = Sdate.slice(4,6);
		 		var DSdate = Sdate.slice(6,8);
		 		date_input1.datepicker("setDate", YSdate + "/" + MSdate + "/" + DSdate);
		 	}
		 	else
		 	{
		 		date_input1.datepicker("setDate", new Date());
		 		var todayDateStr = document.getElementById("selectdate").value;
		 		var todayDateStr = String(todayDateStr);
		 		var YtodayDateStr = todayDateStr.slice(0,4);
		 		var MtodayDateStr = todayDateStr.slice(5,7);
		 		var DtodayDateStr = todayDateStr.slice(8,10);
		 		window.location.href = "?date=" + YtodayDateStr + MtodayDateStr + DtodayDateStr;
		 	}
		 	$('div[name="btn_date_select"]').click(function(){
		 		date_input1.datepicker('show');
		 	});
		 	$('#selectdate').on('change',function(){
		 		var selectDateT = document.getElementById("selectdate").value;
		 		var selectDateStr = String(selectDateT);
		 		var ydate = selectDateT.slice(0,4);
		 		var mdate = selectDateT.slice(5,7);
		 		var ddate = selectDateT.slice(8,10);
		 		window.location.href = "?date=" + ydate + mdate + ddate;
		 	});
		 });

		 var did;
		 $('button[name="deletebtn"]') .click(function(){
		 	did = this.id;
		 	console.log(did);
		 });

		 $('button[name="confirmdelete"]').click(function(){
		 	window.location.href = 'http://localhost/clinica-licenta/php/deleteAppointments.php' + '?id=' + did;
		 })
		</script>
	</footer>
	</html>