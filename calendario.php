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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="CST - DiathesisLab">
        <title>Citt&agrave; Alta Plurale | Calendario</title>
    <!-- Links -->
	<?php require_once('inc/links.inc'); ?>
    </head>

    <body>
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>
    
    
    <!--     *********   TODO   **********     -->
	<div class=" bg-img-hauto p-sm-5">
		
		<main class="container">
			<div class="row">
				<div class="col-12  text-center mt-5">
					<h1 class="section-heading mt-0 mb-3">Calendario eventi</h1>
					<h3>segui gli eventi organizzati per voi</h3>
				</div>
				<hr class="primary">
				  <div class="col-lg-12 text-center" id="calendario">
					  <iframe src="https://calendar.google.com/calendar/embed?src=e8bh5usiul2eu2r75e41qmbtos%40group.calendar.google.com&ctz=Europe%2FRome" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
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
