<?php session_start();
   if(!isset($_SESSION["s_id"])){
     header("location:index.php");
   }
?>
<?php require_once("db_config.php")?>
<?php require_once("lib/components.php") ?>
<?php require_once("models/user_class.php") ?>
<?php require_once("models/product_class.php") ?>
<?php require_once("models/category_class.php") ?>
<?php require_once("models/supplier_class.php") ?>

<style>
.img{
        height:70px;
        width:67px;
        align:center;
        padding-top:3px;
        
       }
</style>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>BikeBD | HOME</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
  <link rel="stylesheet" href="asset/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link  rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!---------jquery ui--------->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
 
  <link href="logo.jpg"  rel="icon">
	<link href="logo.jpg"  rel="apple-touch-icon">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    <?php include("include/navbar.php")?>
  

  <!-- Main Sidebar Container -->
    <?php  include("include/main_sidebar.php")?>


  <!-- Content Wrapper. Contains page content -->
    <?php include("include/content_wrapper.php")?>


  <!-- Control Sidebar -->
   <?php include("include/control_sidebar.php")?>
  

  <!-- Main Footer -->
  <?php  include("include/footer.php")?>


</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="asset/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<script src="asset/AdminLTE-3.0.5/plugins/chart.js/Chart.min.js"></script>
<script src="asset/AdminLTE-3.0.5/dist/js/pages/dashboard3.js"></script>
<script src="asset/AdminLTE-3.0.5/dist/js/demo.js"></script>

</body>
</html>
