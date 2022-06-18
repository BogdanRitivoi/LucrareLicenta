<form action="php/insertIntervention.php" method="POST" class="needs-validationint" novalidate>
  <div class="modal fade" id="AddIntervention" role="dialog">
    <div class="modal-dialog modal-xl">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Interventie medicala</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row mt-3">
              <div class="col-2"><label class="control-label">Medic</label></div>
              <div class="col-4">
               <select class="form-control form-control-sm" required name="doctorname" id="doctorname">
                  <?php include "./php/getDoctorsAsOptions.php" ?>
                </select>
              </div>
              <div class="col-2"><label class="control-label">Tip interventie</label></div>
              <div class="col-4">
                <input type="text" name="inttype" id="inttype" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Diagnostic</label></div>
              <div class="col-10">
                <input type="text" name="intdiagnosis" id="intdiagnosis" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Tratament preop</label></div>
              <div class="col-10">
                <input type="text" name="pretreatment" id="pretreatment" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Tratament postop</label></div>
              <div class="col-10">
                <input type="text" name="posttreatment" id="posttreatment" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Data interventie</label></div>
              <div class="col-4">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control form-control-sm" name="intdate" id="intdate" autocomplete="off" required/>
                  <div class="input-group-append" name="btn_date_int"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Indicatii</label></div>
              <div class="col-10">
               <textarea type="text" name="indications" id="indications" class="form-control form-control-sm" value=""  autocomplete="off" rows="3"></textarea>
             </div>
           </div>
         </div>
       </div>
       <div class="modal-footer">
        <div class="col text-left ml-0">
          <button type="button" class="btn btn-outline-danger text-left" data-dismiss="modal">Inchide</button>
        </div>
        <div class="col text-right mr-0">
          <button type="submit" class="btn btn-outline-primary">Salveaza</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
      var date_inputint=$('input[name="intdate"]');
      var options={
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,
        orientation: 'bottom',
      };
      date_inputint.datepicker(options);
      $('div[name="btn_date_int"]').click(function(){
        date_inputint.datepicker('show');
      });
      date_inputint.datepicker("setDate", new Date());
    });
  //validation
    (function() {
      'use strict';
      window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validationint');
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
</form>