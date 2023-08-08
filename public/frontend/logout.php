<?php
  include 'inc/function.php';
  
// Si existe token, elimina session y cookie           
  if (isset($_SESSION['token'])) {
    unset($_SESSION['token']);
    if (isset($_COOKIE['Authorization'])) {
      unset($_COOKIE['Authorization']);
    }
    session_destroy();
  }
// Redireccionar a login
  header('Location: login.php'); 
  exit;  
?>