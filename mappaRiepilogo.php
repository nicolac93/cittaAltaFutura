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
    <meta name="description" content="Processo partecipativo Tripla Elica per la revisione del Piano Particolareggiato di Citt&agrave; Alta e Borgo Canale (PPRCA)">
    <meta name="author" content="CST - DiathesisLab">
    <title>Città Alta Plurale | Mappa Riepilogo</title>
    <!-- Links -->
    <?php require_once('inc/links.inc'); ?>

    <link href="css/mapRiepilogo.css" rel="stylesheet">

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
</head>

<body>
<header>
    <?php require_once('inc/header.inc'); ?>
</header>
<div class=" bg-img-hauto p-sm-5">
    <!--     *********   TODO   **********     -->
    <main class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1 class="section-heading mt-0 mb-3">Mappa delle segnalazioni</h1>
            </div>
        </div>
        <div class="row">
            <hr class="primary">

            <!-- Map segnalazioni -->
            <div id='mapRiepilogo'></div>
            <!-- End of Map segnalazioni -->

        </div>

        <div class="col-12 text-center">

            <div class="titoloevidenziato my-5"><h3>Esprimi anche tu la tua opinione, per noi è importante!</h3>
                <button type="button" class="btn btn-secondary btn-lg" >
                    <?php
                    if($_SESSION['login_user_name'] == ""){
                        echo '<a href="login.php">Partecipa e aiutaci a migliorare la nostra Citt&agrave; Alta</a>';
                    }else{
                        echo '<a href="partecipa.php">Partecipa e aiutaci a migliorare la nostra Citt&agrave; Alta</a>';
                    }
                    ?>
                </button>
            </div>
        </div>




    </main>
</div>
    <!-- Footer -->
    <?php require_once('inc/footer.inc'); ?>
    <!-- Scripts -->
    <?php require_once('inc/footerscripts.inc'); ?>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Me Js -->
    <script src="js/riepilogo.js"></script>
    <script src="js/mapRiepilogo.js"></script>

</body>
</html>
