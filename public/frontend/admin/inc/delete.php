<?php
/**
  * delete.php
  * Description: endpoint /delete/id -Action delete with call to the Api server with id
  * @Author : M.V.M.
  * @Version 1.0.5
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

if ('Delete' == $action && is_numeric($id)) {

  (int)    $status = 202 ;
  (string) $error  = '';
  (string) $info   = '';
  (string) $val    = '';
   
  $endpoint = "/delete/{$id}";
  if ($methodDELETE) {
    $method = 'DELETE';
  } else {
    $method = 'POST';
  }
  $response = json_decode(CallAPI($method, $url.$endpoint, $jwt ),true);
  if ($response != null) {
    foreach ($response as $key => $value) {
      if ($key == 'status') {
         $status = $value;
      } elseif ($key == 'error') {
        $error = $value;
      } elseif ($key == 'info') {
        $info = $value;
      }
    }
    $msg = msgError($action, $status, $error, $info, $id );
  }
  $action = 'Create'; // Next action

}

?>
