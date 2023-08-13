<?php
/** 
  * hashPWDForm.php
  * Description: hash password form
  * @Author : M.V.M
  * @Version 1.0.0
**/
    include 'inc/function.php';
    include 'inc/setting.php';

    include 'template/header.php';
    include 'template/navbar.php';
    
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
?>
  <body>
  <div class="flex-container mx-10">
    <div class="container shadow-lg mx-5 p-4">
       <div class="col-md-8">
          <div class="row">
             <div class="d-lg-flex align-items-center mb-2">
					     <a href="index.php"><img src="images/company_98x82.png" alt="" width="98" height="82"></a>
               <h1 class="text-white"><?php echo $company ; ?> BCRYPT password hash</h1>
             </div>
             <img class = "mb-3" src="images/bg_table.jpg" alt="">
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
  <?php include 'template/footer.php' ?>