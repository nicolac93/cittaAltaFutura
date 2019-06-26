<?php
//ini_set('display_errors', 'Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include("session.php");

$id_segnalazione = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Segnalazione</title>

    <!-- Links -->
	<?php require_once('inc/links.inc'); ?>

  </head>

  <body>

    <!-- Navigation -->
	<?php require_once('inc/navigation.inc'); ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <!--<h1 class="mt-4 mb-3">Full Width
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Full Width</li>
      </ol>-->

      <?php
        $sql = "SELECT * FROM segnalazioni JOIN utenti ON segnalazioni.id_utente = utenti.id WHERE segnalazioni.id = ".$id_segnalazione;
           
        if (mysqli_query($conn, $sql)) {
          echo "";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
          $count=1;
          $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      ?>
      
      <h1 class="mt-4 mb-3"><?php echo $row['titolo'] ?></h1>

      <div class="row">
        <div class="col-lg-4">
          <img src=".\img\piazzaVecchia.jpg" class="img-fluid" alt="img"> 
        </div>

        <div class="col-lg-8">
          <h5>Tipologia:</h5>
          <p><?php echo $row['tipologia']?></p>
          <h5>Intervento / iniziativa proposta:</h5>
          <p><?php echo $row['proposta']?></p>
          <h5>Motivazione:</h5>
          <p><?php echo $row['motivazione']?></p>
          <h5>Destinatari:</h5>
          <p><?php echo $row['destinatari']?></p>
          <h5>Periodo:</h5>
          <p><?php echo $row['periodo']?></p>
          <h5>Stato di conservazione:</h5>
          <p><?php echo $row['conservazione']?></p>
          <h5>Autore:</h5>
          <p><?php echo $row['username']?></p>
        </div>
      </div>

      <?php
          $count++;
        }
      } else {
        echo "0 results";
      }
      ?>

    </div>
    <!-- /.container -->

    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>
	<!--
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Università degli Studi di Bergamo 2018</p>
      </div>
    </footer>
	-->
	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>

	</body>
  

</html>
