<form action="php/updateUser.php" method="POST" class="needs-validation4" novalidate>
  <div class="modal fade" id="viewUserPopUp" role="dialog">
    <div class="modal-dialog modal-xl">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="userPopUpHeader"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row mt-3">
              <input type="text" id="vuserId" name="vuserId" style="display: none;" />
              <div class="col-2"><label class="control-label">Nume utilizator</label></div>
              <div class="col-4">
                <input type="text" name="vusername" id="vusername" class="form-control form-control-sm" value=""  autocomplete="off" required/>
              </div>
              <div class="col-2"><label class="control-label">Nume</label></div>
              <div class="col-4">
                <input type="text" name="vlastname" id="vlastname" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Prenume</label></div>
              <div class="col-4">
                <input type="text" name="vfirstname" id="vfirstname" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
              <div class="col-2"><label class="control-label">Rol</label></div>
              <div class="col-4">
               <select class="form-control form-control-sm" id="vrole" name="vrole">
            <?php include "./php/getRolesAsOptions.php" ?>
          </select>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-2"><label class="control-label">Numar telefon</label></div>
              <div class="col-4">
                <input type="text" name="vphone" id="vphone" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
              <div class="col-2"><label class="control-label">Email</label></div>
              <div class="col-4">
                <input type="text" name="vemail" id="vemail" class="form-control form-control-sm" value=""  autocomplete="off" />
              </div>
            </div>
            <div class="row mt-2 mb-4">
              <div class="col-2"><label class="control-label">Domiciliu</label></div>
              <div class="col-4">
                <input type="text" name="vaddress" id="vaddress" class="form-control form-control-sm" value=""  autocomplete="off" />
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
    //validation
    (function() {
      'use strict';
      window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation4');
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