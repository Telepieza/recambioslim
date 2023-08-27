<?php
/** 
  * manufacturer.php
  * Description: manufacturer template
  * @Author : M.V.M
  * @Version 1.0.0
**/
function setFormFields() {
  $manufacturer_id   = $_REQUEST['id'];
  $name              = $_REQUEST['name'];
  $image             = $_REQUEST['image'];
  $sort_order        = $_REQUEST['sort_order'];

  if (empty($image)) { $image = '/image'; };
  
  $formFields = array( 
    'manufacturer_id'  => (int)    $manufacturer_id,
    'name'             => (string) $name,
    'image'            => (string) $image,
    'sort_order'       => (int)    $sort_order);
  
    if (empty($image)) {
      unset($formFields['image']);
    }
    return $formFields;
}

function viewTableThead($data) {
  
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

 $header .= 
    '<th>order</th>
     <th>id</th>
     <th>name</th>
     <th>image</th>';
   return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row): 
    
      (int)    $manufacturer_id  = 0;
      (string) $name             = '';
      (string) $image            = '';
      (int)    $sort_order       = 0 ;
      
      if (isset($row['manufacturer_id']))  $manufacturer_id = $row['manufacturer_id'];
      if (isset($row['name']))             trim($name = $row['name']);
      if (isset($row['image']))            trim($image = $row['image']);
      if (isset($row['sort_order']))       $sort_order = $row['sort_order'];

      echo '<tr>';
        echo '<td><a href=' . $pageAction . $manufacturer_id . ' target="_blank" class="btn btn-secondary btn-sm"><i class="fa fa-angle-double-right"></i>Details</a></td>';
        echo '<td>' . $sort_order       . '</td>'; 
        echo '<td>' . $manufacturer_id  . '</td>'; 
        echo '<td>' . $name             . '</td>'; 
        echo '<td>' . $image            . '</td>'; 
      echo '</tr>';
    
    endforeach;
  }

}

?>