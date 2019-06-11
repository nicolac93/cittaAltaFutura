<?php
//ini_set('display_errors', 'Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
    // Include config file
    require_once 'config.php';
    
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $tipo = $_SESSION['tipo'];
    // Define variables and initialize with empty values
    $code = $password = $confirm_password = "";
    $code_err = $password_err = $confirm_password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Validate the code
        if(empty(trim($_POST['code']))){
            $code_err = "Perfavore inserisci il codice ricevuto via mail.";     
        } elseif($_POST['code'] != hash("crc32b", $username)){
            $code_err = "Codice errato.";
        } else{
            $code = trim($_POST['code']);
        }

        // Validate password
        if(empty(trim($_POST['password']))){
            $password_err = "Per favore inserisci una password.";     
        } elseif(strlen(trim($_POST['password'])) < 8){
            $password_err = "La password deve avere almeno 8 caratteri.";
        } else{
            $password = trim($_POST['password']);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = 'Per favore conferma la password.';     
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = 'Le passwords non coincidono!';
            }
        }
        
        // Check input errors before inserting in database
        if(empty($code_err) && empty($password_err) && empty($confirm_password_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO utenti (mail, password, username, tipo) VALUES (?, ?, ?, ?)";
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_name, $param_tipo);
                // Set parameters
                $param_username = mysqli_real_escape_string($conn,$username);
                $param_name = mysqli_real_escape_string($conn,$name);
                $param_tipo = mysqli_real_escape_string($conn,$tipo);
//                $param_password = $password; // Creates a password hash
                $param_password = hash("sha256", mysqli_real_escape_string($conn,$password)); // Creates a password hash
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Qualcosa è andato storto. Per favore prova ancora fra un pò.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
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
                    <div class="wrapper" id="phase2"> 
                        <h2>Sign Up</h2>
                        <p>Per favore compila i campi per creare un account.</p>
                        <div class="form-group <?php echo (!empty($code_err)) ? 'has-error' : ''; ?>">
                            <label>Codice ricevuto via mail</label>
                            <input type="text" name="code" value="<?php echo $code; ?>">
                            <span class="help-block"><?php echo $code_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Conferma la Password</label>
                            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn" value="Registrati">
                        </div>
                        <p>Hai già un profilo? <a href="login.php">Accedi qui</a>.</p>
                    </div>
                </form>
            </div>
            
        </div>
    </body>
    </html>