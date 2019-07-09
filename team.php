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
					<img class="rounded-circle img-responsive img-center" src="img/demi.jpg" alt="">
					<h3>Hideomi Koishi<br>
						<small>Web designer</small>
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
						<small>Video maker</small>
					</h3>
				</div>
				<div class="col-lg-6 col-sm-6 text-center">
					<img class="rounded-circle img-responsive img-center" src="img/maria.jpg" alt="">
					<h3>Maria Grazia Cammarota<br>
						<small>Revisione testi</small>
					</h3>
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
