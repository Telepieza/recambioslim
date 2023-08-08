<?php

  if (!in_array($action, ['Create', 'Read', 'Update', 'Delete']) || !is_numeric($id)) {
    if (empty($msg)) {
     $msg = 'Select action Create (Post), Read (Get), Update (Put) or Delete';
    }
   $action = 'Create';
  }

?>
