<?php
/**
  * login.php
  * Description: Login form
  * @Author : M.V.M.
  * @Version 1.0.0
**/

if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;

(string) $endpoint   = 'api/users';  // endpoint users

(string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR;
(string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
(string) $rutaEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
(string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;


include_once $rutaEntity.'login.php';        // template login

include_once $ruteInc.'function.php';
include_once $ruteInc.'setting.php';
include_once $ruteInc.'getAction.php';


if (!empty($jwt))
{
  $status = 200;
  $msg  = ". Token: " . "\n" .$jwt;
  if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = $jwt;
  }
}

include_once $ruteInc.'login.php';

if (empty($msg)) {
  $msg = 'Input User, Email and Password';
}

include_once $ruteTheme.'header.php';
include_once $ruteTheme.'navbar.php';

?>
  <body>
      <div class="flex-container">
        <div class="container mx-5 p-4">
          <div class="col-md-8">
            <div class="row">
              <div class="d-lg-flex align-items-center mb-2">
						     <a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
                 <h1 class="text-light"><?php echo $company ; ?> API - Login</h1>
              </div>
              <img class = "mb-3" src="<?php echo $urlTemplate ?>/images/bg_table.jpg" alt="">
              <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="login.php?action=login" onsubmit="verifForm([name,email,password],'Error : fields marked with an asterisk are mandatory!') && validateEmail(email,'Error : email format invalid!');">
                  <label class="form-label" for="name">* User:</label><br>
                  <div class="form-control input-group w-75 mb-2">
                    <span class="input-group-text" id="basic-addon1">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                      </svg>
                    </span>
                    <input type="text" class="form-control" required name="name" placeholder="name" value="demo"><br/>
                  </div>
                  <label class="form-label" for="email">* Email:</label> 
                  <div class="form-control input-group w-75 mb-2">
                    <span class="input-group-text" id="basic-addon2">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                      </svg>
                    </span>
                    <input type="text"  class="form-control" required name="email" placeholder="email" value="demo@telepieza.com"/><br/>
                  </div>
                  <label class="form-label" for="password">* Password:</label>
                  <div class="form-control input-group w-75 mb-3">
                    <span class="input-group-text" id="basic-addon3">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm.5 7.415a1.5 1.5 0 1 0-1 0l-.385 1.99a.5.5 0 0 0 .491.595h.788a.5.5 0 0 0 .49-.595L8.5 7.915z"/>
                      </svg>
                    </span>
                    <input type="password" class="form-control" required name="password" placeholder="password" value="telepieza" />
                  </div>
                  <button class="btn btn-primary px-4 me-2 text-center"><b>Login</b></button>
              </form>
                <?php include_once $ruteTheme.DIRECTORY_SEPARATOR.'viewMsg.php'; ?>
            </div>
          </div>
      </div>
    </div>
                  
    <?php include_once $ruteTheme.DIRECTORY_SEPARATOR.'footer.php'; ?>
