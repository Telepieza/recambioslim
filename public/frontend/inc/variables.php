<?php

(string)  $hora         = date('H:i');
(string)  $date         = date('Y-m-d H:i:s');
(string)  $session_id   = session_id();
(string)  $jwt          = session_login();
(boolean) $isMobile     = isMobile();
(string)  $route        = 'http://recambioslim.com/opencard/';
(string)  $company      = "Telepieza";
(string)  $urlWebClient = 'http://recambioslim.com/';
(string)  $pathWebClient = 'frontend/';
(string)  $actionReadId = '?action=Read&id=';
(string)  $actionCreate = '?action=create';
(boolean) $methodDELETE = false;   // (Error 405) servers do not allow for DELETE = false, accept = true 
(boolean) $methodPUT    = false;   // (Error 405) servers do not allow for PUT = false   , accept = true
// Variables work
(string)  $action       = '';
(string)  $url          = '';
(array)   $val          = null;
(array)   $data         = null;
(int)     $id           = 0;
(int)     $status       = 0;
(string)  $error        = '';
(string)  $info         = '';
(string)  $msg          = '';
(array)   $pagination   = '';
(int)     $currentPage  = 1;
(int)     $countRows    = 28;
(int)     $totalLimit   = 2;
(string)  $pageParent   = '';
(string)  $pathParent   = '';
(string)  $urlParent    = '';
(string)  $pageAction   = '';
(string)  $pageCreate   = '';
(string)  $password     = ''; 
(string)  $urlSend      = '';

if (isset($endpoint)) {
  $url = $route . $endpoint;
} else {
  $url = $route;
}

?>