<?php
ini_set('display_errors', 'Off');
//ini_set('display_errors', 'On');
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

    <body id="home">
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>
		<div class="bg-img bg-img-hauto p-sm-5">
			<main class="container">
				
				<div class="row">
					<div class="col-lg-12 mt-5 pb-5 text-center">
						<h4>CST - DiathesisLab | Universit&agrave; degli studi di Bergamo</h4>
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
				<hr class="primary"/>
				<section>
					<div class="container">
						<div class="row pb-1">
							<div class="col-lg-12 text-center">
								<h3 class="titoloevidenziato">Per ben progettare il futuro della città è necessario conoscere il suo passato e il suo presente! </h3>
								<h4>Inizia con questo filmato per capire l’evoluzione di Città Alta nell’ultimo secolo e il suo attuale dinamismo.</h4>
							</div>
						</div>
						
						<div class="row">
							<video autoplay muted loop id='my-video' class='video-js' controls preload='auto' width='100%' height='100%' poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
								<source src='https://www.dropbox.com/s/m144y093my9jt82/Citt%C3%A0AltaPlurale.mp4?dl=1' type='video/mp4'>
								<p class='vjs-no-js'>
								Per visualizzare correttamente questo video, &egrave; necessario abilitare JavaScript, e aggiornare il browser ad una versione pi&ugrave; recente che 
								<a href='https://videojs.com/html5-video-support/' target='_blank'>supporti HTML5 video</a>
								</p>
							</video>						
						</div>
					</div>
				</section>


				<section class="py-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<button type="button" class="btn btn-secondary btn-lg mt-3 mb-5" ><a href="partecipa.php">PARTECIPA!</a></button>
								<hr class="primary">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="text-align: center;">
								<h3 class="section-heading">Enti Promotori</h2>
								
							</div>
							<div class="col-sm-6" style="text-align: center;">
								<div class="service-box">
									<a href="https://www.unibg.it/" target="_blank"><img src="img/logoUnibg.svg" height="107" ></a>
									<h3></h3>
									<!--<h3>Università degli studi di Bergamo</h3>-->
								</div>
							</div>
							<div class="col-sm-6" style="text-align: center;">
								<div class="service-box">
									<a href="https://www.comune.bergamo.it/" target="_blank"><img src="img/logo_comune_bg_quadrata.jpg" height="107" width="107"></a>
									<h3></h3>
									<!--<h3>Comune di Bergamo</h3>-->
								</div>
							</div>
						</div>
					</div>
				</section>
		</main>
	</div>
    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>
	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>

    </body>

</html>
