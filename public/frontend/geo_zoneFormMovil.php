<?php
/** 
  * geo_zoneFormMovil.php
  * Description: Mobile geo_zone form
  * @Author : M.V.M
  * @Version 1.0.0
**/
 (string) $endpoint = 'api/geo_zone'; // endpoint geo_zone
 include 'entity/geo_zone.php';       // template geo_zone

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
       <h1 class="flex-item text-white"><?php echo  $company ; ?> TEST API geo_zone</h1>
       <hr>
        <div class="row m-auto">
          <main class="container-fluid">
            <div class="p-1 col-12 col-md-6 order-2 order-lg-1 bg-dark">
                <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="geo_zoneFormMovil.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
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
              
                <form method="post" action="geo_zoneFormMovil.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                           onsubmit="return verifForm([name,description],'Error : fields marked with an asterisk are mandatory!');">

                        <div class="form-floating mb-1 w-50">
                          <input type="number"  class="form-control" readonly disabled name="geo_zone_id" placeholder="geo_zone_id" value="<?php { echo $id ; } ?>"/> 
                          <label for="geo_zone_id">Geo_zone_id:</label>
                        </div>

                        <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php if (isset($val[0]['name'])) {echo htmlspecialchars($val[0]['name']);};?>"/>
                           <label for="image">* Image:</label>
                       </div>

                        <div class="form-floating mb-1 w-50">
                           <input type="text" class="form-control" name="description" id="description" placeholder="description" value="<?php if (isset($val[0]['description'])) {echo htmlspecialchars($val[0]['description']);};?>"/>
                           <label for="description">* Description:</label>
                       </div>


                      <div class="form-floating mb-1 w-50">
                          <label for="date_added">Date addend:</label>
                         <input type="text" name="date_added"  
                         <?php if ($action != "create") {
                             echo " class =\"form-control text-white \" readonly disabled ";
                           } else { echo " class =\"form-control\" ";} ?>
                           placeholder="<?php echo $date; ?>"  value="<?php if (isset($val[0]['date_added'])) {echo $val[0]['date_added'];};?>"/>
                      </div>

                      <div class="form-floating mb-1 w-75">
                        <input type="text" name="date_modified"
                        <?php if ($action == "create") {
                              echo " class =\"form-control text-white \" readonly disabled ";
                        } else { echo " class =\"form-control\" ";} ?>
                         id = "date_modified" placeholder="<?php echo $date; ?>" size="20" value="<?php if (isset($val[0]['date_modified'])) {echo $val[0]['date_modified'];};?>"/>
                         <label for="date_modified">Date modified:</label>
                      </div>
      
                      <div class="form-floating mb-1">
                         <button class="col-lg-2 btn btn-success btn-default text-blank pe-2"><?php echo $action; ?></button>
                         <button type="button" class="col-lg-2 btn btn-success btn-info pe-2" ><a href="geo_zoneFormMovil.php?action=Cancel">Cancel</a></button>
                         <?php  if ('' != $id && $status == 200) { 
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-warning pe-2 \">
                           <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"geo_zoneFormMovil.php?action=Delete&amp;id={$id}\">Delete</a>
                           </button>"; } ?>
                         <?php if (isset ($_SESSION['parent_PAGE']) && isset($_SESSION['parent_ACTION'])) { 
                           $url =  $_SESSION['parent_PAGE'] . trim($_SESSION['parent_ACTION']) ;
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-default pe-2 \">
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