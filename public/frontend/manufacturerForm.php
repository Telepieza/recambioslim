<?php
/** 
  * manufacturerForm.php
  * Description: Desktop manufacturer form
  * @Author : M.V.M
  * @Version 1.0.0
**/
  (string) $endpoint = 'api/manufacturer'; // endpoint manufacturer
  include 'entity/manufacturer.php';       // template  manufacturer

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
     <div class="flex-container mx-10">
        <div class="container shadow-lg mx-5 p-4">
          <div class="col-md-8">
            <div class="row">
              <div class="d-lg-flex align-items-center mb-2">
					       <a href="index.php"><img src="images/company_98x82.png" alt="" width="98" height="82"></a>
                 <h1 class="text-white"><?php echo $company ; ?> TEST API Manufacturer</h1>
               </div>
               <img class = "mb-3" src="images/bg_table.jpg" alt="">
             </div>
          </div>

        <div class="row">
          <main class="container-fluid">
            <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="manufacturerForm.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
              <div class="form-group row">
                <label for="id" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">* Id:</label> 
                <div class="col-sm-2">
                  <input  type="text" class="form-control pe-3" name="id" placeholder="id" value="<?php echo $id; ?>"/> 
                </diV>
                <button type="submit" class="col-sm-2 btn btn-success btn-secondary">Read</button>
              </div>
            </form>

            <form class="form-horizontal mb-2" method="post" action="manufacturerForm.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                        onsubmit="return verifForm([name,sort_order],'Error : fields marked with an asterisk are mandatory!');">

              <div class="form-group row mb-2">
                <label for="manufacturer_id" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">manufacturer_id:</label>
                <div class="col-sm-2">
                   <input type="number"  class="form-control text-white bg-transparent" readonly disabled name="manufacturer_id" placeholder="manufacturer_id" value="<?php { echo $id ; } ?>"/> 
                </div>
              </div>
    
              <div class="form-group row mb-1">
               <label for="name"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* Name:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="name" placeholder="name" value="<?php if (isset($val[0]['name'])) {echo htmlspecialchars($val[0]['name']);};?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="image"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">Image:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="image" placeholder="image" value="<?php if (isset($val[0]['image'])) {echo htmlspecialchars($val[0]['image']);};?>"/>
                </div>
              </div>
              
              <div class="form-group row mb-1">
                <label for="sort_order"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* Sort_order:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="sort_order" min="0" placeholder="sort_order" value="<?php if (isset($val[0]['sort_order'])) {echo $val[0]['sort_order'];};?>"/>
                </div>
              </div>
      
              <div class="form-group row mb-0 pe-4">
                <label for="label" class="col-sm-2">&nbsp;</label>
                <div class="col-sm-2">
                  <button class="col-lg-8 btn btn-success btn-default text-blank pe-4"><?php echo $action; ?></button>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="col-lg-8 btn btn-success btn-info pe-4" ><a href="manufacturerForm.php?action=Cancel">Cancel</a></button>
                </div>

                <?php  if ('' != $id && $status == 200) { 
                  echo "<div class=\"col-sm-2\">
                      <button type=\"button\" class=\"col-lg-8 btn btn-success text-danger btn-warning pe-4 \">
                      <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"manufacturerForm.php?action=Delete&amp;id={$id}\">Delete</a>
                      </button></div>"; } ?>
                
                <?php  if (isset ($_SESSION['parent_PAGE']) && isset($_SESSION['parent_ACTION'])) { 
                  $url =  $_SESSION['parent_PAGE'] . trim($_SESSION['parent_ACTION']) ;
                  echo "<div class=\"col-sm-2\">
                     <button type=\"button\" class=\"col-lg-8 btn btn-success btn-default pe-4 \">
                     <a href=\" {$url} \">Salir</a></button></div>"; } ?>
              
              </div>
            </form>
            <div class="col-md-8">
                <?php include 'template/viewMsg.php'; ?>
            </div>
          </main>
        </div>
      </div>
   </div>

  <?php include 'template/footer.php' ?>