

    <?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
    // Include config file
    require_once 'config.php';
    require_once 'send_mail.php';
    // Define variables and initialize with empty values
    $invite = $username = $name = $surname = "";
    $invite_err = $username_err = $name_err = $surname_err = "";
    $mail_result = $mail_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter an email.";
        } elseif(!(strpos(trim($_POST["username"]), '@studenti.unibg.it') !== false) or (strpos(trim($_POST["username"]), '@unibg.it') !== false)) {
            $username_err = "Please enter an unibg valid email.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";

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
                        $username_err = "This email is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Validate Invite
        if(!empty(trim($_POST["invite"]))){
            if(!(strpos(trim($_POST["invite"]), '@studenti.unibg.it') !== false) or (strpos(trim($_POST["invite"]), '@unibg.it') !== false)) {
                $invite_err = "Please enter an unibg valid email for the inviting user.";
            } else{
            // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = ?";

                if($stmt = mysqli_prepare($conn, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_invite);
                    // Set parameters
                    $param_invite = trim($_POST["invite"]);
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $invite = trim($_POST["invite"]);
                        } else{
                            $invite_err = "The inviter user does not exist!";
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
        
        // Validate name
        if(empty(trim($_POST['name']))){
            $name_err = "Please enter a name.";     
        } else{
            $name = trim($_POST['name']);
        }
        
        // Validate name
        if(empty(trim($_POST['surname']))){
            $surname_err = "Please enter a surname.";     
        } else{
            $surname = trim($_POST['surname']);
        }

        
        
        // Check input errors before inserting in database
        if(empty($username_err) && empty($name_err) && empty($surname_err) && empty($invite_err)){
            if(empty($mail_result)){
                $mail_result = sendMail($username, $name, $surname);
                if($mail_result == "OK"){
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $name;
                    $_SESSION['surname'] = $surname;
                    $_SESSION['invite'] = $invite;
                    header("location: signup_2.php");
                }
                else{
                    $mail_error = "Mail couldn't be send";
                }
            }
        }
        
        if(empty($username_err) && empty($name_err) && empty($surname_err) && empty($mail_err) && empty($invite_err)){
            if($mail_result == ""){
                $mail_result = sendMail($username, $name, $surname);
                if($mail_result == "OK"){
                    header("location: signup_2.php");
                }
                else{
                    $mail_error = "Mail couldn't be send";
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
                background-image: url("/Immagini/path_bike_1920x1080.jpg");
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
  
            <div class="w3-display-topright w3-padding-large w3-xlarge">
              <a href="login.php">
                  <img src="/Immagini/logoUnibg.png" style="width:216px;height:72px">
              </a>
            </div>
        
            <div class="w3-display-middle">
                <form action="<?php echo str_replace(".php","",htmlspecialchars($_SERVER["PHP_SELF"])); ?>" method="post">
                    <div class="wrapper" id="phase1">
                        <h2>Sign Up</h2>
                        <p>Please fill this form to create an account.</p>
                        <p>The Username field accepts only university emails.</p>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
                            <label>Surname</label>
                            <input type="text" name="surname" value="<?php echo $surname; ?>">
                            <span class="help-block"><?php echo $surname_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($invite_err)) ? 'has-error' : ''; ?>">
                            <label>Invited By (email)</label>
                            <input type="text" name="invite" value="<?php echo $invite; ?>">
                            <span class="help-block"><?php echo $invite_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn" value="Continue">
                        </div>
                        <span class="help-block"><?php echo $mail_err; ?></span>
                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </div>
                </form>
            </div>
            
        </div>
    </body>
    </html>