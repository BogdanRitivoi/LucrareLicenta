<form action="php/addAnimalOnCage.php" method="POST" class="needs-validationcageanimal" novalidate>
  <div class="modal fade" id="addCageAnimal" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="cagename" class="modal-title">Adaugare animal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row mt-3">
              <input type="text" name="cageId" id="cageId" style="display: none;" />
              <div class="col-2"><label class="control-label">Nume</label></div>
              <div class="col-4">
                <input type="text" name="petname" id="petname" class="form-control form-control-sm" value=""  autocomplete="off" required />
              </div>
              <div class="col-2"><label class="control-label">Data nasterii</label></div>
              <div class="col-4">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control form-control-sm" name="birthdate" id="birthdate" autocomplete="off" required/>
                  <div class="input-group-append" name="btn_date_birthdate"><span class="input-group-text "><i class="fa fa-calendar"></i></span></div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Specie</label></div>
              <div class="col-4">
                <input type="text" name="species" id="species" class="form-control form-control-sm" value=""  autocomplete="off" required />
              </div>
              <div class="col-2"><label class="control-label">Rasa</label></div>
              <div class="col-4">
                <input type="text" name="breed" id="breed" class="form-control form-control-sm" value=""  autocomplete="off" required />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Culoare</label></div>
              <div class="col-4">
                <input type="text" name="petcolor" id="petcolor" class="form-control form-control-sm" value=""  autocomplete="off" required />
              </div>
              <div class="col-2"><label class="control-label">Probleme sanatate*</label></div>
              <div class="col-4">
                <input type="text" name="illnesses" id="illnesses" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Tratament*</label></div>
              <div class="col-4">
                <input type="text" name="treatment" id="treatment" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
              <div class="col-2"><label class="control-label">Alimentatie</label></div>
              <div class="col-4">
                <input type="text" name="food" id="food" class="form-control form-control-sm" value=""  autocomplete="off" required />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Comportament</label></div>
              <div class="col-4">
                <select name="behavior" id="behavior" class="form-control form-control-sm behavior" autocomplete="off" required style="font-weight: bold;">
                  <option value="1">Bland</option>
                  <option value="2">Timid</option>
                  <option value="3">Agresiv</option>
                </select>
              </div>
              <div class="col-2"><label class="control-label">Descriere</label></div>
              <div class="col-4">
                <input type="text" name="description" id="description" class="form-control form-control-sm" value=""  autocomplete="off" required />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Observatii*</label></div>
              <div class="col-4">
                <textarea class="form-control form-control-sm" name="observations" id="observations" rows="3"></textarea>
              </div>
              <div class="col-6">
                <div class="row">
                  <div class="col-4"><label class="control-label">Sex</label></div>
                  <div class="col-8">
                    <select name="gender" id="gender" class="form-control form-control-sm" autocomplete="off" required style="font-weight: bold;">
                      <option value="0">Femela</option>
                      <option value="1">Mascul</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-4"><label class="control-label">Apt pentru adoptie</label></div>
                  <div class="col-2">
                    <input type="checkbox" name="fitforadoption" id="fitforadoption" style="width: 25px; height: 25px;" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col text-left ml-0">
            <button type="button" class="btn btn-sm btn-outline-danger text-left" data-dismiss="modal">Inchide</button>
          </div>
          <div class="col text-right mr-0">
            <button name="btndeletecage" type="button" class="btn btn-sm btn-danger mr-2"  data-toggle="modal" data-target="#deleteModalCage"><i class="fa fa-trash"></i>&nbsp;Eliminare cusca</button>
            <button type="submit" class="btn btn-sm btn-outline-primary">Salveaza</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
   //datepicker
   $(document).ready(function(){
    var date_input1=$('input[name="birthdate"]');
    var options={
      format: 'yyyy/mm/dd',
      todayHighlight: true,
      autoclose: true,
      orientation: 'bottom',
    };

    date_input1.datepicker(options);

    $('div[name="btn_date_birthdate]').click(function(){
      date_input1.datepicker('show');
    });
  });
  //validation
  (function() {
    'use strict';
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validationcageanimal');
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