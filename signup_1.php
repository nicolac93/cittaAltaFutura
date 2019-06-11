

    <?php
ini_set('display_errors', 'On');
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
                if($mail_result == "OK"){
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

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <title>Sign Up</title>
        <style type="text/css">
            body, html {
                height: 100%;
                font-family: "Raleway", sans-serif;
            }
            
            * {
                box-sizing: border-box;
            }

                /* Background image */
            .bg-img {
                background-image: url("img/bergamo.jpg");
                min-height: 100%;
                background-position: center;
                background-size: cover;
            }
            
            .wrapper{  
                right: 0;
                margin: 20px;
                max-width: 350px; 
                padding: 16px;
                background-color: white;
            }
            
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
            .btn {
                background-color: #4CAF50;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .btn:hover {
                opacity: 1;
            }
        </style>

    </head>
    <body>
        <div class="bg-img">
  
            <div class="w3-display-bottomright w3-padding-large w3-xlarge">
              <a href="login.php">
                  <img src="img/logoUnibg.png" style="width:216px;height:72px">
              </a>
            </div>
        
            <div class="w3-display-middle">
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
    </body>
    </html>