<?php
   
   $endpoint = "/read";
   $actionParent = '';
   if ('Pagination' == $action)  
   {
     $formFields   = setPageFields();
     $limit        = (int) $formFields['limit'];
     $offset       = (int) $formFields['offset'];
     $endpoint    .= '?limit=' . $limit . '&offset=' . $offset;
     $actionParent = '?action=Pagination&limit=' . $limit . '&offset=' . $offset;
   } 


   (string) $urlSend = $url . $endpoint; 

   $_SESSION['parent_URL']     = $urlParent  ;
   $_SESSION['parent_PAGE']    = $pageParent ;
   $_SESSION['parent_ACTION']  = $actionParent ;

   $response = json_decode(CallAPI('GET', $urlSend, $jwt ),true);

   if (!empty($response)) {
     foreach ($response as $key => $value) {
       if ($key == 'status') { 
         $status = $value;
       } else 
         if ($key == 'error')  {
           $error = $value;
         } else if ($key == 'info') { 
           $info = $value; 
         } else if ($key == 'pagination') {
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
    $msg = 'Select action Create (Post), Read (Get), Update (Put) or Delete';
  }

?>
