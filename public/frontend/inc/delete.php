<?php

if ('Delete' == $action && is_numeric($id)) {
  $endpoint = "/delete/{$id}";
  $status = 202;
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
      } else if ($key == 'error') { 
        $error = $value; 
      } else if ($key == 'info') { 
        $info = $value; 
      }
    }
    $msg = msgError($action, $status, $error, $info, $id );  
  } 
  $action = 'Create'; // Next action   
}

?>
