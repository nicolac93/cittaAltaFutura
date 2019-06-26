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
        <title>Citt&agrave; Alta Plurale | Calendario</title>
    <!-- Links -->
	<?php require_once('inc/links.inc'); ?>
    </head>

    <body>
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>
    
    
    <!--     *********   TODO   **********     -->
    
    <div class="container">
        <div class="text-center mt-5">
            <h4>Città Alta Plurale</h4>
            <h1 class="section-heading mt-0 mb-3">Calendario eventi</h1>
            <h3>segui gli eventi organizzati per voi</h3>
        </div>
      <hr class="primary">
      <div class="row">
          <div class="col-lg-12 text-center" id="calendario">
              <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=studenti.unibg.it_q038g6v3p2pvo8j00gbhaab348%40group.calendar.google.com&amp;color=%23AB8B00" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
          </div>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div>

<style>
#calendario {
position: relative;
padding-bottom: 56.25%;
padding-top: 30px;
height: 0;
overflow: hidden;
}

#calendario iframe,
#calendario object,
#calendario embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}


</style>
    
    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>
	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>

    </body>

</html>
