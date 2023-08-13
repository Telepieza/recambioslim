<?php
/** 
  * logout.php
  * Description: logout form
  * @Author : M.V.M
  * @Version 1.0.0
**/
  include 'inc/function.php';
  
// If token exists, remove session and cookie           
  if (isset($_SESSION['token'])) {
    unset($_SESSION['token']);
    if (isset($_COOKIE['Authorization'])) {
      unset($_COOKIE['Authorization']);
    }
    session_destroy();
  }
// Redirect to login
  header('Location: login.php'); 
  exit;  
?>