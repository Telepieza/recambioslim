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
 
// Redirect to index.php
  header('Location: ../../index.php');
  exit;
?>