<?php
   if ($db->connect_error) {
        include('config.php');
   }
   if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
   
   if(isset($_SESSION['login_user'])){
      header("location:index");
   }
?>