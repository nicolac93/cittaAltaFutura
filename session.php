<?php
   include('config.php');
   
   if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
   
   if(!isset($_SESSION['login_user'])){
        $_SESSION['login_user_id'] =  0;
        $_SESSION['login_user_name'] =  "";
   }else{
        $user_check = $_SESSION['login_user'];
        $ses_sql = mysqli_query($conn,"select username, id from utenti where mail = '$user_check' ");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

        $login_session = $row['username'];
        $_SESSION['login_user_id'] =  $row['id'];
        $_SESSION['login_user_name'] =  $row['username'];
   }
?>