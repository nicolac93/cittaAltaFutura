<?php
ini_set('display_errors', 'Off');
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
session_start();
    // Include config file
    require_once 'config.php';
    
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $surname = $_SESSION['surname'];
    $invite = $_SESSION['invite'];
    // Define variables and initialize with empty values
    $code = $password = $confirm_password = "";
    $code_err = $password_err = $confirm_password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Validate the code
        if(empty(trim($_POST['code']))){
            $code_err = "Please enter the recieved code.";     
        } elseif($_POST['code'] != hash("crc32b", $username)){
            $code_err = "Incorrect code.";
        } else{
            $code = trim($_POST['code']);
        }

        // Validate password
        if(empty(trim($_POST['password']))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST['password'])) < 8){
            $password_err = "Password must have atleast 8 characters.";
        } else{
            $password = trim($_POST['password']);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = 'Please confirm password.';     
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = 'Password did not match.';
            }
        }
        
        // Check input errors before inserting in database
        if(empty($code_err) && empty($password_err) && empty($confirm_password_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password, name, surname, invited_by) VALUES (?, ?, ?, ?, ?)";
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_name, $param_surname, $param_invite);
                // Set parameters
                $param_username = mysqli_real_escape_string($conn,$username);
                $param_name = mysqli_real_escape_string($conn,$name);
                $param_surname = mysqli_real_escape_string($conn,$surname);
                $param_invite = mysqli_real_escape_string($conn,$invite);
//                $param_password = $password; // Creates a password hash
                $param_password = hash("sha256", mysqli_real_escape_string($conn,$password)); // Creates a password hash
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    $_SESSION['login_user'] = $username;
                    header("location: index");
                } else{
                    echo "Something went wrong. Please try again later.";
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
              <a href="login">
                  <img src="/Immagini/logoUnibg.png" style="width:216px;height:72px">
              </a>
            </div>
        
            <div class="w3-display-middle">
                <form action="<?php echo str_replace(".php","",htmlspecialchars($_SERVER["PHP_SELF"])); ?>" method="post">
                    <div class="wrapper" id="phase2"> 
                        <h2>Sign Up</h2>
                        <p>Please fill this form to create an account.</p>
                        <div class="form-group <?php echo (!empty($code_err)) ? 'has-error' : ''; ?>">
                            <label>Code receveid via mail</label>
                            <input type="text" name="code" value="<?php echo $code; ?>">
                            <span class="help-block"><?php echo $code_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn" value="Submit">
                        </div>
                        <p>Already have an account? <a href="login">Login here</a>.</p>
                    </div>
                </form>
            </div>
            
        </div>
    </body>
    </html>