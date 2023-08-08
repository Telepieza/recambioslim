<?php

  $id = isset($_POST['id']) ? $_POST['id'] : ''; // post if from form field
  if ('' == $id) {
    $id = isset($_GET['id']) ? $_GET['id'] : ''; // get if from form action
  }
  $action = isset($_GET['action']) ? $_GET['action'] : '';

?>