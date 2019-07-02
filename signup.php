<?php
ini_set('display_errors', 'Off');
//ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
    // Include config file
    require_once 'config.php';
    require_once 'send_mail.php';
    // Define variables and initialize with empty values
    $username = $name = $tipo = "";
    $username_err = $name_err = $tipo_err = "";
    $mail_result = $mail_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Per favore inserisci la mail.";
        } elseif(!(strpos(trim($_POST["username"]), '@') !== false)) {
            $username_err = "Per favore inserisci una mail valida";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM utenti WHERE username = ?";

            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                // Set parameters
                $param_username = trim($_POST["username"]);
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "La mail inserita è già in uso!";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Qualcosa è andato storto. Per favore prova ancora fra un pò.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        
        // Validate name
        if(empty(trim($_POST['name']))){
            $name_err = "Per favore inserisci uno username.";     
        } else{
            $name = trim($_POST['name']);
        }
        
        // Validate name
        if(empty(trim($_POST['tipo']))){
            $tipo_err = "Per favore seleziona un tipo.";     
        } else{
            $tipo = trim($_POST['tipo']);
        }

        
        
        // Check input errors before inserting in database
        if(empty($username_err) && empty($name_err) && empty($tipo_err)){
            if(empty($mail_result)){
                $mail_result = sendMail($username, $name, $tipo);
                error_log(print_r($mail_result,true));
                error_log("1 QUA CI ARRIVO");
                if($mail_result == "OK"){
					error_log("2 QUA CI ARRIVO");
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $name;
                    $_SESSION['tipo'] = $tipo;
                    header("location: signup_2.php");
                }
                else{
                    $mail_err = "Errore nell'invio, controllare la mail e/o la connessione";
                }
            }
        }
        
        // Close connection
        mysqli_close($conn);
    }
    ?>

     

    <!DOCTYPE html>

    <html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="CST - DiathesisLab">
		<title>Citt&agrave; Alta Plurale | Registrati</title>
		<!-- Links -->
		<?php require_once('inc/links.inc'); ?>
        <style type="text/css">
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
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div class="wrapper" id="phase1">
								<h2>Registrazione</h2>
								<p>Per favore compila i campi per creare un account.</p>
								<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
									<label>Mail</label>
									<input type="text" name="username" value="<?php echo $username; ?>">
									<span class="help-block"><?php echo $username_err; ?></span>
								</div>
								<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
									<label>Username</label>
									<input type="text" name="name" value="<?php echo $name; ?>">
									<span class="help-block"><?php echo $name_err; ?></span>
								</div>
								<div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>">
									<label>Tipo</label>
									<input type="text" name="tipo" value="<?php echo $tipo; ?>">
									<span class="help-block"><?php echo $tipo_err; ?></span>
								</div>
								<div class="form-group">
									<input type="submit" class="btn" value="Continua">
								</div>
								<span class="help-block"><?php echo $mail_err; ?></span>
								<p>Hai già un profilo? <a href="login.php">Accedi qui</a>.</p>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="position-absolute" style="right:0px;bottom:0px;">
				<a href="login.php">
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
