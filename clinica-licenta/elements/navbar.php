<div class="headernav border-bottom" style="font-size: 18px;">
  <div class="menu-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="http://localhost/clinica-licenta/home.php"><img src="img/logo_white1000.png" style="width: 40px; height: 40px; transform: scale(1.7);"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false" style="color: #fff;">
              Fise pacient
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="http://localhost/clinica-licenta/listaFise.php?">Lista fise</a>
              <a class="dropdown-item" href="http://localhost/clinica-licenta/fisaNoua.php">Fisa noua</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/clinica-licenta/planificator.php" style="color: #fff;">Planificator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/clinica-licenta/adapost.php" style="color: #fff;">Adapost</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/clinica-licenta/animaleAdoptate.php" style="color: #fff;">Animale adoptate</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <div class="dropdown">
            <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
                if(isset($_SESSION["lastname"]) && isset($_SESSION['firstname']))
                  echo $_SESSION["lastname"].' '.$_SESSION['firstname'];
              ?>
              <i class="fa fa-user-circle"></i>
            </div>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="http://localhost/clinica-licenta/setari.php">Setari</a>
              <a class="dropdown-item" href="http://localhost/clinica-licenta/php/logout.php">Deconectare</a>
            </div>
          </div>
        </ul>
      </div>
    </nav>
  </div>
</div>