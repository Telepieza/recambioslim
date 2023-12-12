<?php
/**
  * index.php
  * Description: manufacturer table index
  * @Author : M.V.M.
  * @Version 1.0.5
**/

if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;

(string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
(string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
(string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

include_once $ruteInc.'function.php';
include_once $ruteInc.'setting.php';

include_once $ruteTheme.'header.php';
include_once $ruteTheme.'navbar.php';

?>
<body>
  <main class="container-fluid">
    <div class="section_item container">
        <div class="d-lg-flex align-items-center mt-4">
					<a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
          <h1 class="text-light"><?php echo $company ; ?> Recambios - Manufacturer</h1>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-10 col-lg-10">
            <aside class="pt-lg-2 pb-lg-2">  
            <div class="table-responsive">
              <table id="tableMain" class="table table-sm table-hover table-striped table-bordered table-condensed m-0">
                <thead>
                  <tr class="table-secondary">
                    <th class="text-center">URL</th>
                    <th class="text-center">Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-danger">
                    <td><a target="new" href="../admin/user/login.php">Login User demo</a></td>
                    <td>Generate token with user demo</td>
                  </tr>
                  <tr class="table-warning">
                    <td><a target="new" href="<?php echo $rute;?>api/manufacturer/">Manufacturer table documentation /api/manufacturer/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="manufacturerRead.php">Desk manufacturer GET ALL /api/manufacturer</a></td>
                    <td>Desktop test manufacturer of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="manufacturerForm.php?action=index">Desk manufacturer GET and POST /api/manufacturer</a></td>
                    <td>Desktop test form manufacturer table by ID</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="manufacturerFormMovil.php?action=index">Mobile manufacturer GET and POST /api/manufacturer</a></td>
                    <td>Mobile test form manufacturer table by ID</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="../index.php">Home Api Rest demo</a></td>
                    <td>Telepieza Recambios - Test endpoints</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php include_once $ruteTheme.'footer.php'; ?>
