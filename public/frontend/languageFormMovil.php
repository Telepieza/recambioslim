<?php
/** 
  * languageFormMovil.php
  * Description: Mobile language form
  * @Author : M.V.M
  * @Version 1.0.0
**/
 (string) $endpoint = 'api/language'; // endpoint language
 include 'entity/language.php';       // template language

 include 'inc/function.php';
 include 'inc/setting.php';
 include 'inc/getAction.php';
 
 include 'inc/create.php';
 include 'inc/update.php';
 include 'inc/delete.php';
 include 'inc/readId.php';

 include 'inc/action.php';

 include 'template/header.php';
 include 'template/navbar.php';

 ?>
  <body>
    <div class="container">
       <h1 class="flex-item text-white"><?php echo $company ; ?> TEST API language</h1>
       <hr>
        <div class="row m-auto">
          <main class="container-fluid">
            <div class="p-1 col-md-6 order-2 order-lg-1 bg-dark">
                <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="languageFormMovil.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-3 w-75">
                        <input  type="text" class="form-control pe-3" name="id" placeholder="id" value="<?php echo $id; ?>"/> 
                      </div>
                      <div class="col-sm-3 w-25">
                        <button type="submit" class="btn btn-success btn-secondary">Read</button>
                      </div>
                    </div>
                  </div>
                </form>
              
                <form method="post" action="languageFormMovil.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                           onsubmit="return verifForm([name,code,locale,directory,sort_order],'Error : fields marked with an asterisk are mandatory!');">

                        <div class="form-floating mb-1 w-50">
                          <input type="number" class="text-right form-control" readonly disabled name="language_id" placeholder="language_id" value="<?php { echo $id ; } ?>"/> 
                          <label for="language_id">Language_id:</small></label>
                        </div>   
                        <div class="form-floating mb-1">
                          <input type="text" class="text-right form-control" name="name" id="name" placeholder="name" value="<?php if (isset($val[0]['name'])) {echo htmlspecialchars($val[0]['name']);};?>"/>
                          <label for="name">* Name:</label>
                        </div>

                        <div class="form-floating mb-1">
                          <input type="text" class="text-right form-control" name="code" id="code" placeholder="code" value="<?php if (isset($val[0]['code'])) {echo htmlspecialchars($val[0]['code']);};?>"/>
                          <label for="code">* Code:</label>
                        </div>

                        <div class="form-floating mb-1">
                          <input type="text" class="text-right form-control" name="locale" id="locale" placeholder="locale" value="<?php if (isset($val[0]['locale'])) {echo htmlspecialchars($val[0]['locale']);};?>"/>
                          <label for="locale">* Locale:</label>
                        </div>

                        <div class="form-floating mb-1">
                          <input type="text" class="text-right form-control" name="image" id="image" placeholder="image" value="<?php if (isset($val[0]['image'])) {echo htmlspecialchars($val[0]['image']);};?>"/>
                          <label for="image">Image:</label>
                        </div>

                        <div class="form-floating mb-1">
                          <input type="text" class="text-right form-control" name="directory" id="directory" placeholder="directory" value="<?php if (isset($val[0]['directory'])) {echo htmlspecialchars($val[0]['directory']);};?>"/>
                          <label for="directory">* Directory:</label>
                        </div>

                        <div class="form-floating mb-1 w-50">
                          <input type="number"  class="form-control" name="sort_order" min="0" id="sort_order" placeholder="sort_order" value="<?php if (isset($val[0]['sort_order'])) {echo $val[0]['sort_order'];};?>"/>
                          <label for="sort_order">* Sort_order:</label>
                        </div>

                        <div class="form-floating mb-1 w-50">
                          <input type="number" class="form-control" name="status" min="0" id="status" placeholder="status" value="<?php if (isset($val[0]['status'])) {echo $val[0]['status'];};?>"/>
                          <label for="status">* Status:</label>
                        </div>
      
                      <div class="form-floating mb-1">
                         <button class="col-lg-2 btn btn-success btn-default text-blank pe-3"><?php echo $action; ?></button>
                         <button type="button" class="col-lg-2 btn btn-success btn-info pe-3" ><a href="languageFormMovil.php?action=Cancel">Cancel</a></button>
                         <?php  if ('' != $id && $status == 200) { 
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-warning pe-3 \">
                           <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"languageFormMovil.php?action=Delete&amp;id={$id}\">Delete</a>
                           </button>"; } ?>

                         <?php if (isset ($_SESSION['parent_PAGE']) && isset($_SESSION['parent_ACTION'])) { 
                           $url =  $_SESSION['parent_PAGE'] . trim($_SESSION['parent_ACTION']) ;
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-default pe-3 \">
                           <a href=\" {$url} \">Salir</a></button></div>"; } ?>
                      </div>

                </form>
                <?php if (!$isMobile) { $isMobile = true; }  ?>  
                  <div class="col-md-6">
                  <?php include 'template/viewMsg.php'; ?>
               </div>
            </div>
          </main>
        </div>
      </div>
      <?php include 'template/footer.php' ?>