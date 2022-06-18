<form method="POST" action="php/insertAppointment.php" id="addAppointForm">
  <div class="modal fade" id="addAppoint" role="dialog">
    <div class="modal-dialog modal-xl">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adauga vizita</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-2">
                <label class="control-label">Medic:</label>
              </div>
              <div class="col-4">
                <select class="form-control form-control-sm" required name="fulluser">
                  <?php include "./php/getDoctorsAsOptions.php" ?>
                </select>
              </div>
              <div class="col-2">
                <label class="control-label">Data:</label>
              </div>
              <div class="col-4">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control form-control-sm" name="date1" id="appointDate" autocomplete="off"/>
                  <div class="input-group-append" name="btn_date_1"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2">
                <label class="control-label">Sosire:</label>
              </div>
              <div class="col-4">
                <input type="time" class="form-control form-control-sm" id="timestart" name="timestart"/>
              </div>
              <div class="col-2">
                <label class="control-label">Plecare:</label>
              </div>
              <div class="col-4">
                <input type="time" class="form-control form-control-sm" id="timefinish" name="timefinish"/>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2">
                <label class="control-label">Descriere:</label>
              </div>
              <div class="col-10">
                <textarea class="form-control form-control-sm" rows="3" autocomplete="off" name="description"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="add_appoint" class="btn btn-sm btn-outline-primary">Adauga</button>
        </div>
      </div>

    </div>
  </div>
</form>

<script type="text/javascript">
  //datepicker
  $(document).ready(function(){
    var date_input1=$('input[name="date1"]');
    var options={
      format: 'yyyy/mm/dd',
      todayHighlight: true,
      autoclose: true,
      orientation: 'bottom',
    };
    date_input1.datepicker("setDate", new Date())
    date_input1.datepicker(options);
    $('div[name="btn_date_1"]').click(function(){
      date_input1.datepicker('show');
    });
  });

  ////validate start and finish time
  $('button[id="add_appoint"]').click(function(){
    var start = document.getElementById("timestart").value;
    var finish = document.getElementById("timefinish").value;
    if(finish >= start && finish != '' && start != '')
    {
      $("#addAppointForm").submit();
    }
    else
    {
      alert("Ora plecarii trebuie sa fie mai mare decat ora sosirii");
    }
  });
</script>