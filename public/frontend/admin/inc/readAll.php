<?php
/**
  * readAll.php
  * Description: Endpoind /read with call to the Api server and testing pagination limit and offset
  * @Author : M.V.M.
  * @Version 1.0.5
**/

   defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely
   
   (int)    $status = 0 ;
   (string) $error  = '';
   (string) $info   = '';
   (string) $val    = '';

   $endpoint = "/read";
   if ('Pagination' == $action)
   {
      $formFields   = setPageFields();
      $limit        = (int) $formFields['limit'];
      $offset       = (int) $formFields['offset'];
      $endpoint    .= '?limit=' . $limit . '&offset=' . $offset;
      $actionParent = '?action=Pagination&limit=' . $limit . '&offset=' . $offset;
   }

   (string) $urlSend = $url . $endpoint;

   $_SESSION['parent_URL']   = $urlParent  ;
   $_SESSION['parent_PAGE']  = $pageParent ;

   if (isset($actionParent)) {
     $_SESSION['parent_ACTION']  = $actionParent ;
   } else {
      if (isset($_SESSION['parent_ACTION'])) {
        unset($_SESSION['parent_ACTION']);
      }
   }
   $response = json_decode(CallAPI('GET', $urlSend, $jwt ),true);

   if (!empty($response)) {
    
     foreach ($response as $key => $value) {

       if ($key == 'status') {
         $status = $value;
       } elseif ($key == 'error')  {
           $error = $value;
       } elseif ($key == 'info') {
           $info = $value;
       } elseif ($key == 'pagination') {
           $pagination = $value;
       } else {
           $data  = $value;
       }
     }
   }

   if (!empty($pagination) && is_array($pagination)) {
      if (isset($pagination['currentPage']))   $currentPage = (int) $pagination['currentPage'];
      if (isset($pagination['limit']))         $limit       = (int) $pagination['limit'];
      if (isset($pagination['offset']))        $offset      = (int) $pagination['offset'];
      if (isset($pagination['countRows']))     $countRows   = (int) $pagination['countRows'];
      if (isset($pagination['totalLimit ']))   $totalLimit  = (int) $pagination['totalLimit'];
   }


  $msg = msgError($action, $status, $error, $info, $id );

  if (empty($msg)) {
    $msg = 'Select action Create (Post), Read (Get), Update (Put) or Delete';  // next action
  }

?>
