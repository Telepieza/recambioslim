<?php
/**
  * logout.php
  * Description: logout form
  * @Author : M.V.M.
  * @Version 1.0.19
**/
  
  if (!defined('_TEXEC'))  {
    define( '_TEXEC' , 1) ;
  }

// If token exists, remove session and cookie
  if (isset($_SESSION['token'])) {
      unset($_SESSION['token']);
  }
  if (isset($_COOKIE['Authorization'])) {
      unset($_COOKIE['Authorization']);
  }

  if (isset($_COOKIE['parent_URL'])) {
      unset($_COOKIE['parent_URL']);
  }

  if (isset($_COOKIE['parent_PAGE'])) {
      unset($_COOKIE['parent_PAGE']);
  }

  if (isset($_COOKIE['parent_ACTION'])) {
     unset($_COOKIE['parent_ACTION']);
  }
  
  session_destroy();
 
// Redirect to login
  header('Location: login.php');
  exit;
?>