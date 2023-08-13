<?php
/** 
  * getaction.php
  * Description: Read the ID and action by $_POT or $_GET
  * @Author : M.V.M
  * @Version 1.0.0
**/ 
  $id = isset($_POST['id']) ? $_POST['id'] : ''; // post if from form field
  if ('' == $id) {
    $id = isset($_GET['id']) ? $_GET['id'] : ''; // get if from form action
  }
  $action = isset($_GET['action']) ? $_GET['action'] : '';

?>