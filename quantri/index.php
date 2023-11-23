<?php 
  session_start();
  if(isset($_SESSION['role']) && $_SESSION['role'] == 1 && !empty($_SESSION)) {
    require('includes/header.php');       
    require('includes/footer.php');
  } else {
    header("location : ../quantri/404.php");
  }
?>
