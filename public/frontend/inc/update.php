<?php
/** 
  * update.php
  * Description: Endpoind /update/id with call to the Api server and testing with id
  * @Author : M.V.M
  * @Version 1.0.0
**/
if ('Update' == $action && is_numeric($id)) {
  $endpoint = "/update/{$id}";
  if ($methodPUT) {
   $method = 'PUT';
 } else {
   $method = 'POST';
 }
  $response = json_decode(CallAPI($method, $url.$endpoint,$jwt, setFormFields()));
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
     if ($status == 200) {
         $info = $val;
     } 
     $msg = msgError($action, $status, $error, $info, $id ); 
  }
     $action = 'Create'; // Next action    
}

?>
