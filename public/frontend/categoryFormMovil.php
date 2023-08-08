<?php

 (string) $endpoint = 'api/category'; // endpoint
 include 'entity/category.php';        // structure

 include 'inc/function.php';
 include 'inc/variables.php';
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
       <h1 class="flex-item text-white"><?php echo  $company ; ?> TEST API Category</h1>
       <hr>
        <div class="row m-auto">
          <main class="container-fluid">
            <div class="p-1 col-12 col-lg-6 order-2 order-lg-1 bg-dark">
                <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="categoryFormMovil.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
                     <div class="form-group row ">
                       <div class="col-sm-2">
                         <input  type="text" class="form-control pe-3" name="id" placeholder="id" value="<?php echo $id; ?>"/> 
                       </div>
                       <button type="submit" class="col-sm-2 btn btn-success btn-secondary">Read</button>
                     </div>
                </form>
              
                <form method="post" action="categoryFormMovil.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                           onsubmit="return verifForm([column,sort_order],'Error : fields marked with an asterisk are mandatory!');">

                        <div class="form-floating mb-1 w-25">
                          <label for="category_id">Category_id:</label>
                          <input type="number"  class="form-control" readonly disabled name="category_id" placeholder="category_id" value="<?php { echo $id ; } ?>"/> 
                        </div>

                        <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="image" id="image" placeholder="image" value="<?php if (isset($val[0]['image'])) {echo htmlspecialchars($val[0]['image']);};?>"/>
                           <label for="image">* Image:</label>
                       </div>

                        <div class="form-floating mb-1 w-25">
                           <input type="number" class="form-control" name="parent_id" id="parent_id" min="1" placeholder="parent_id" value="<?php if (isset($val[0]['parent_id'])) {echo $val[0]['parent_id'];};?>"/>
                           <label for="parent_id">* Parent_id:</label>
                       </div>

                       <div class="form-floating mb-1 w-25">
                         <input type="number" class="form-control" name="top" min="0" id="top" placeholder="top" value="<?php if (isset($val[0]['top'])) {echo $val[0]['top'];};?>"/>
                         <label for="top">* Top:</label>
                        </div>
      
                      <div class="form-floating mb-1 w-25">
                        <input type="number" class="form-control" name="column" min="0" id="column" placeholder="column" value="<?php if (isset($val[0]['column'])) {echo $val[0]['column'];};?>"/>
                        <label for="column">* Column:</label>
                      </div>

                      <div class="form-floating mb-1 w-25">
                        <input type="number"  class="form-control" name="sort_order" min="0" id="sort_order" placeholder="sort_order" value="<?php if (isset($val[0]['sort_order'])) {echo $val[0]['sort_order'];};?>"/>
                        <label for="sort_order">* Sort_order:</label>
                      </div>

                      <div class="form-floating mb-1 w-25">
                        <input type="number" class="form-control" name="status" min="0" id="status" placeholder="status" value="<?php if (isset($val[0]['status'])) {echo $val[0]['status'];};?>"/>
                        <label for="status">* Status:</label>
                      </div>

                      <div class="form-floating mb-1 w-50">
                          <label for="date_added">Date addend:</label>
                         <input type="text" name="date_added"  
                         <?php if ($action != "create") {
                             echo " class =\"form-control text-white \" readonly disabled ";
                           } else { echo " class =\"form-control\" ";} ?>
                           placeholder="<?php echo $date; ?>"  value="<?php if (isset($val[0]['date_added'])) {echo $val[0]['date_added'];};?>"/>
                      </div>

                      <div class="form-floating mb-1 w-50">
                        <input type="text" name="date_modified"
                        <?php if ($action == "create") {
                              echo " class =\"form-control text-white \" readonly disabled ";
                        } else { echo " class =\"form-control\" ";} ?>
                         id = "date_modified" placeholder="<?php echo $date; ?>" size="20" value="<?php if (isset($val[0]['date_modified'])) {echo $val[0]['date_modified'];};?>"/>
                         <label for="date_modified">Date modified:</label>
                      </div>
      
                      <div class="form-floating mb-1">
                         <button class="col-lg-2 btn btn-success btn-default text-blank pe-4"><?php echo $action; ?></button>
                         <button type="button" class="col-lg-2 btn btn-success btn-info pe-4" ><a href="categoryFormMovil.php?action=Cancel">Cancel</a></button>
                         <?php  if ('' != $id && $status == 200) { 
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-warning pe-4 \">
                           <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"categoryFormMovil.php?action=Delete&amp;id={$id}\">Delete</a>
                           </button>"; } ?>
                         <?php if (isset ($_SESSION['parent_PAGE']) && isset($_SESSION['parent_ACTION'])) { 
                           $url =  $_SESSION['parent_PAGE'] . trim($_SESSION['parent_ACTION']) ;
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-default pe-4 \">
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