<?php

session_start();

// Localizar token por inicio de session o por cookie
function session_login() {
  $jwt = '';
  if (isset($_SESSION['token'])) {
    $jwt = $_SESSION['token'];
  }
  if (empty($jwt) && isset($_COOKIE['Authorization'])) {
    $jwt = $_COOKIE['Authorization'];
  }  
  if (isset($_SESSION['token']) && isset($_COOKIE['Authorization']))
  {
     if ($_SESSION['token'] != $_COOKIE['Authorization'] ) 
     {
        setcookie("Authorization", $_POST[$_SESSION['token']], time()+(3600 * 4), "/", '');
     }
  }
   return $jwt;
}
// Mensajes de error o info
function msgError( $action, $status, $error, $info, $id ) {
   if ($status == 500) 
   {
     if (is_array($error)) 
     { 
       $msg = $error['type'] . ' ' . $error['description'] ;
     } 
     else 
     { 
      $msg = $error; 
     }  
   } 
   else if ($status >= 400) 
   {
     if (is_array($error)) 
     { 
       $msg = $error['description']; 
       if ($id > 0) {
         $msg .= ' id: '. $id;
       }
     } 
     else 
     { 
      $msg = $error; 
     }
   }
   if (!empty($msg)) 
   {
    $msg = $action . ' Error '. $msg;
   } 
   else 
   {
     if (!empty($info))
     {
       $msg = $info;
     } 
     else 
     {
       $msg = $action . ' is Ok';
       if ($id > 0)
       {
           $msg .= ' - id: '. $id;
       } 
     }
   }
   return $msg;
}

function isMobile()
{
   (boolean) $isMobile = false;
   (string)  $user_agent = $_SERVER['HTTP_USER_AGENT'];
   (string)  $browser = ''; 
      if(strpos($user_agent, 'MSIE')       !== FALSE) { $browser = 'Internet explorer'; }
  elseif(strpos($user_agent, 'Edge')       !== FALSE) { $browser = 'Microsoft Edge'; }
  elseif(strpos($user_agent, 'Trident')    !== FALSE) { $browser = 'Internet explorer'; }
  elseif(strpos($user_agent, 'Opera Mini') !== FALSE) { $browser = 'Opera Mini'; }
  elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE) { $browser = 'Opera'; } 
  elseif(strpos($user_agent, 'Firefox')    !== FALSE) { $browser = 'Mozilla Firefox'; }
  elseif(strpos($user_agent, 'Chrome')     !== FALSE) { $browser = 'Google Chrome'; }
  elseif(strpos($user_agent, 'Safari')     !== FALSE) { $browser =  'Safari'; }
  
  if (empty($browser)) {
    $isMobile = true ;
  }
  return $isMobile;
}

// curl llamada al servidor

function CallAPI($method, $url, $token, $data = false)
{
    $curl      = curl_init();
    $arrHeader = array();

    switch ($method) {
        case 'POST':  // CREATE / LOGIN
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
            break;
        case 'PUT': // UPDATE
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
            break;
        case 'DELETE': // DELETE
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            if ($data) {
                $url = sprintf('%s?%s', $url, $data);
            }
            break;
        default: // READ
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            if ($data) {
              $url = sprintf('%s?%s', $url, $data);
            }
            break;
    }

    (string) $auth = trim($token);
    curl_setopt($curl, CURLOPT_URL, $url);
  // curl_setopt($curl, CURLOPT_FAILONERROR, 1);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HEADER, 0);

    if (empty($auth) && isset($_COOKIE['Authorization']) && !empty($_COOKIE['Authorization'])) {
      $auth = $_COOKIE['Authorization'];
    }
    
    if (empty($auth) && isset($_SESSION['token']) && !empty($_SESSION['token'])) { 
      $auth = $_SESSION['token'];
    }

    $arrHeader[] = "Content-type: application/json";
    if (!empty($auth)) {
       $arrHeader[] = "Authorization: Bearer ". $auth;
    }
 
    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeader);

    $result = curl_exec($curl);

//  $respHeaderSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $respHttpCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
//  $respHttpConnectCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CONNECTCODE);
//  $curlErrorNum = curl_errno($curl);
    if ($respHttpCode == 405) {
      (array) $error = null;
      $error['status']  = 500; 
      $error['error'] = '(nginx) Not Allowed';
      $result =  json_encode($error, JSON_PRETTY_PRINT);
    }
    curl_close($curl);
    return $result;
}


function setPageFields() 
{
   $limit  = 0;
   $offset = 0;
   if (isset($_REQUEST['limit']))   $limit   = $_REQUEST['limit'];
   if (isset($_REQUEST['offset']))  $offset  = $_REQUEST['offset'];
  
   $formFields = array( 
     'limit'   => (int) $limit,
     'offset'  => (int) $offset);
   return $formFields;
}

// Header
function showParent($parent)
{
  header("Location: " . $parent); 
}
