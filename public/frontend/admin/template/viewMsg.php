<?php
/**
  * viewMsg.php
  * Description: view message of the page
  * @Author : M.V.M.
  * @Version 1.0.0
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

if ($isMobile):?>
    <div class="form-floating my-2">
<?php else: ?>
    <div class="form-group row mb-0">
<?php endif; ?>

<label for="Alert" class="col-sm-2">&nbsp;</label>

<?php



 if ($isMobile )
 {
           if ($status == 200) { $txt = "Status : "  . $msg ; echo '<div class = "alert alert-info"    role="alert">'; }
       elseif ($status == 500) { $txt = "Error: "    . $msg ; echo '<div class = "alert alert-danger"  role="alert">'; }
       elseif ($status  > 400) { $txt = "Working : " . $msg ; echo '<div class = "alert alert-warning" role="alert">'; }
       else                     { $txt = "Info : "    . $msg ; echo '<div class = "alert alert-primary" role="alert">'; }
       echo '' != $msg ? "{$txt}" : '';
       echo "</div>";
 }
 else
 {
           if ( $action == 'login' && $status == 200)  { $txt = "Status : "  . $msg ; echo '<textarea class="form-control" rows="6" cols="140" name="token">'; }
       elseif ( $action != 'login' && $status == 200)  { $txt = "Status : "  . $msg ; echo '<div class = "alert alert-info" role="alert">'; }
       elseif ($status == 500)  { $txt = "Error: "    . $msg ; echo '<div class = "alert alert-danger" role="alert">'; }
       elseif ($status  > 400)  { $txt = "Working : " . $msg ; echo '<div class = "alert alert-warning" role="alert">'; }
       else                     { $txt = "Info : "    . $msg ; echo '<div class = "alert alert-primary" role="alert">'; }

       echo '' != $msg ? "{$txt}" : '';

       if ($action == 'login' && $status == 200) {
         echo "</textarea> ";
       } else {
         echo "</div>" ;
       }
}
 
?>
  
</div>