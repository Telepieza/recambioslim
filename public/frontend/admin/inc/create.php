<?php
/**
  * create.php
  * Description: endpoint /new -Action create with call to the Api server
  * @Author : M.V.M.
  * @Version 1.0.5
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

if ('Create' == $action) {

   (int)    $status = 0 ;
   (string) $error  = '';
   (string) $info   = '';
   (string) $val    = '';
    
    $endpoint = '/new';
    $response = json_decode(CallAPI('POST', $url.$endpoint, $jwt, setFormFields()),true);
    if (!empty($response)) {
      foreach ($response as $key => $value) {
          if ($key == 'status') {
            $status = $value;
          } elseif ($key == 'error') {
            $error = $value;
          } elseif ($key == 'info') {
            $info = $value;
          } else {
            $val = $value;
          }
      }
      if ($status == 201) {
        $info = $val;
      }
      $msg = msgError($action, $status, $error, $info, $id );
    }
     $action = 'Create'; // Next action
}

?>
