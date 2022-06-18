<div class="row scroll-box-container">
  <div class="col px-0 scroll-box pt-3">
    <div class="container-fluid">
      <h4 class="mb-3 mt-1">Informații proprietar</h4>
      <div class="row form-group align-items-center">
        <div class="col-1"><label class="control-label">Nume</label></div>
        <div class="col-3">
          <input type="text" name="lastname" class="form-control form-control-sm" value="" id="lastname"  autocomplete="off" required/>
        </div>
        <div class="col-1"><label class="control-label">Prenume</label></div>
        <div class="col-3">
          <input type="text" name="firstname" class="form-control form-control-sm" id="firstname"  autocomplete="off" required/>
        </div>
        <div class="col-1"><label class="control-label">C.I.</label></div>
        <div class="col-3">
          <input type="text" name="ci" class="form-control form-control-sm" id="ci"  autocomplete="off" required/>
        </div>
      </div>
      <div class="row form-group align-items-center">
        <div class="col-1"><label class="control-label">Județ</label></div>
        <div class="col-3">
          <input type="text" name="county" class="form-control form-control-sm" id="county" autocomplete="off" required/>
        </div>
        <div class="col-1"><label class="control-label">Adresă</label></div>
        <div class="col-7">
          <div class="input-group input-group-sm">
            <input type="text" name="adress" class="form-control form-control-sm" id="adress" autocomplete="off" required/>
            <div class="input-group-append"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
          </div>
        </div>
      </div>
      <div class="row form-group align-items-center">
        <div class="col-1"><label class="control-label">Nr. telefon</label></div>
        <div class="col-3">
          <div class="input-group input-group-sm">
            <input type="text" name="phone" class="form-control form-control-sm" id="phone" autocomplete="off" required/>
            <div class="input-group-append"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
          </div>
        </div>
        <div class="col-1"><label class="control-label">Email &midast;</label></div>
        <div class="col-3">
          <div class="input-group input-group-sm date">
            <input type="text" name="email" class="form-control form-control-sm" id="email" autocomplete="off"/>
            <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
          </div>
        </div>
        <div class="col-1"><label class="control-label">Dată înregistrare</label></div>
        <div class="col-3">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control form-control-sm" name="date1" id="entryDate" autocomplete="off" required/>
            <div class="input-group-append" name="btn_date_1"><span class="input-group-text "><i class="fa fa-calendar"></i></span></div>
          </div>
        </div>
      </div>
      <h4 class="mt-5 mb-3">Informații pacient</h4>
      <div class="row form-group align-items-center">
        <div class="col-1"><label class="control-label">Nume</label></div>
        <div class="col-3">
          <input type="text" name="patientName" class="form-control form-control-sm" id="patientName" autocomplete="off" required/>
        </div>
        <div class="col-1"><label class="control-label">Specie</label></div>
        <div class="col-3">
          <input type="text" name="species" class="form-control form-control-sm" id="species" autocomplete="off" required/>
        </div>
        <div class="col-1"><label class="control-label">Rasă &midast;</label></div>
        <div class="col-3">
          <input type="text" name="breed" class="form-control form-control-sm" id="breed" autocomplete="off"/>
        </div>
      </div>
      <div class="row form-group align-items-center">
        <div class="col-1"><label class="control-label">Data nașterii</label></div>
        <div class="col-3">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control form-control-sm" name="date2" id="birthDate" autocomplete="off" required/>
            <div class="input-group-append" name="btn_date_2"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
          </div>
        </div>
        <div class="col-1"><label class="control-label">Boli cronice &midast;</label></div>
        <div class="col-3">
          <input type="text" class="form-control form-control-sm" name="chronic" id="chronic" autocomplete="off" />
        </div>
        <div class="col-1"><label class="control-label">Alte afecțiuni &midast;</label></div>
        <div class="col-3">
          <input type="text" class="form-control form-control-sm" name="conditions" id="conditions" autocomplete="off"/>
        </div>
      </div>
      <div class="row form-group align-items-center">
        <div class="col-1"><label class="control-label">Observatii &midast;</label></div>
        <div class="col-4">
          <textarea class="form-control" rows="6" name="comments" id="comments" autocomplete="off"></textarea>
        </div>
        <div class="col-7 mt-4">
          <table class="table">
            <thead>
              <tr>
                <th class="col-2">Vaccin</th>
                <th class="col-3">Deparazitare externa</th>
                <th class="col-3">Deparazitare interna</th>
                <th class="col-3">Sterilizat</th>
                <th class="col-1">Sex</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Da" data-off="Nu" name="vaccine" id="vaccine"/></td>
                <td><input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Da" data-off="Nu" name="extDeworm" id="extDeworm"/></td>
                <td><input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Da" data-off="Nu" name="intDeworm" id="intDeworm"/></td>
                <td><input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Da" data-off="Nu" name="neutred" id="neutred"/></td>
                <td><input type="checkbox" data-toggle="toggle" data-onstyle="outline-primary" data-offstyle="outline-success" data-on="M" data-off="F" name="sex" id="sex"/></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  //datepicker
  $(document).ready(function(){
    var date_input1=$('input[name="date1"]');
    var date_input2=$('input[name="date2"]');
    var options={
      format: 'yyyy/mm/dd',
      todayHighlight: true,
      autoclose: true,
      orientation: 'bottom',
    };

    date_input1.datepicker(options);
    date_input2.datepicker(options);

    //date_input1.datepicker("setDate", new Date())

    $('div[name="btn_date_1"]').click(function(){
      date_input1.datepicker('show');
    });

    $('div[name="btn_date_2"]').click(function(){
      date_input2.datepicker('show');
    });
  });
</script>
