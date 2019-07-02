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
        <meta name="description" content="Processo partecipativo Tripla elica per la revisione del Piano Particolareggiato di Citt&agrave; Alta e Borgo Canale (PPRCA)">
        <meta name="author" content="CST - DiathesisLab">
        <title>Città Alta Plurale | Il Progetto</title>
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
			  <div class="row">
				<div class="col-12 text-center mt-5">
					<h4>Città Alta Plurale</h4>
					<h1 class="section-heading mt-0 mb-3">Il Progetto</h1>
					<h3>Processo partecipativo Tripla elica per la revisione del Piano Particolareggiato di Città Alta e Borgo Canale (PPRCA)</h3>
				</div>
				<div class="col-12 text-center mt-5">
					<hr class="primary">
					<p>Un processo molto importante per Città Alta che mira ad ottenere un ampio coinvolgimento degli abitanti per creare le basi per la revisione del Piano Particolareggiato per Città Alta e Borgo Canale (PPRCA): un percorso che il Comune e l’Università di Bergamo intraprendono insieme, con il coordinamento scientifico del Centro Studi sul Territorio diretto dalla Prof. Emanuela Casti.</p>
					<p>Il Comune ha incaricato il team di ricerca del CST nella creazione di un <strong>processo partecipativo</strong> con lo scopo di sottoporre agli abitanti intesi come residenti e city-users (pendolari, commercianti, studenti, visitatori e turisti) una <strong>revisione del Piano Particolareggiato di Città Alta</strong> volto a dare una risposta ai loro bisogni e al contempo promuovere una valorizzazione delle potenzialità territoriali del centro storico visto come polo di una città reticolare e multicentrica.</p>
					<p>Il processo partecipativo richiama un modello di sviluppo denominato <strong>“Tripla Elica”</strong> – basato sull’interazione tra Università, Pubblica Amministrazione e Settore privato – che, sperimentato in molte città italiane, come Pisa, ed europee, come Oxford e Leuven, e incardinato sulla presenza dell’Università nel tessuto storico, ha dato ottimi risultati non solo per far fronte alla banalizzazione del turismo ma anche, e soprattutto, per determinare il dinamismo sociale e culturale in grado di tener vivo il senso di urbanità e di appartenenza ai luoghi richieste dai residenti.</p>
					<div class="titoloevidenziato my-5"><h3>Esprimi anche tu la tua opinione, per noi è importante!</h3>
					<button type="button" class="btn btn-secondary btn-lg" ><a href="partecipa.php">Partecipa e aiutaci a migliorare la nostra Citt&agrave; Alta</a></button>
					</div>
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
