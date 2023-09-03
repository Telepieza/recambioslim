<?php
/** 
  * header.php
  * Description: header of the page
  * @Author : M.V.M.
  * @Version 1.0.0
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

$urlParent   = $urlWebClient . $pathWebClient;
$urlTemplate = $urlParent    . $pathWebTheme;

?>
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="es" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="es" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="es">
<!--<![endif]-->
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $company ; ?> - Tienda de recambios de coches online (API) </title>
  <meta name="description" content="API y microservicios de venta y distribución de recambios de coches" />
  <meta name="keywords" content="api, microservicios, recambios de coches, repuestos de coches, accesorios de coches, tienda online recambios coches" />
  <link type="text/css" rel="stylesheet" href="<?php echo $urlTemplate ?>/css/bootstrap5.min.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo $urlTemplate ?>/css/dataTables.bootstrap5.min.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo $urlTemplate ?>/css/style.css">
  <link rel="icon"      type="image/png" href="<?php echo $urlTemplate ?>/images/favicon-16x16.png" sizes="16x16" />
</head>
<header class="color-1">
