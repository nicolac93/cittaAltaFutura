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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Processo partecipativo Tripla elica per la revisione del Piano Particolareggiato di Città Alta e Borgo Canale (PPRCA)">
        <meta name="author" content="">
        <title>Citt&agrave; Alta Plurale | Home</title>
    <!-- Links -->
	<?php require_once('inc/links.inc'); ?>
    </head>

    <body>
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>



		<main class="container">
			
            <div class="row">
                <div class="col-lg-12 mt-5 pb-5 text-center">
                    <h1 class="section-heading">Città Alta Plurale</h1>
                    <h3>Processo partecipativo Tripla elica per la revisione del Piano Particolareggiato di Città Alta e Borgo Canale (PPRCA)</h3>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 order-md-2 text-center ">
                   <img src="img/logo500.png" style="width:70%">
                </div>
                <div class="col-md-4 order-md-1 text-center pb-2 pt-3">
					<h5>Mobilit&agrave; mensile degli abitanti (febbraio 2019)</h5>
                    <video autoplay muted loop style="height:100%;width:100%;opacity:1;">
                        <source src="video/Wifi HeatMap_FestiviFebbraio.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-md-4 order-md-3 text-center  pb-2 pt-3">
					<h5>Mobilit&agrave; annuale degli abitanti (2018)</h5>
                    <video autoplay muted loop style="height:100%;width:100%;opacity:1;">
                        <source src="video/Wifi HeatMap_LavorativiFebbraio.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <section>
                <div class="container">
                    <div class="row">
                        <video autoplay muted loop style="height:100%;width:100%;opacity:1;">
                            <source src="img/BergamoPublicSpace_corto.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </section>


			<section class="py-3">
				<div class="row">
					<div class="col-lg-12 text-center">
						<p> Ti consigliamo di iniziare con la visione di questo filmato che riassume l’evoluzione di Città Alta: compirai una sorta di viaggio che ti permetterà di comprendere la stratificazione e le modificazioni che la città ha subito articolandosi in modo reticolare.</p>
						<h3 class="titoloevidenziato">Per poter sognare un grande futuro per Città Alta, è fondamentale conoscere la sua storia e il suo dinamismo!</h3>
						<button type="button" class="btn btn-secondary btn-lg mt-3 mb-5" ><a href="partecipa.php">Partecipa e aiutaci a migliorare la nostra Citt&agrave; Alta</a></button>
						<hr class="primary">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12" style="text-align: center;">
						<h3 class="section-heading">Enti Promotori</h2>
						
					</div>
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
			</section>
    </main>
    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>
	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>

    </body>

</html>
