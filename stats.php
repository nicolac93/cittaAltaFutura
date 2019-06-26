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
        <title>Citt&agrave; Alta Plurale | Statistiche</title>
    <!-- Links -->
	<?php require_once('inc/links.inc'); ?>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    </head>

    <body>
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>
    
			<!--     *********   TODO   **********     -->
			<div class="container">
				<div class="text-center mt-5">
					<h4>Città Alta Plurale</h4>
					<h1 class="section-heading mt-0 mb-3">Statistiche</h1>
					<h3>le vostre opinioni</h3>
				</div>
			  <hr class="primary">
			</div>
			<div class="container">
				<div class="row statsContainer">
					<h3>1. Quali collegamenti ritieni utile rafforzare?</h3>
					<div class="col-12 py-4">
						<div class="col-sm-6 float-left">
							<canvas id="chart0" class="chart"></canvas>
						</div>
						<div class="col-sm-6 float-left">
							<div id="pie-legend0" class="pie-legend"></div>
						</div>
					</div>
				</div>
				
				<div class="row statsContainer">
					<h3>2. Pensi che la peculiarità di Città Alta, ovvero l’altimetria, sia una potenzialità?</h3>
					<div class="col-12 py-4">
						<div class="col-sm-6 float-left">
							<canvas id="chart1" class="chart"></canvas>
						</div>
						<div class="col-sm-6 float-left">
							<div id="pie-legend1" class="pie-legend"></div>
						</div>
					</div>
				</div>
				
				<div class="row statsContainer">
					<h3>3. Vorresti incentivare l’apertura di negozi di vicinato?</h3>
					<div class="col-12 py-4">
						<div class="col-sm-6 float-left">
							<canvas id="chart2" class="chart"></canvas>
						</div>
						<div class="col-sm-6 float-left">
							<div id="pie-legend2" class="pie-legend"></div>
						</div>
					</div>
				</div>
				
				<div class="row statsContainer">
					<h3>4. Pensi che le attività ricettive che si stanno diffondendo anche su iniziativa personale (es. Airbnb) siano una buona risposta a tale fenomeno?</h3>
					<div class="col-12 py-4">
						<div class="col-sm-6 float-left">
							<canvas id="chart3" class="chart"></canvas>
						</div>
						<div class="col-sm-6 float-left">
							<div id="pie-legend3" class="pie-legend"></div>
						</div>
					</div>
				</div>
				
				<div class="row statsContainer">
					<h3>5. Saresti d’accordo nel promuovere Città Alta come “Cittadella della Cultura”?</h3>
					<div class="col-12 py-4">
						<div class="col-sm-6 float-left">
							<canvas id="chart4" class="chart"></canvas>
						</div>
						<div class="col-sm-6 float-left">
							<div id="pie-legend4" class="pie-legend"></div>
						</div>
					</div>
				</div>
				
				<div class="row statsContainer">
					<h3>6. Quali servizi di base mancano in Città Alta?</h3>
				</div>
				
				<div class="row statsContainer">
					<h3>7. Incentivi alla funzione residenziale</h3>
				</div>
				
				<div class="row statsContainer">
					<h3>8. Pensi che sia una buona soluzione quella di rivitalizzare gli edifici dismessi o poco utilizzati di Città Alta mediante alloggi con prezzi calmierati rivolti alla popolazione universitaria così da estendere la sua presenza anche nella fascia serale e notturna?</h3>
				</div>
				
				<div class="row statsContainer">
					<h3>9. Quali strategie ritieni utili per porre freno alle derive banalizzanti del turismo?</h3>
				</div>
			</div>

<script>

window.addEventListener('load', 
  function() { 

	var ctx = document.getElementById("chart0").getContext("2d");
	var data = {
			datasets: [{
				data: [27, 20, 55],
				backgroundColor: ['rgba(256,0,0,1)','rgba(0,0,128,1)','rgba(255,255,0,1)']
			}],
			labels: [
				'la connessione con la stazione ferroviaria a sud-est',
				'la connessione con la zona dello Stadio a nord-est',
				'la connessione con il vecchio Ospedale a sud-ovest'
			]
	};
	
	var options = {
			responsive: true,
			legend: {
				display: false,
				legendCallback: function(chart) {
									var text = [];
									text.push('<ul class="' + chart.id + '-legend">');
									for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
										text.push('<li><span style="background-color:' + 
										chart.data.datasets[0].backgroundColor[i] + '" >');
										if (chart.data.labels[i]) {
											text.push(chart.data.labels[i]);
										}
										text.push('</span></li>');
									}
									text.push('</ul>');
									return text.join("");
								}

			},
			
		};

	var pieChart0 = new Chart(ctx, {
		type: 'pie',
		data: data,
		options: options
	});

	$("#pie-legend0").html(pieChart0.generateLegend());


  }, false);
	
	
</script>				

    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>

	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>
		
    </body>

</html>
