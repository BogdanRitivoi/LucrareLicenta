<form action="php/updateIntervention.php" method="POST" class="needs-validationint2" novalidate>
  <div class="modal fade" id="ViewIntervention" role="dialog">
    <div class="modal-dialog modal-xl">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Interventie medicala</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <input type="text" name="vintid" id="vintid" class="form-control form-control-sm" value=""  autocomplete="off" style="display: none;" />
            <div class="row mt-3">
              <div class="col-2"><label class="control-label">Medic</label></div>
              <div class="col-4">
               <select class="form-control form-control-sm" required name="vdoctorname" id="vdoctorname">
                  <?php include "./php/getDoctorsAsOptions.php" ?>
                </select>
              </div>
              <div class="col-2"><label class="control-label">Tip interventie</label></div>
              <div class="col-4">
                <input type="text" name="vinttype" id="vinttype" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Diagnostic</label></div>
              <div class="col-10">
                <input type="text" name="vintdiagnosis" id="vintdiagnosis" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Tratament preop</label></div>
              <div class="col-10">
                <input type="text" name="vpretreatment" id="vpretreatment" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Tratament postop</label></div>
              <div class="col-10">
                <input type="text" name="vposttreatment" id="vposttreatment" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Data interventie</label></div>
              <div class="col-4">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control form-control-sm" name="vintdate" id="vintdate" autocomplete="off" required/>
                  <div class="input-group-append" name="vbtn_date_int"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Indicatii</label></div>
              <div class="col-10">
               <textarea type="text" name="vindications" id="vindications" class="form-control form-control-sm" value=""  autocomplete="off" rows="3"></textarea>
             </div>
           </div>
         </div>
       </div>
       <div class="modal-footer">
        <div class="col text-left ml-0">
          <button type="button" class="btn btn-outline-danger text-left" data-dismiss="modal">Inchide</button>
        </div>
        <div class="col text-right mr-0">
          <button id="btnupdateint" type="submit" class="btn btn-outline-primary">Salveaza</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
      var vdate_inputint=$('input[name="vintdate"]');
      var options={
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,
        orientation: 'bottom',
      };
      vdate_inputint.datepicker(options);
      $('div[name="vbtn_date_int]').click(function(){
        vdate_inputint.datepicker('show');
      });
    });
  //validation
    (function() {
      'use strict';
      window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validationint2');
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