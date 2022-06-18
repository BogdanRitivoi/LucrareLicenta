<form action="php/insertCheckUp.php" method="POST" class="needs-validation3" novalidate>
  <div class="modal fade" id="AddCheckUp" role="dialog">
    <div class="modal-dialog modal-xl">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Control medical</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row mt-3">
              <div class="col-2"><label class="control-label">Greutate(Kg)</label></div>
              <div class="col-4">
                <input type="number" step="0.01" name="weight" id="weight" class="form-control form-control-sm" value=""  autocomplete="off" required/>
              </div>
              <div class="col-2"><label class="control-label">Conformatie</label></div>
              <div class="col-4">
                <input type="text" name="conformation" id="conformation" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Stare de intretinere</label></div>
              <div class="col-4">
                <input type="text" name="maintenance" id="maintenance" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
              <div class="col-2"><label class="control-label">Atitudine</label></div>
              <div class="col-4">
                <input type="text" name="condition" id="condition" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Temperament</label></div>
              <div class="col-4">
                <input type="text" name="temperament" id="temperament" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
              <div class="col-2"><label class="control-label">Pielea</label></div>
              <div class="col-4">
                <input type="text" name="skin" id="skin" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Mucoasele aparente</label></div>
              <div class="col-4">
                <input type="text" name="apparentMembers" id="apparentMembers" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
              <div class="col-2"><label class="control-label">Limfocentri</label></div>
              <div class="col-4">
                <input type="text" name="explorableCenters" id="explorableCenters" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Diagnostic</label></div>
              <div class="col-10">
                <input type="text" name="diagnosis" id="diagnosis" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Tratament</label></div>
              <div class="col-10">
                <input type="text" name="treatment" id="treatment" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Transfer la alta clinica</label></div>
              <div class="col-4">
                <input type="text" name="transfer" id="transfer" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
              <div class="col-2"><label class="control-label">Urmatoarea vizita</label></div>
              <div class="col-4">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control form-control-sm" name="nextvisit" id="nextvisit" autocomplete="off"/>
                  <div class="input-group-append" name="btn_date_nextvisit"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Observatii</label></div>
              <div class="col-10">
                <textarea type="text" name="observations" id="observations" class="form-control form-control-sm" value=""  autocomplete="off" rows="3"></textarea>
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
    //set date
    $(document).ready(function(){
      var date_input1=$('input[name="nextvisit"]');
      var options={
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,
        orientation: 'bottom',
      };
      date_input1.datepicker(options);
      $('div[name="btn_date_nextvisit"]').click(function(){
        date_input1.datepicker('show');
      });
    });

    //validation
    (function() {
      'use strict';
      window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation3');
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