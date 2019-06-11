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
   $sql = "SELECT id FROM utenti WHERE username = '$myusername' and password = '$mypassword'";
   $result = mysqli_query($conn,$sql);
//      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//      $active = $row['active'];

   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row

   if($count == 1) {
      $_SESSION['login_user'] = $myusername;
      header("location: index.php");
   }else {
      $error = "Your Login Name or Password is invalid";
   }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<title>Login</title>
<style>
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

/* Add styles to the form container */
.container {
    right: 0;
    margin: 20px;
    max-width: 300px;
    padding: 16px;
    background-color: white;
}

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

.form-login-error{
            margin-bottom: 10px;
            color: red;
            font-size: small;
         }
.signup{
             padding-top: 10px;
             color:dodgerblue;
         }
</style>
</head>
<body>

  <div class="bg-img">
  
  <div class="w3-display-bottomright w3-padding-large w3-xlarge">
    <a href="index.php">
        <img src="img/logoUnibg.png" style="width:216px;height:72px">
    </a>
  </div>
  
  <div class="w3-display-middle">
    <form action="" method = "post">
        <div class="container">
          <h1>Login</h1>
          <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Inserisci un'Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Inserisci una Password" name="psw" required>
                <h4 class="form-login-error"><?php echo $error; ?></h4>
                <button type="submit" class="btn" name="login">Login</button>
          </div>
          <p>Non hai ancora un profilo? <a href="signup_1.php">Registrati qui</a>.</p>
        </div>
    </form>
  </div>
</div>


</body>
</html>