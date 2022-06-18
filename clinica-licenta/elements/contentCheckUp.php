<div class="row form-group align-items-center mt-5 mb-3">
  <div class="col">
    <h4 class="m-0 p-0">Controale medicale</h4>
  </div>
  <div class="col text-right">
    <button id="adaugaControl" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddCheckUp"><span>Adauga </span><i class="fa fa-plus"></i></button>
  </div>
</div>
<div class="row form-group align-items-center">
  <table class="table table-hover ml-2 mr-2">
    <thead>
      <tr class="thead-dark">
        <th>Id</th>
        <th style="min-width: 120px">Data control</th>
        <th style="min-width: 165px">Urmatoarea vizita</th>
        <th>Observatii</th>
        <th style="min-width: 110px"></th>
      </tr>
    </thead>
    <tbody>
        <?php include "./php/getCheckUp.php" ?>
    </tbody>
  </table>
</div>