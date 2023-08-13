<?php
/** 
  * navbar.php
  * Description: navbar of the page
  * @Author : M.V.M
  * @Version 1.0.0
**/
?>
<div class="container-fluid position-relative p-0"> 
  <div class="row">
     <div class="col-md-8">
          <nav class="navbar nav-principal navbar-expand-lg navbar navbar-expand-md navbar-light bg-faded px-lg-5 py-lg-0">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Menu">
			            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
			      	    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
			           </svg>
		          </button>
              <div class="container">
                  <div class="collapse navbar-collapse" id="nav_principal">
                      <ul class="nav navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll " >
                          <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                          </li>
                          <li class="nav-item">
                            <a href="https://www.telepieza.com/wordpress/index.php" class="nav-link" target="_blank">Blog</a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo $route;?>api/helper" class="nav-link">Helper</a>
                          </li>
                          <li class="nav-item">
                            <a href="checkJWTForm.php" class="nav-link" target="_blank">Check Token</a>
                          </li>
                          <li class="nav-item">
                            <a href="hashPWDForm.php"  class="nav-link" target="_blank">Hash PWD</a>
                          </li>
                      </ul>
                      <div class="d-flex">
                         <ul class="nav navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                            <li class="nav-item"><a href="login.php"  class="nav-link" target="_blank">Login</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link" target="_blank">Sign-Up</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </nav>
      </div>
  </div>
</div>

<div class="collapse navbar-collapse" id="navbarCollapse">
	<div class="navbar-nav ms-auto py-0">
		Link para Moviles
	</div>
</div>
