<div class="row form-group align-items-center mt-5 mb-3">
  <div class="col">
    <h4 class="m-0 p-0">Interventii medicale</h4>
  </div>
  <div class="col text-right">
    <button id="adaugaInterventie" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddIntervention"><span>Adauga </span><i class="fa fa-plus"></i></button>
  </div>
</div>
<div class="row form-group align-items-center">
  <table class="table table-hover ml-2 mr-2">
    <thead>
      <tr class="thead-dark">
        <th>Id</th>
        <th>Data interventie</th>
        <th>Tip interventie</th>
        <th>Medic</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php include "./php/getInterventions.php" ?>
    </tbody>
  </table>
</div>