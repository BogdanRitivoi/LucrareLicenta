<script type="text/javascript">
	$('td[name="view"]') .click(function(){
    	var id = this.parentElement.id;
    	window.location.href = 'http://localhost/clinica-licenta/vizualizareFisa.php' + '?id=' + id;
	});

	//get id to delete 
	var did;
	$('button[name="deletebtn"]') .click(function(){
		did = this.id;
	});

	$('button[name="confirmdelete"]').click(function(){
		window.location.href = 'http://localhost/clinica-licenta/php/stergeFisaDinLista.php' + '?id=' + did;
	});

	$('#newFile') .click(function(){
    	window.location.href = 'http://localhost/clinica-licenta/fisaNoua.php';
	});
</script>