<?php
/**
  * countryRead.php
  * Description: Read all language with datatable
  * @Author : M.V.M.
  * @Version 1.0.17
  * --------------- Fields -----------------
  *  getfieldid() (int)    country_id
  *  getfield01() (string) name
  *  getfield02() (string) iso_code_2
  *  getfield03() (string) iso_code_3
  *  getfield04() (string) address_format
  *  getfield05() (int)    postcode_required
  *  getfield06() (int)    status
**/

if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;

(string) $endpoint   = 'api/country';  // endpoint country
(string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
(string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
(string) $rutaEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
(string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

include_once $rutaEntity.'country.php';      //template  country

$core = "";
include $ruteInc.'core.php';

$pageParent  = 'countryRead.php';       // read all
if ($isMobile) {
  $pageCreate = 'countryFormMovil.php'; // read id Mobile
 } else {
  $pageCreate = 'countryForm.php';      // read id Desktop
}

$core = "readAll";
include $ruteInc.'core.php';
  
?>

<body>
  <div class="flex-container mx-10">
    <div class="section_item container shadow-lg mx-5 p-4">
      <div class="col-md-12">
        <div class="row">
           <div class="d-lg-flex align-items-center mb-2">
               <a href="index.php"><img src="<?php echo $ruteTheme ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
               <h1 class="text-white"><?php echo $company ; ?> TEST API Country</h1>
            </div>
            <img class = "mb-3" src="<?php echo $ruteTheme ?>/images/bg_table.jpg" alt="">
        </div>
      </div>

      <div class="row">
        <div class="container-fluid">
          <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="countryRead.php?action=Pagination" onsubmit="return verifForm([offset,limit],'Error : fields marked with an asterisk are mandatory!');">
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
                <button type="button" class="col-sm-4 ms-3 btn btn-info" ><a href="<?php echo $pageCreate; ?>" target="_blank" >Create</a></button>
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
        <div class="col-log-12 col-mod-10 col-mod-8 col-mod-6">
          <div class="table-responsive">
             <?php if (is_array($data) && count($data) > 0):?>
               <table id="tableSimple" class="table table-sm table-hover table-striped table-bordered table-condensed" style="width:100%" >
             <?php else: ?>
               <table id="tableNoData" class="table table-sm table-striped table-bordered" style="width:100%" >
             <?php endif; ?>
           
              <?php echo viewTableThead($data); ?>
              <tbody>
                 <?php viewTableRows($data, $pageAction); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-md-10 col-md-8 col-mod-6">
         <?php include_once $ruteTheme.'viewMsg.php'; ?>
      </div>
      
    </div>
  </div>
  
  <?php include_once $ruteTheme.'footer.php'; ?>

