<?php

(string) $endpoint = 'api/manufacturer'; // endpoint
include 'entity/manufacturer.php';       // structure

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
       <h1 class="flex-item text-white"><?php echo $company ; ?> TEST API manufacturer</h1>
       <hr>
        <div class="row m-auto">
          <main class="container-fluid">
            <div class="p-1 col-12 col-lg-6 order-2 order-lg-1 bg-dark">
                <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="manufacturerFormMovil.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
                     <div class="form-group row ">
                       <div class="col-sm-2">
                         <input  type="text" class="form-control pe-3" name="id" placeholder="id" value="<?php echo $id; ?>"/> 
                       </div>
                       <button type="submit" class="col-sm-2 btn btn-success btn-secondary">Read</button>
                     </div>
                </form>

                <form method="post" action="manufacturerFormMovil.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                           onsubmit="return verifForm([name,sort_order],'Error : fields marked with an asterisk are mandatory!');">

                        <div class="form-floating mb-1 w-25">
                          <label for="manufacturer_id">manufacturer_id:</label>
                          <input type="number"  class="form-control" readonly disabled name="manufacturer_id" placeholder="manufacturer_id" value="<?php { echo $id ; } ?>"/> 
                        </div>
    
                        <div class="form-floating mb-1">
                          <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php if (isset($val[0]['name'])) {echo htmlspecialchars($val[0]['name']);};?>"/>
                          <label for="name">* Name:</label>
                        </div>

                        <div class="form-floating mb-1">
                          <input type="text" class="form-control" name="image" id="image" placeholder="image" value="<?php if (isset($val[0]['image'])) {echo htmlspecialchars($val[0]['image']);};?>"/>
                          <label for="image">Image:</label>
                        </div>

                        <div class="form-floating mb-1 w-25">
                          <input type="number"  class="form-control" name="sort_order" min="0" id="sort_order" placeholder="sort_order" value="<?php if (isset($val[0]['sort_order'])) {echo $val[0]['sort_order'];};?>"/>
                          <label for="sort_order">* Sort_order:</label>
                        </div>
      
                      <div class="form-floating mb-1">
                         <button class="col-lg-2 btn btn-success btn-default text-blank pe-4"><?php echo $action; ?></button>
                         <button type="button" class="col-lg-2 btn btn-success btn-info pe-4" ><a href="manufacturerFormMovil.php?action=Cancel">Cancel</a></button>
                         <?php  if ('' != $id && $status == 200) { 
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-warning pe-4 \">
                           <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"manufacturerFormMovil.php?action=Delete&amp;id={$id}\">Delete</a>
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
