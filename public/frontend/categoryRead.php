<?php
/** 
  * categoryRead.php
  * Description: Read all categories with datatable
  * @Author : M.V.M
  * @Version 1.0.0
**/
(string) $endpoint = 'api/category';  // endpoint category
include 'entity/category.php';        // template category

include 'inc/function.php';
include 'inc/setting.php';

$pageParent  = 'categoryRead.php';
if ($isMobile) { 
  $pageCreate = 'categoryFormMovil.php';     // read id Mobile
 } else { 
  $pageCreate = 'categoryForm.php';           // read id Desktop
}

$urlParent   = $urlWebClient . $pathWebClient.            // https://www.telepieza.com/recambios/frontend/
$pageAction  = $urlParent . $pageCreate . $actionReadId ; // https://www.telepieza.com/recambios/frontend/categoryForm.php?action=Read&id=
$pageCreate .= $actionCreate;                             // categoryForm.php?action=create
$urlParent  .= $pageParent ;                              // https://www.telepieza.com/recambios/frontend/categoryRead.php

include 'inc/getAction.php';

include 'inc/readAll.php';

include 'template/header.php';
include 'template/navbar.php';
  
?>

<body>
  <div class="flex-container mx-10">
    <div class="section_item container shadow-lg mx-5 p-4">
      <div class="col-md-12">
        <div class="row">
           <div class="d-lg-flex align-items-center mb-2">
					     <a href="index.php"><img src="images/company_98x82.png" alt="" width="98" height="82"></a>
               <h1 class="text-white"><?php echo $company ; ?> TEST API Category</h1>
            </div>
            <img class = "mb-3" src="images/bg_table.jpg" alt="">
        </div>
      </div>

      <div class="row">
        <div class="container-fluid">
          <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="categoryRead.php?action=Pagination" onsubmit="return verifForm([offset,limit],'Error : fields marked with an asterisk are mandatory!');">
            <div class="form-group row">
              <label for="limit" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">limit:</label> 
              <div class="col-sm-2">
                <input type="number" class="form-control pe-3" name="limit" placeholder="limit" value="<?php echo $limit; ?>"/> 
              </div>
              <label for="offset" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">offset:</label> 
              <div class="col-sm-2">
                <input type="number" class="form-control pe-3" name="offset" placeholder="offset" value="<?php echo $offset; ?>"/> 
              </div>
              <div class="col-sm-4">
                <button type="submit" class="col-sm-4 btn btn-success ">Pagination</button>
                <button type="button" class="col-sm-4 ms-3 btn btn-info" ><a href="<?php echo $pageCreate; ?>" target="_blank">Create</a></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="form-group row mb-2">
        <label for="CurrentPage" class="col-sm-2 d-flex justify-content-end align-items-center ">CurrentPage:</label> 
        <div class="col-sm-2">
          <input type="number" class="form-control pe-3" name="CurrentPage" readonly disabled placeholder="CurrentPage" value="<?php echo $currentPage; ?>"/>     
        </div>
        <label for="CountRows" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">CountRows:</label> 
          <div class="col-sm-2">
            <input type="number" class="form-control pe-3" name="countPage" readonly disabled placeholder="countRows" value="<?php echo $countRows; ?>"/> 
          </div>
          <label for="TotalLimit" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">TotalLimit:</label> 
          <div class="col-sm-2">
            <input type="number" class="form-control pe-3" name="totalLimit" readonly disabled placeholder="totalLimit" value="<?php echo $totalLimit; ?>"/> 
          </div>
      </div>
      <hr>
        
      <div class="row">
        <div class="col-log-12">
           <?php if (is_array($data) && count($data) > 0):?>
             <table id="tableSimple" class="table table-hover table-striped table-bordered table-condensed" style="width:100%" >                           
           <?php else: ?>
             <table id="tableNoData" class="table table-striped table-bordered" style="width:100%" >
           <?php endif; ?>
           
            <?php echo viewTableThead($data); ?>
            <tbody>
               <?php viewTableRows($data, $pageAction); ?>
            </tbody>
          </table>
        </div>
      </div>

      <?php

      if (!is_array($data) && !empty($data) && isset($error) && !empty($error)) {
         echo '<div class="row">
                 <div class="col d-flex justify-content-center">
                   <div class="alert alert-success" role="alert">' . $error . '</div>
                 </div>
               </div>';
      } ?>

    </div>
  </div>
  
  <?php include 'template/footer.php' ?>
