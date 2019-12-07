<?php 
session_start();
ob_start(); 
  if(!isset($_SESSION['login'])){
    header('location: login.php');
  }
  if(isset($_GET['status'])){
    session_destroy();
    header('location:index.php');
  }
?>
<?php
  include('func/func_dbCon.php');
  db_connection();
?>
<?php
  include('func/func_helper.php');
?>
  <!-- Main Header -->
  <?php include('view/header.php');?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php include('view/sidebar.php')?>

    <?php include('view/page_header.php')?>

    <!-- Main content -->
    

      <?php 
       
        $view='dashboard';
        if(isset($_GET['view'])){
          $view=$_GET['view'];
        }
        include("view/$view.php");
 
      ?>

  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
    <?php include('view/footer.php')?>

  