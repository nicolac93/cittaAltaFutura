<?php
//ini_set('display_errors', 'Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include("session.php");
?>

<!DOCTYPE html>
<html lang="it">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Processo partecipativo Tripla elica per la revisione del Piano Particolareggiato di Città Alta e Borgo Canale (PPRCA)">
        <meta name="author" content="CST - DiathesisLab">
        <title>Citt&agrave; Alta Plurale | Partecipa</title>

    <!-- Custom styles for this template -->
    <link href="css/cittaAltaFutura.css" rel="stylesheet">
	<?php require_once('inc/links.inc'); ?>

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
  </head>

  <body>

    <!-- Navigation -->
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>

    <!-- Page Content -->
    <div class="container">



		<div class="text-center mt-5">
			<h4>Città Alta Plurale</h4>
			<h1 class="section-heading mt-0 mb-5">inchiesta partecipativa</h1>
		</div>
		
		<div class="row text-center">
			<p>
			Qua ci metterei una breve introduzione tipo:
			Osserva la mappa sottostante sullla situazione attuale di Città Alta e rispondi al questionario inserendo i tuoi consigli
			</p>
		
		</div>
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
      <div class="row" id="tematica">
          <div class="col-sm">
            <button type="button" class="btn btn-primary btn-lg btn-block" value="accessibilita" id="buttonAccessibilita"><i class='fa fa-bicycle fa-2x'></i>ACCESSIBILITA'</button>
          </div>
          <div class="col-sm">
            <button type="button" class="btn btn-primary btn-lg btn-block" value="costruito" id="buttonCostruito"><i class='fa fa-building fa-2x'></i>FUNZIONI DEGLI EDIFICI</button>
          </div>
          <div class="col-sm">
            <button type="button" class="btn btn-primary btn-lg btn-block" value="spaziInutilizzati" id="buttonSpaziInutilizzati"><i class='fa fa-house-damage fa-2x'></i>EDIFICI DA RIQUALIFICARE</button>
          </div>
          <div class="col-sm">
            <button type="button" class="btn btn-primary btn-lg btn-block" value="fattoriDinamizzanti" id="buttonFattoriDinamizzanti"><i class='fas fa-sync fa-2x'></i>FATTORI DINAMIZZANTI</button>
          </div>
          <div class="col-sm-12">
            <button type="button" class="btn btn-primary btn-lg btn-block" value="cittaAltaPlurale" id="buttonCittaAltaFutura"><i class='fa fa-users fa-2x'></i>COMPLETA LA MAPPA</button>
          </div>
      </div>

		<div class="row text-center">
			<h3 class="m-auto map-intro"></h3>
			<p class="map-intro-text">Qua ci va invece il testo relativo alla tematica selezionata:
			Il testo di questo div va modificato tramite javascript, al click del bottone qua sopra.</p>
		
		</div>

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

        <div id="leggend"></div>

        <div id='map'></div>
        <pre id='coordinates' class='coordinates'></pre>
      </div>
      <!-- End of Map segnalazioni -->  
      
      <!-- Video Fattori Dinamizzanti -->

      <div class="row" id="videoFattoriDinamizzanti">
          <video autoplay muted loop style="height:100%;width:100%;opacity:1;">
              <source src="img/BergamoPublicSpace_corto.mp4" type="video/mp4">
          </video>
      </div>

      <!-- Fine Video Fattori Dinamizzanti -->

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
      
      <!-- Questionario <div id="questionario"></div> -->
      <!-- <div class="jumbotron" > -->
        
      
      <!-- Fine questionario -->

      <!-- tabs -->
      <div class="col-12 text-center"><h3 class="section-heading">Esprimi la tua opinione</h3></div>
      
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-accessiblita-tab" data-toggle="tab" href="#nav-accessiblita" role="tab" aria-controls="nav-accessiblita" aria-selected="true"><i class='fas fa-bicycle'></i> Accessibilità</a>
            <a class="nav-item nav-link" id="nav-funzioniCostruito-tab" data-toggle="tab" href="#nav-funzioniCostruito" role="tab" aria-controls="nav-funzioniCostruito" aria-selected="false"><i class='fas fa-building'></i> Funzioni degli edifici</a>
            <a class="nav-item nav-link" id="nav-spaziInutilizzati-tab" data-toggle="tab" href="#nav-spaziInutilizzati" role="tab" aria-controls="nav-spaziInutilizzati" aria-selected="false"><i class='far fa-building'></i> Edifici da riqualificare</a>
            <a class="nav-item nav-link" id="nav-fattoriDinamizzanti-tab" data-toggle="tab" href="#nav-fattoriDinamizzanti" role="tab" aria-controls="nav-fattoriDinamizzanti" aria-selected="false"><i class='fas fa-sync'></i> Fattori dinamizzandi</a>
            <a class="nav-item nav-link" id="nav-cittaAltaFutura-tab" data-toggle="tab" href="#nav-cittaAltaFutura" role="tab" aria-controls="nav-cittaAltaFutura" aria-selected="false"><i class='fa fa-list'></i> Inchiesta partecipativa</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-accessiblita" role="tabpanel" aria-labelledby="nav-accessiblita-tab"><div class="jumbotron" ><div id="navSurveyAccessibilita"></div></div></div>
          <div class="tab-pane fade" id="nav-funzioniCostruito" role="tabpanel" aria-labelledby="nav-funzioniCostruito-tab"><div class="jumbotron" ><div id="navSurveyFunzioniCostruito"></div></div></div>
          <div class="tab-pane fade" id="nav-spaziInutilizzati" role="tabpanel" aria-labelledby="nav-spaziInutilizzati-tab"><div class="jumbotron" ><div id="navSurveySpaziInutilizzati"></div></div></div>
          <div class="tab-pane fade" id="nav-fattoriDinamizzanti" role="tabpanel" aria-labelledby="nav-fattoriDinamizzanti-tab"><div class="jumbotron" ><div id="navSurveyFattoriDinamizzanti"></div></div></div>
          <div class="tab-pane fade" id="nav-cittaAltaFutura" role="tabpanel" aria-labelledby="nav-cittaAltaFutura-tab"><div class="jumbotron" ><div id="navSurveyCittaAltaFutura"></div></div></div>
        </div>
      </div>
      <!-- fine tabs -->
      


      
    <!-- </div> -->
    <!-- /.container -->

    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>


    <!-- dialog -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Descrivi la tua proposta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label>Tipologia Proposta</label>
              <select class="form-control" title="Scegli una tipologia" id="selectTipologiaSegnalazione">
                <option value="1">Accessibilità</option>
                <option value="2">Funzione delgi edifici</option>
                <option value="3">Edifici da riqulificare</option>
                <option value="4">Fattori dinamizzanti</option>
                <option value="5">Città alta per tutti</option>
              </select>
            </div>

            <div id="panelTipologiaSegnalazione"></div>
          
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
          <button type="button" class="btn btn-primary" id="buttonProposta">Invia proposta</button>
          </div>
      </div>
  </div>     

</div>

	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Me Js -->
    <script src="js/riepilogo.js"></script>
    <script src="map.js"></script>
  </body>

</html>
