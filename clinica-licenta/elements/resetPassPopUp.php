<form id="formreset" name="formreset">
  <div class="modal fade" id="resetModal" role="dialog">
    <div class="modal-dialog modal-xl">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Resetare parola</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <input type="text" id="resetId" style="display: none;" />
              <div class="col-2"><label class="control-label">Parola noua</label></div>
              <div class="col-4"><input type="password" name="repas1" id="repas1" class="form-control form-control-sm"/></div>
              <div class="col-2"><label class="control-label">Confirma parola</label></div>
              <div class="col-4"><input type="password" name="repas2" id="repas2" class="form-control form-control-sm"/></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Inchide</button>
          <button type="button" name="confirmpass" class="btn btn-outline-success">Schimba parola</button>
        </div>
      </div>

    </div>
  </div>
</form>
