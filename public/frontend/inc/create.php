<?php
/** 
  * create.php
  * Description: endpoint /new -Action create with call to the Api server
  * @Author : M.V.M
  * @Version 1.0.0
**/
if ('Create' == $action) {
    $endpoint = '/new';
    $response = json_decode(CallAPI('POST', $url.$endpoint, $jwt, setFormFields()),true);
    if (!empty($response)) {
      foreach ($response as $key => $value) {
          if ($key == 'status') { 
            $status = $value;
          } else if ($key == 'error') { 
            $error = $value; 
          } else if ($key == 'info') { 
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
