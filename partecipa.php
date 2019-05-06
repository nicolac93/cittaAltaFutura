<?php
//ini_set('display_errors', 'Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Partecipa</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/cittaAltaFutura.css" rel="stylesheet">

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">Città Alta Plurale</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="partecipa.php">Partecipa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.html">Il Progetto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Statistiche</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="faq.html">Calendario</a>
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

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Città Alta Plurale
        <small>inchiesta partecipativa</small>
      </h1>
      <!--
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Città Alta Futura</li>
      </ol>
      -->
      <!--div class="btn-group btn-group-toggle" data-toggle="buttons" id="radio-riepilogo-toggle">
        <label class="btn btn-secondary active">
          <input type="radio" name="options" value="map" id="optionMap" autocomplete="off" checked> <i class='fa fa-map'></i>
        </label>
        <label class="btn btn-secondary">
          <input type="radio" name="options" value="list" id="optionList" autocomplete="off"> <i class='fa fa-th'></i>
        </label>
        <label class="btn btn-secondary">
          <input type="radio" name="options" value="table" id="optionTable" autocomplete="off"> <i class='fa fa-list'></i>
        </label>
      </div> -->
      <br>
      <br>
      <div class="row" id="tematica">
          <div class="col-sm">
            <button type="button" class="btn btn-secondary btn-lg btn-block" value="accessibilita" id="buttonAccessibilita"><i class='fas fa-bicycle'></i> Accessibilità</button>
          </div>
          <div class="col-sm">
            <button type="button" class="btn btn-secondary btn-lg btn-block" value="costruito" id="buttonCostruito"><i class='fas fa-building'></i> Funzioni del costruito</button>
          </div>
          <div class="col-sm">
            <button type="button" class="btn btn-secondary btn-lg btn-block" value="spaziInutilizzati" id="buttonSpaziInutilizzati"><i class='far fa-building'></i> Spazi inutilizzati</button>
          </div>
          <div class="col-sm">
            <button type="button" class="btn btn-secondary btn-lg btn-block" value="cittaAltaPlurale" id="buttonCittaAltaFutura"><i class='fa fa-list'></i> Città Alta plurale</button>
          </div>
      </div>

      <br>

      <!--
      <div class="row">
        <div id="selector" class="btn-group">
          <button type="button" class="btn btn-secondary active" value="map"><i class='fa fa-map'></i> Mappa</button>
          <button type="button" class="btn btn-secondary" value="list"><i class='fa fa-th'></i> Riepilogo Lista</button>
          <button type="button" class="btn btn-secondary" value="table"><i class='fa fa-list'></i> Riepilogo tabella</button>
        </div>
      </div>
      -->
      <!-- Map segnalazioni -->   
      <div id="map-riepilogo">
        <div id="menuLayer" class="dropdown" >
          <button class="btn btn-circle dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='fas fa-layer-group'></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" id='basic-v9' onclick="switchLayer('basic')">base</a>
              <a class="dropdown-item" id='streets-v9' onclick="switchLayer('streets')">streets</a>
              <a class="dropdown-item" id='light-v9' onclick="switchLayer('light')">light</a>
              <a class="dropdown-item" id='dark-v9'onclick="switchLayer('dark')">dark</a>
              <a class="dropdown-item" id='outdoors-v9' onclick="switchLayer('outdoors')"> outdoors</a>
              <a class="dropdown-item" id='satellite-v9' onclick="switchLayer('satellite')">satellite</a>
          </div>
        </div>

        <div class=map-overlay id="leggend"></div>

        <div id='map'></div>
        <pre id='coordinates' class='coordinates'></pre>
      </div>
      <!-- End of Map segnalazioni -->  
      
      <!-- Table riepilogo -->
      <div class="table-responsive" id="table-riepilogo">
      <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">Immagine</th>
            <th scope="col">Titolo</th>
            <th scope="col">Tipologia</th>
            <th scope="col">Proposta</th>
            <th scope="col">Motivazione</th>
            <th scope="col">Destinatari</th>
            <th scope="col">Periodo</th>
            <th scope="col">Stato di conservazione</th>
            <!--<th scope="col">Autore</th>-->
            <th scope="col">Numero voti</th>
            <th scope="col">Vota!</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $sql = "SELECT *, segnalazioni.id as idSegnalazione FROM segnalazioni JOIN utenti ON segnalazioni.id_utente = utenti.id";
          
            if (mysqli_query($conn, $sql)) {
              echo "";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
              $count=1;
              $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td ><img class="card-img-top" src=img/<?php echo $row['immagine']?> alt=""></td>
                  <td><a href=<?php echo 'segnalazione.php?id='.$row['idSegnalazione']?>><?php echo $row['titolo']?></a></td>
                  <td><?php echo $row['tipologia']?></td>
                  <td><?php echo $row['proposta']?></td>
                  <td><?php echo $row['motivazione']?></td>
                  <td><?php echo $row['destinatari']?></td>
                  <td><?php echo $row['periodo']?></td>
                  <td><?php echo $row['conservazione']?></td>
                  <!--<td><?php //echo $row['username']?></td>-->
                  <td>??</td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Vota!</button></td>
                </tr>                

                
                <?php
                $count++;
              }
            } else {
              echo "0 results";
            }
            ?>
        </tbody>
      </table>
      </div>
      <!-- end table riepilogo -->


      <!-- Porfoglio -->
      <div class="row" id="portfoglio-riepilogo">
      <?php
        $count=1;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      ?>


      
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src=img/<?php echo $row['immagine']?> alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
              <a href=<?php echo 'segnalazione.php?id='.$row['idSegnalazione']?>><?php echo $row['titolo']?></a>
              </h4>
              <p class="card-text"><strong>Destinatari: </strong><?php echo $row['destinatari']?></p>
              <p class="card-text"><strong>Proposta: </strong><?php echo $row['proposta']?></p>
            </div>
          </div>
        </div>
      

      <?php
          $count++;
        }
      } else {
        echo "0 results";
      }
      ?>
      </div>
      <!-- End Portfoglio -->
      
      <!-- Questionario -->
      <div class="jumbotron" >
        <div id="questionario"></div>
      </div>
      <!-- Fine questionario -->
      


      
    </div>
    <!-- /.container -->

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
              <p class="m-0 text-center text-white">Copyright &copy; Università degli Studi di Bergamo 2019</p>
          </div>
        </div>
      </div>
    </footer>


    <!-- dialog -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
</div>



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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Me Js -->
    <script src="js/riepilogo.js"></script>
    <script src="map.js"></script>
  </body>

</html>
