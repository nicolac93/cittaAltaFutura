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
        <meta name="author" content="CST - DiathesisLab">
        <title>Citt&agrave; Alta Plurale | Il Team</title>
    <!-- Links -->
	<?php require_once('inc/links.inc'); ?>
    </head>

    <body>
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>
		<div class=" bg-img-hauto p-sm-5">


		<!--     *********   TODO   **********     -->
		<main class="container">
			<div class="col-12 text-center pt-5">
				<h1 class="section-heading mt-0 mb-3">Il Team</h1>
				<h3>le persone che hanno collaborato al progetto</h3>
			</div>
			<hr class="primary">
			<br>
			<br><!--
			<div class="row">
				<div class="col-lg-12 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/casti.jpg" alt="">
					<h3>Emanuela Casti<br>
						<small>Coordinatore scientifico</small>
					</h3>
				</div>
			</div>-->
            <h3>Geografi e urbanisti</h3>
            <hr class="primary">
			<div class="row">
                <div class="col-lg-12 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/casti.jpg" alt="">
                    <h4>Emanuela Casti<br>
                        <!--<small>Coordinatore scientifico</small>-->
                    </h4>
                </div>
            </div>
            <div class="row">
				<div class="col-lg-3 col-sm-6 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/fulvio.jpg" alt="">
					<h4>Fulvio Adobati<br>
                        <!--<small>Rapporti istituzionali</small>-->
                    </h4>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/federica.jpg" alt="">
                    <h4>Federica Burini<br>
                        <!--<small>Processi partecipativi</small>-->
                    </h4>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/alessandra.jpg" alt="">
                    <h4>Alessandra Ghisalberti<br>
                        <!--<small>Rigenerazione Urbana</small>-->
                    </h4>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/renato.jpg" alt="">
                    <h4>Renato Ferlinghetti<br>
                        <!--<small>Storia della città</small>-->
                    </h4>
                </div>
            </div>
            <br>
            <h3>Programmatori e ingegneri informatici</h3>
            <hr class="primary">
            <div class="row">
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/federico.jpg" alt="">
                    <h4>Federico Carrara<br>
                        <!--<small>Big Data analysis</small>-->
					</h4>
				</div>
				<div class="col-lg-3 col-sm-6 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/demi.jpg" alt="">
					<h4>Hideomi Koishi<br>
						<!--<small>Web designer</small>-->
					</h4>
				</div>
				<div class="col-lg-3 col-sm-6 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/nicola.jpg" alt="">
					<h4>Nicola Cortesi<br>
						<!--<small>Web developer e web designer</small>-->
					</h4>
				</div>
				<div class="col-lg-3 col-sm-6 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/kevin.jpg" alt="">
					<h4>Kevin Gotti<br>
						<!--<small>Web developer e web designer</small>-->
					</h4>
				</div>
			</div>
			<br>
            <h3>Media e comunicazione</h3>
            <hr class="primary">
			<div class="row">
				<div class="col-lg-6 col-sm-6 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/elena.jpg" alt="">
					<h4>Elena Vittoria - Plat1<br>
						<!--<small>Video maker</small>-->
					</h4>
				</div>
				<div class="col-lg-6 col-sm-6 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/maria.jpg" alt="">
					<h4>Maria Grazia Cammarota<br>
						<!--<small>Revisione testi</small>-->
					</h4>
				</div>
			</div>
            <br>
            <h3>Collaboratori alla ricerca e dottorandi</h3>
            <hr class="primary">
            <div class="row">
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/alketa.jpg" alt="">
                    <h4>Alketa Aliaj<br>
                        <!--<small>Comunicazione e social media</small>-->
                    </h4>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/daniele.jpg" alt="">
                    <h4>Daniele Mezzapelle<br>
                        <!--<small>Data analysis e mapping</small>-->
                    </h4>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/elisa.jpg" alt="">
                    <h4>Elisa Consolandi<br>
                        <!--<small>Raccolta dati e mapping</small>-->
                    </h4>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <img class="rounded-circle img-responsive img-center" src="img/marta.jpg" alt="">
                    <h4>Marta Rodeschini<br>
                       <!-- <small>Indagine di terreno e processo partecipativo</small>-->
                    </h4>
                </div>
            </div>



		</main>
	</div>


    
    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>
	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>

       
    </body>

</html>
