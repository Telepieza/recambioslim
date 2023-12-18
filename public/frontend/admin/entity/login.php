<?php
/**
  * login.php
  * Description: login template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (string) $name     = isset($_REQUEST['name'])     ? $_REQUEST['name']     : ''  ; // name
  (string) $email    = isset($_REQUEST['email'])    ? $_REQUEST['email']    : ''  ; // email
  (string) $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : ''  ; // password
  return array('name'     => $name,
               'email'    => $email,
               'password' => $password );
}
 
?>