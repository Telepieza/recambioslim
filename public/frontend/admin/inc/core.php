<?php
/**
  * includeInc.php
  * Description: Action Create, Read, Update, Delete
  * @Author : M.V.M.
  * @Version 1.0.8
**/

if ($core != 'readAll') {
  include_once 'function.php';
  include_once 'setting.php';
}
 
if ($core == 'readId') {
  include_once 'getAction.php';
  include_once 'create.php';
  include_once 'update.php';
  include_once 'delete.php';
  include_once 'readId.php';
  include_once 'action.php';
} elseif ($core == 'readAll') {
  $urlParent   = $urlWebClient . $pathWebClient.            // example : https://www.telepieza.com/recambios/frontend/
  $pageAction  = $urlParent . $pageCreate . $actionReadId ; // example : https://www.telepieza.com/recambios/frontend/tax_ruleForm.php?action=Read&id=  
  $pageCreate .= $actionCreate;
  include_once 'getAction.php';
  include_once 'readAll.php';
}
  
if (!empty($core)) {
  include_once $ruteTheme.'header.php';
  include_once $ruteTheme.'navbar.php';
}

?>
