<?php
/**
  * index.php
  * Description: geo_zone table index
  * @Author : M.V.M.
  * @Version 1.0.5
**/

if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;

(string) $routeAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
(string) $routeInc    = $routeAdmin.'inc'.DIRECTORY_SEPARATOR;
(string) $routeTheme  = $routeAdmin."template".DIRECTORY_SEPARATOR;

include_once $routeInc.'function.php';
include_once $routeInc.'setting.php';

include_once $routeTheme.'header.php';
include_once $routeTheme.'navbar.php';

?>
<body>
  <main class="container-fluid">
    <div class="section_item container">
        <div class="d-lg-flex align-items-center mt-4">
					<a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
          <h1 class="text-light"><?php echo $company ; ?> Recambios - Geo-zone</h1>
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
                    <td><a target="new" href="<?php echo $route;?>api/geo_zone/">geo_zone table documentation /api/geo_zone/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="geo_zoneRead.php">Desk geo_zone GET ALL /api/geo_zone</a></td>
                    <td>Desktop test geo_zone of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="geo_zoneForm.php?action=index">Desk geo_zone GET and POST /api/geo_zone</a></td>
                    <td>Desktop test form geo_zone table by ID</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="geo_zoneFormMovil.php?action=index">Mobile geo_zone GET and POST /api/geo_zone</a></td>
                    <td>Mobile test form geo_zone table by ID</td>
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
  
  <?php include_once $routeTheme.'footer.php'; ?>
