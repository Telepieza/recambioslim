<?php
/**
  * index.php
  * Description: custom table index
  * @Author : M.V.M.
  * @Version 1.0.10
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
          <h1 class="text-light"><?php echo $company ; ?> Recambios - custom_activity</h1>
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
                  <tr class="table-info">
                    <td><a target="index" href="index_fieldy.php">Index custom field</a></td>
                    <td>Schemas, Desktop, Mobile custom field</td>
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
