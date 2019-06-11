<?php
//ini_set('display_errors', 'Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('session.php');
?>
<!DOCTYPE html>
<html lang="it">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home</title>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">
        <link href="css/cittaAltaPlurale.css" rel="stylesheet">
    </head>

    <body>
    <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="partecipa.php">Partecipa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="progetto.php">Il Progetto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="stats.php">Statistiche</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calendario.php">Calendario</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="team.php">Team</a>
                </li>
                <li class="nav-item" id="login">
                  <a class="nav-link" href="login.php"> Login</a>
                </li>
                <li class="nav-item" id="logout">
                  <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
                <li class="nav-item" id="user">
                  <span class="nav-link"><strong><?php echo $_SESSION['login_user_name'];?></strong></span>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    
    
    <!--     *********   TODO   **********     -->
    <div class="container">
        <h1 class="mt-4 mb-3">Il Team</h1>
        <hr class="primary">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-12 text-center">
                <!--<h2 class="page-header">Il Team</h2>-->
                <img class="rounded-circle img-responsive img-center" src="img/casti.jpg" alt="">
                <h3>Emanuela Casti
                    <br>
                    <small>Coordinatore scientifico</small>
                </h3>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <!-- <h2 class="page-header">Il Team</h2>-->
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/fulvio.jpg" alt="">
                <h3>Fulvio Adobati<br>
                    <small>Rapporti istituzionali</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/federica.jpg" alt="">
                <h3>Federica Burini<br>
                    <small>Processi partecipativi</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/alessandra.jpg" alt="">
                <h3>Alessandra Ghisalberti<br>
                    <small>Rigenerazione Urbana</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/renato.jpg" alt="">
                <h3>Renato Ferlinghetti<br>
                    <small>Storia della città</small>
                </h3>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/alketa.jpg" alt="">
                <h3>Alketa Aliaj<br>
                    <small>Comunicazione e social media</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/daniele.jpg" alt="">
                <h3>Daniele Mezzapelle<br>
                    <small>Data analysis e mapping</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/elisa.jpg" alt="">
                <h3>Elisa Consolandi<br>
                    <small>Raccolta dati e mapping</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/marta.jpg" alt="">
                <h3>Marta Rodeschini<br>
                    <small>Indagine di terreno e processo partecipativo</small>
                </h3>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/federico.jpg" alt="">
                <h3>Federico Carrara<br>
                    <small>Big Data analysis</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/andrea.jpg" alt="">
                <h3>Andrea Azzini<br>
                    <small>Elaborazione GIS</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/nicola.jpg" alt="">
                <h3>Nicola Cortesi<br>
                    <small>Web developer e web designer</small>
                </h3>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/kevin.jpg" alt="">
                <h3>Kevin Gotti<br>
                    <small>Web developer e web designer</small>
                </h3>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/elena.jpg" alt="">
                <h3>Elena Vittoria - Plat1<br>
                    <small>Video maker e web designer</small>
                </h3>
            </div>
            <div class="col-lg-6 col-sm-6 text-center">
                <img class="rounded-circle img-responsive img-center" src="img/maria.jpg" alt="">
                <h3>Maria Grazia Cammarota<br>
                    <small>Revisione testi</small>
                </h3>
            </div>
        </div>



    </div>


    
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 text-center">
              <img src="img/LogoDiathesis.jpg" height="112">
              <br>
              <br>
              <p class="m-0 text-center text-white"><strong>CST - DiathesisLab</strong>
                  <br>Via Salvecchio 19,  24129 Bergamo</p>
              <ul class="list-unstyled">
                  <li><i class="fa fa-envelope-o fa-fw"></i> <a href="https://www.unibg.it/ricerca/strutture-ricerca/centri-ateneo/cst/diathesis-lab">http://www.unibg.it/diathesis</a>
                  </li>
                  <li>
                      <i class="fa fa-envelope-o fa-fw"></i><a href="">diathesis@unibg.it</a>
                  </li>
              </ul>
              <hr class="small">
              <ul class="list-inline">
                  <li>
                      <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                  </li>
              </ul>
              <p class="m-0 text-center text-white">Copyright &copy; Università degli Studi di Bergamo 2020</p>
          </div>
        </div>
      </div>
    </footer>

        
        <script>
            var login = document.getElementById("login");
            var logout = document.getElementById("logout");
            var user = document.getElementById("user");
            if("<?php echo $_SESSION['login_user_name'];?>" == ""){
                login.style.display = "inline-block";
                logout.style.display = "none";
                user.style.display = "none";
            }else{
                login.style.display = "none";
                logout.style.display = "inline-block";
                user.style.display = "inline-block";
            }
        </script>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
