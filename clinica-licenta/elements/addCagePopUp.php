<form action="php/insertCage.php" method="POST" class="needs-validationcage" novalidate>
  <div class="modal fade" id="addCage" role="dialog">
    <div class="modal-dialog modal-m">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cusca noua</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row mt-3">
              <div class="col-4"><label class="control-label">Denumire</label></div>
              <div class="col-8">
                <input type="text" name="cagename" id="cagename" class="form-control form-control-sm" value=""  autocomplete="off" required />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col text-left ml-0">
            <button type="button" class="btn btn-sm btn-outline-danger text-left" data-dismiss="modal">Inchide</button>
          </div>
          <div class="col text-right mr-0">
            <button type="submit" class="btn btn-sm btn-outline-primary">Salveaza</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  //validation
  (function() {
    'use strict';
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validationcage');
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