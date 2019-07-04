<?php
//ini_set('display_errors', 'Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include("config.php");
session_start();
include('session_login.php');
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 

   $myusername = mysqli_real_escape_string($conn,$_POST['email']);
   $mypassword = hash("sha256", mysqli_real_escape_string($conn,$_POST['psw']));
//      $mypassword = mysqli_real_escape_string($conn,$_POST['psw']); 
   $sql = "SELECT id FROM utenti WHERE mail = '$myusername' and password = '$mypassword'";
   $result = mysqli_query($conn,$sql);
//      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//      $active = $row['active'];

   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row

   if($count == 1) {
      $_SESSION['login_user'] = $myusername;
      header("location: index.php");
   }else {
      $error = "Hai inserito credenziali non corrette. Per favore controlla.";
   }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="CST - DiathesisLab">
		<title>Citt&agrave; Alta Plurale | Login</title>
		<!-- Links -->
		<?php require_once('inc/links.inc'); ?>

		<style>
		/* Full-width input fields */
		input[type=text], input[type=password] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 15px 0;
			border: none;
			background: #f1f1f1;
		}

		input[type=text]:focus, input[type=password]:focus {
			background-color: #ddd;
			outline: none;
		}

		/* Set a style for the submit button */

		.form-login-error{
					margin-bottom: 10px;
					color: red;
					font-size: small;
				 }
		.signup{
					 padding-top: 10px;
				 }
		</style>
	</head>
	<body>
		<header>
			<?php require_once('inc/header.inc'); ?>
		</header>

		<div class="bg-img">
			<div class="container">
				<div class="row">
					<div class="text-left my-5 mx-auto">
						<form action="" method = "post">
							<div class="wrapper">
								<h2>Login</h2>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" placeholder="Inserisci la tua email" name="email" required>

									<label for="psw">Password</label>
									<input type="password" placeholder="Inserisci la password" name="psw" required>
									<h4 class="form-login-error"><?php echo $error; ?></h4>
									<button type="submit" class="btn btn-primary" name="login">Login</button>
								</div>
								<p>Non hai ancora un profilo? <a href="signup.php">Registrati qui</a>.</p>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="position-absolute" style="right:0px;bottom:0px;">
				<a href="index.php">
					<img src="img/LogoFooter.png" style="width:216px;margin:25px;">
				</a>
			</div>


		</div>
    <!-- Footer -->
	<?php require_once('inc/footer.inc'); ?>
	<!-- Scripts -->
	<?php require_once('inc/footerscripts.inc'); ?>



</body>
</html>