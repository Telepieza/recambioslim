<?php
/**
  * readId.php
  * Description: Endpoind read/id with call to the Api server and testing with id
  * @Author : M.V.M.
  * @Version 1.0.5
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

if ('Read' == $action && is_numeric($id)) {

   (int)    $status = 0 ;
   (string) $error  = '';
   (string) $info   = '';
   (string) $val    = '';

   $endpoint = "/read/{$id}";
   $response = json_decode(CallAPI('GET', $url.$endpoint, $jwt),true);

   if (!empty($response)) {
      foreach ($response as $key => $value) {
        if ($key == 'status') {
          $status = $value;
        } elseif ($key == 'error')  {
          $error = $value;
        } elseif ($key == 'info') {
          $info = $value;
        } else {
          $val = $value;
        }
      }
      $msg = msgError($action, $status, $error, $info, $id );
      if ($status == 200) {
          $action = 'Update'; // Next action
      } else {
         $action  = 'Create'; // Next action
      }
   } else {
     $action  = 'Create'; // Next action
   }

}

?>
