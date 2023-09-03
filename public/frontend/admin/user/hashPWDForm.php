<?php
/**
  * hashPWDForm.php
  * Description: hash password form
  * @Author : M.V.M.
  * @Version 1.0.5
**/

  if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;

    (string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR;
    (string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
    (string) $rutaEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
    (string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

    include_once $ruteInc.'function.php';
    include_once $ruteInc.'setting.php';
    include_once $ruteTheme.'header.php';
    include_once $ruteTheme.'navbar.php';

  $password = (isset($_POST['password'])) ? $_POST['password'] : '';
?>
  <body>
  <div class="flex-container mx-10">
    <div class="container shadow-lg mx-5 p-4">
       <div class="col-md-8">
          <div class="row">
             <div class="d-lg-flex align-items-center mb-2">
					     <a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
               <h1 class="text-white"><?php echo $company ; ?> BCRYPT password hash</h1>
             </div>
             <img class = "mb-3" src="<?php echo $urlTemplate ?>/images/bg_table.jpg" alt="">
          </div>
       </div>
       <div class="row">
          <div class="col-md-8 p-4">
            <form method="post" action="hashPWDForm.php" onsubmit="return verifForm([password],'Error : fields marked with an asterisk are mandatory!');">
              <label class="form-label">* Password:</label>
              <input class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Password">
              <label class="form-label">Password hash:</label>
              <textarea class="form-control" rows="5" cols="110" name="passwordh" placeholder="Password hash"><?php if ('' != $password) {echo password_hash(htmlspecialchars(strip_tags($password)), PASSWORD_BCRYPT);}?></textarea>
              <div class="mt-3">
                 <button class="btn btn-primary px-4">Hash</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
  <?php include_once $ruteTheme.'footer.php'; ?>