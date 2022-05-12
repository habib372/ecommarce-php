<?php session_start();

   unset($_SESSION["s_username"]);
   session_destroy();
   
   header("location:index.php");

?>