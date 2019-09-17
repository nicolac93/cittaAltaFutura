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
        <title>Citt&agrave; Alta Plurale | Statistiche</title>
    <!-- Links -->
	<?php require_once('inc/links.inc'); ?>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    </head>

    <body>
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>
		<div class="bg-img bg-img-hauto p-sm-5">

			<!--     *********   TODO   **********     -->
			<main class="container">
				<div class="row">
					<div class="col-12 text-center mt-5">
						<h1 class="section-heading mt-0 mb-3">Statistiche</h1>
						<h3>le vostre opinioni</h3>
					</div>
					<hr class="primary">
					<div class="container">
						<div class="row statsContainer">
							<h3>1. Il Piano particolareggiato di Città Alta (PPRCA 2005-2015) proponeva tre linee di collegamento di Città Alta.
                                Quali collegamenti ritieni utile rafforzare?
                            </h3>
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
							<h3>2. Quali interventi ritieni utili rispetto alla mobilità privata?</h3>
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
							<h3>3. Pensi che le attività ricettive che si stanno diffondendo anche su iniziativa personale (es. Airbnb) potrebbero essere rivolte a:</h3>
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
							<div class="col-12 py-4">
                                <h3>4. Saresti d’accordo nel promuovere Città Alta come “Cittadella della Cultura”?</h3>
								<div class="col-sm-6 float-left">
									<canvas id="chart3" class="chart"></canvas>
								</div>
								<div class="col-sm-6 float-left">
									<div id="pie-legend3" class="pie-legend"></div>
								</div>
							</div>
                            <!--<div class="col-6 py-4">
                                <h3>4.1 Se NO, Quale futuro vedi per città alta?</h3>
                                <div class="col-sm-6 float-left">
                                    <canvas id="chart4" class="chart"></canvas>
                                </div>
                                <div class="col-sm-6 float-left">
                                    <div id="pie-legend4" class="pie-legend"></div>
                                </div>
                            </div>-->
						</div>
						
						<div class="row statsContainer">
							<h3>5. Alcuni edifici poco utilizzati o gli alloggi di edilizia popolare potrebbero essere rivolti ad abitanti che fruiscono di Città Alta per periodi prolungati</h3>
                            <div class="col-12 py-4">
                                <div class="col-sm-6 float-left">
                                    <canvas id="chart5" class="chart"></canvas>
                                </div>
                                <div class="col-sm-6 float-left">
                                    <div id="pie-legend5" class="pie-legend"></div>
                                </div>
                            </div>
                        </div>

					</div>
				</div>
			</main>
		</div>
	<script>

	window.addEventListener('load', 
	  function() {

	    // ================================ DOMANDA 1 ====================================================

          <?php
            $ris = array(3);
              $sql = "SELECT COUNT(*) as num_risposte FROM accessibilita WHERE DOMANDA_1=1";

              if (mysqli_query($conn, $sql)) {
                  echo "";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $ris[0] = $row["num_risposte"];

              $sql = "SELECT COUNT(*) as num_risposte FROM accessibilita WHERE DOMANDA_1=2";

              if (mysqli_query($conn, $sql)) {
                  echo "";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $ris[1] = $row["num_risposte"];

              $sql = "SELECT COUNT(*) as num_risposte FROM accessibilita WHERE DOMANDA_1=3";

              if (mysqli_query($conn, $sql)) {
                  echo "";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $ris[2] = $row["num_risposte"];


          ?>



		var ctx = document.getElementById("chart0").getContext("2d");
		var data = {
				datasets: [{
					data: [<?php echo $ris[0];?>, <?php echo $ris[1];?>, <?php echo $ris[2];?>],
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
				tooltips: {
					titleFontSize: 15,
					bodyFontSize: 18,
					footerFontSize: 15,
					callbacks: {
						label: function(tooltipItem, data) {
							var dataset = data.datasets[tooltipItem.datasetIndex];
							var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
								return previousValue + currentValue;
							});
							var currentLabel = data.labels[tooltipItem.index];
							var currentValue = dataset.data[tooltipItem.index];
							var percentage = Math.floor(((currentValue/total) * 100)+0.5);
							
							//return " " + currentValue + " risposte: " + percentage + "%";
							return " " + percentage + "%";
						},
						footer: function(tooltipItems, data) {
							console.log(JSON.stringify(tooltipItems));
							return  data.labels[tooltipItems[0].index];
							
						}
					}
				}, 
				
			};

		var pieChart0 = new Chart(ctx, {
			type: 'pie',
			data: data,
			options: options
		});

		$("#pie-legend0").html(pieChart0.generateLegend());


          // ================================ DOMANDA 2 ====================================================

          <?php
          $ris = array(3);

          $sql = "SELECT COUNT(*) as num_risposte FROM accessibilita WHERE DOMANDA_4=1";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[0] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM accessibilita WHERE DOMANDA_4=2";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[1] = $row["num_risposte"];

          ?>


          var ctx1 = document.getElementById("chart1").getContext("2d");
          var data = {
              datasets: [{
                  data: [<?php echo $ris[0];?>, <?php echo $ris[1];?>],
                  backgroundColor: ['rgba(256,0,0,1)','rgba(0,0,128,1)']
              }],
              labels: [
                  'Chiudere l\'accesso a Città Alta ai veicoli privati',
                  'Aumentare gli spazi di sosta'
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
              tooltips: {
                  titleFontSize: 15,
                  bodyFontSize: 18,
                  footerFontSize: 15,
                  callbacks: {
                      label: function(tooltipItem, data) {
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                              return previousValue + currentValue;
                          });
                          var currentLabel = data.labels[tooltipItem.index];
                          var currentValue = dataset.data[tooltipItem.index];
                          var percentage = Math.floor(((currentValue/total) * 100)+0.5);

                          return " " + percentage + "%";
                      },
                      footer: function(tooltipItems, data) {
                          console.log(JSON.stringify(tooltipItems));
                          return  data.labels[tooltipItems[0].index];

                      }
                  }
              },

          };

          var pieChart1 = new Chart(ctx1, {
              type: 'pie',
              data: data,
              options: options
          });

          $("#pie-legend1").html(pieChart1.generateLegend());

          // ================================ DOMANDA 3 ====================================================

          <?php
          $ris = array(3);

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_4=1";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[0] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_4=2";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[1] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_4=3";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[2] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_4=4";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[3] = $row["num_risposte"];

          ?>

          var ctx1 = document.getElementById("chart2").getContext("2d");
          var data = {
              datasets: [{
                  data: [<?php echo $ris[0];?>, <?php echo $ris[1];?>, <?php echo $ris[2];?>, <?php echo $ris[3];?>],
                  backgroundColor: ['rgba(256,0,0,1)','rgba(0,0,128,1)','rgba(255,255,0,1)','rgba(0,255,0,1)']
              }],
              labels: [
                  'Turisti che risiedono per lunghi periodi',
                  'Docenti o lavoratori pendolari su Città Alta',
                  'Studenti',
                  'Altro'
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
              tooltips: {
                  titleFontSize: 15,
                  bodyFontSize: 18,
                  footerFontSize: 15,
                  callbacks: {
                      label: function(tooltipItem, data) {
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                              return previousValue + currentValue;
                          });
                          var currentLabel = data.labels[tooltipItem.index];
                          var currentValue = dataset.data[tooltipItem.index];
                          var percentage = Math.floor(((currentValue/total) * 100)+0.5);

                          return " " + percentage + "%";
                      },
                      footer: function(tooltipItems, data) {
                          console.log(JSON.stringify(tooltipItems));
                          return  data.labels[tooltipItems[0].index];

                      }
                  }
              },

          };

          var pieChart2 = new Chart(ctx1, {
              type: 'pie',
              data: data,
              options: options
          });

          $("#pie-legend2").html(pieChart2.generateLegend());



          // ================================ DOMANDA 4 ====================================================

          <?php
          $ris = array(4);
          $sql = "SELECT DOMANDA_1, COUNT(*) as num_risposte FROM accessibilita GROUP BY DOMANDA_1";

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_6=1";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[0] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_62=1";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[1] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_62=2";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[2] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_62=3";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[3] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM funzionicostruito WHERE DOMANDA_62=4";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[4] = $row["num_risposte"];

          ?>

          var ctx1 = document.getElementById("chart3").getContext("2d");
          var data = {
              datasets: [{
                  data: [<?php echo $ris[0];?>, <?php echo $ris[1];?>, <?php echo $ris[2];?>, <?php echo $ris[3];?>, <?php echo $ris[4];?>],
                  backgroundColor: ['rgba(256,0,0,1)','rgba(0,0,128,1)','rgba(255,255,0,1)','rgba(0,255,0,1)', 'rgba(128,255,0,1)']
              }],
              labels: [
                  'Si',
                  'No, Borgo antico',
                  'No, Cittadella internazionale',
                  'No, Città del paesaggio verde e di pietra',
                  'No, Altro'
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
              tooltips: {
                  titleFontSize: 15,
                  bodyFontSize: 18,
                  footerFontSize: 15,
                  callbacks: {
                      label: function(tooltipItem, data) {
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                              return previousValue + currentValue;
                          });
                          var currentLabel = data.labels[tooltipItem.index];
                          var currentValue = dataset.data[tooltipItem.index];
                          var percentage = Math.floor(((currentValue/total) * 100)+0.5);

                          return " " + percentage + "%";
                      },
                      footer: function(tooltipItems, data) {
                          console.log(JSON.stringify(tooltipItems));
                          return  data.labels[tooltipItems[0].index];

                      }
                  }
              },

          };

          var pieChart3 = new Chart(ctx1, {
              type: 'pie',
              data: data,
              options: options
          });

          $("#pie-legend3").html(pieChart3.generateLegend());



          // ================================ DOMANDA 4.1 ==================================================

          <?php
          $sql = "SELECT DOMANDA_1, COUNT(*) as num_risposte FROM accessibilita GROUP BY DOMANDA_1";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $i=0;
          $result = mysqli_query($conn, $sql);

          $ris = array(3);

          while($row = mysqli_fetch_assoc($result)){
              $ris[$i] = $row["num_risposte"];
              $i = $i+1;
          }

          ?>
          /*
          var ctx1 = document.getElementById("chart4").getContext("2d");
          var data = {
              datasets: [{
                  data: [27, 20, 14, 16],
                  backgroundColor: ['rgba(256,0,0,1)','rgba(0,0,128,1)','rgba(255,255,0,1)','rgba(0,255,0,1)']
              }],
              labels: [
                  'Borgo antico',
                  'Cittadella internazionale',
                  'Città del paesaggio verde e di pietra',
                  'Altro'
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
              tooltips: {
                  titleFontSize: 15,
                  bodyFontSize: 18,
                  footerFontSize: 15,
                  callbacks: {
                      label: function(tooltipItem, data) {
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                              return previousValue + currentValue;
                          });
                          var currentLabel = data.labels[tooltipItem.index];
                          var currentValue = dataset.data[tooltipItem.index];
                          var percentage = Math.floor(((currentValue/total) * 100)+0.5);

                          return " " + currentValue + " risposte: " + percentage + "%";
                      },
                      footer: function(tooltipItems, data) {
                          console.log(JSON.stringify(tooltipItems));
                          return  data.labels[tooltipItems[0].index];

                      }
                  }
              },

          };

          var pieChart41 = new Chart(ctx1, {
              type: 'pie',
              data: data,
              options: options
          });

          $("#pie-legend4").html(pieChart41.generateLegend());
*/

          // ================================ DOMANDA 5 ====================================================

          <?php
          $ris = array(3);
          $sql = "SELECT COUNT(*) as num_risposte FROM spaziinutilizzati WHERE DOMANDA_1=1";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[0] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM spaziinutilizzati WHERE DOMANDA_1=2";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[1] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM spaziinutilizzati WHERE DOMANDA_1=3";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[2] = $row["num_risposte"];

          $sql = "SELECT COUNT(*) as num_risposte FROM spaziinutilizzati WHERE DOMANDA_1=4";

          if (mysqli_query($conn, $sql)) {
              echo "";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $ris[3] = $row["num_risposte"];

          ?>

          var ctx1 = document.getElementById("chart5").getContext("2d");
          var data = {
              datasets: [{
                  data: [<?php echo $ris[0];?>, <?php echo $ris[1];?>, <?php echo $ris[2];?>, <?php echo $ris[3];?>],
                  backgroundColor: ['rgba(256,0,0,1)','rgba(0,0,128,1)','rgba(255,255,0,1)','rgba(0,255,0,1)']
              }],
              labels: [
                  'A coppie di giovani o famiglie con bambini',
                  'A persone anziane',
                  'A studenti',
                  'A docenti e lavoratori pendolari'
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
              tooltips: {
                  titleFontSize: 15,
                  bodyFontSize: 18,
                  footerFontSize: 15,
                  callbacks: {
                      label: function(tooltipItem, data) {
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                              return previousValue + currentValue;
                          });
                          var currentLabel = data.labels[tooltipItem.index];
                          var currentValue = dataset.data[tooltipItem.index];
                          var percentage = Math.floor(((currentValue/total) * 100)+0.5);

                          return " " + percentage + "%";
                      },
                      footer: function(tooltipItems, data) {
                          console.log(JSON.stringify(tooltipItems));
                          return  data.labels[tooltipItems[0].index];

                      }
                  }
              },

          };

          var pieChart5 = new Chart(ctx1, {
              type: 'pie',
              data: data,
              options: options
          });

          $("#pie-legend5").html(pieChart5.generateLegend());


	  }, false);
		
		
	</script>				

    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>

	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>
		
    </body>

</html>
