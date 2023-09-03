<?php
/** 
  * navbar.php
  * Description: navbar of the page
  * @Author : M.V.M.
  * @Version 1.0.0
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

$urlParent   = $urlWebClient . $pathWebClient;
$urlTemplate = $urlParent    . $pathWebTheme;
$urlUser     = $urlParent    . $pathWebUser;

?>
<div class="navegacion mt-3 py-1">
   <div class="col-md-8">
        <nav class="navbar nav-principal navbar-expand-lg navbar navbar-expand-md navbar-light bg-faded px-lg-5 py-lg-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Menu">
			            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
			      	       <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
			           </svg>
		        </button>          
            <a href="index.php" class="navbar-brand d-md-none">Telepieza</a>
            <div class="container">
              <div class="collapse navbar-collapse" id="nav_principal">
                  <ul class="nav navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll " >  
                      <li class="nav-item">
                        <a href="<?php echo $urlTemplate ?>/index.php" class="nav-link">Home</a>
                      </li>
                      <li class="nav-item">
                        <a href="https://www.telepieza.com/wordpress/index.php" class="nav-link" target="_blank">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a href="https://www.telepieza.com/recambios/index.php?route=common/home" class="nav-link" target="_blank">Tienda Recambios</a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $route;?>api/helper" class="nav-link">Helper</a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $urlUser ?>/checkJWTForm.php" class="nav-link" target="_blank">Check Token</a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $urlUser ?>/hashPWDForm.php"  class="nav-link" target="_blank">Hash PWD</a>
                      </li>
                  </ul>
                  <div class="d-flex">
                      <ul class="nav navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                          <li class="nav-item"><a href="<?php echo $urlUser ?>/login.php"  class="nav-link" target="_blank">Login</a></li>
                          <li class="nav-item"><a href="<?php echo $urlUser ?>/logout.php" class="nav-link" target="_blank">Sign-Up</a></li>
                      </ul>
                  </div>
              </div>
            </div>
        </nav>
    </div>
</div>
