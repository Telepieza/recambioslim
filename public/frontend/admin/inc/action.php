<?php
/**
  * action.php
  * Description: Action Create, Read, Update, Delete
  * @Author : M.V.M.
  * @Version 1.0.0
**/

  defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

  if (!in_array($action, ['Create', 'Read', 'Update', 'Delete']) || !is_numeric($id)) {
    if (empty($msg)) {
     $msg = 'Select action Create (Post), Read (Get), Update (Put) or Delete';
    }
   $action = 'Create';
  }

?>
