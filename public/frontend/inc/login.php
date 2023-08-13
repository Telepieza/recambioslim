<?php
/** 
  * login.php
  * Description: endpoint /login -Action login with call to the Api server and testing token
  * @Author : M.V.M
  * @Version 1.0.0
**/
  if ('login' == $action) {
     $endpoint = "/login";
     $response = json_decode(CallAPI('POST', $url.$endpoint, $jwt , setFormFields()),true);
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
       $msg = msgError($action, $status, $error, $info, $id);    
     }
     if ($status == 200 && !empty($val)) {
       $msg .= ". Token: " . "\n" . $val;
       $_SESSION['token'] = $val;
     }
  }

  $action = 'login';

?>
