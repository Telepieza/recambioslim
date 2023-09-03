<?php
/**
  * login.php
  * Description: login template
  * @Author : M.V.M.
  * @Version 1.0.0
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (string) $name      = '';
  (string) $email     = '';
  (string) $password  = '';
  if (isset($_REQUEST['name']))     $name     = $_REQUEST['name']; 
  if (isset($_REQUEST['email']))    $email    = $_REQUEST['email']; 
  if (isset($_REQUEST['password'])) $password = $_REQUEST['password'];
  $formFields = array('name'     => $name,
                      'email'    => $email,
                      'password' => $password
  );
  return $formFields;
}
 
?>