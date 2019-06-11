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
            <img src="img/logo.png" style="height:2%;width:2%;opacity:1;margin:2px">
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
    <!--
        <header>
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" style="background-color:black;">
                    <video autoplay muted loop style="height:100%;width:100%;opacity:0.6;">
                        <source src="img/BergamoPublicSpace_corto.mp4" type="video/mp4">
                    </video>
                    <div class="centered_btn">
                        <a href="survey.html" class="btn_partecipa">Partecipa!</a>
                    </div>
                  </div>
                </div>
            </div>
-->    
        </header>

        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <h1 class="section-heading">Città Alta Plurale</h1>
                    <h3>Processo partecipativo Tripla elica per la revisione del Piano Particolareggiato di Città Alta e Borgo Canale (PPRCA)</h3>
                    <hr class="primary">
                </div>
            </div>

        
            <div class="row">
                <div class="col-sm">
                    <video autoplay muted loop style="height:100%;width:100%;opacity:1;">
                        <source src="video/Wifi HeatMap_FestiviFebbraio.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-sm"  style="text-align:center;">
                   <img src="img/logo.png" style="height:100%;width:50%;opacity:1;">
                </div>
                <div class="col-sm">
                    <video autoplay muted loop style="height:100%;width:100%;opacity:1;">
                        <source src="video/Wifi HeatMap_LavorativiFebbraio.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <hr class="primary">
            <section id="services" style="margin-top:8px;">
                <div class="container">
                    <div class="row">
                        <video autoplay muted loop style="height:100%;width:100%;opacity:1;">
                            <source src="img/BergamoPublicSpace_corto.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </section>


        <section id="services" style="margin-top:8px;">
            <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <hr class="primary">
                    <p> Ti consigliamo di iniziare con la visione di questo filmato che riassume l’evoluzione di Città Alta: compirai una sorta di viaggio che ti permetterà di comprendere la stratificazione e le modificazioni che la città ha subito articolandosi in modo reticolare.<br><br>
Per poter sognare un grande futuro per Città Alta, è fondamentale conoscere la sua storia e il suo dinamismo!
</p>

                <button type="button" class="btn btn-secondary btn-lg" ><a href="partecipa.php">Partecipa</a></button>

                </div>
            </div>
            <br>
            <br>
            
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <h2 class="section-heading">Enti Promotori</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6" style="text-align: center;">
                        <div class="service-box">
                            <a href="http://unibg.it"><img src="img/logoUnibg.svg" height="107" ></a>
                            <h3></h3>
                            <!--<h3>Università degli studi di Bergamo</h3>-->
                        </div>
                    </div>
                    <div class="col-sm-6" style="text-align: center;">
                        <div class="service-box">
                            <img src="img/logo_comune_bg_quadrata.jpg" height="107" width="107">
                            <h3></h3>
                            <!--<h3>Comune di Bergamo</h3>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
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
