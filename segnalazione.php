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

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">Città Alta Futura</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="about.html">Progetto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.html">Partecipa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contatti</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="faq.html">FAQ</a>
              </li>
              <li class="nav-item" id="login">
                <a class="nav-link" href="login.php"> Login</a>
              </li>
              <li class="nav-item" id="logout">
                <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
              </li>
              <li class="nav-item" id="user">
                <span class="nav-link"><strong><?php echo $_SESSION['login_user_name'];?></strong></span>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Full Width
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Full Width</li>
      </ol>

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
      
      <h1><?php echo $row['titolo'] ?></h1>

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
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Università degli Studi di Bergamo 2018</p>
      </div>
      <!-- /.container -->
    </footer>
    
    <script>
        var login = document.getElementById("login");
        var logout = document.getElementById("logout");
        var user = document.getElementById("user");
        if("<?php echo $_SESSION['login_user_name'];?>" == ""){
            login.style.display = "inline-block";
            logout.style.display = "none";
            user.style.display = "none";
        }else{
            login.style.display = "none";
            logout.style.display = "inline-block";
            user.style.display = "inline-block";
        }
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
  

</html>
