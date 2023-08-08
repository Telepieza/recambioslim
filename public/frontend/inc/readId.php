<?php

if ('Read' == $action && is_numeric($id)) {
   $endpoint = "/read/{$id}";
   $response = json_decode(CallAPI('GET', $url.$endpoint, $jwt),true);
   if (!empty($response)) {
      foreach ($response as $key => $value) {
        if ($key == 'status') { 
          $status = $value;
        } else 
        if ($key == 'error')  {
          $error = $value;
        } else if ($key == 'info') { 
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
