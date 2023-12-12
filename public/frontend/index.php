<?php
/**
  * index.php
  * Description: Homepage or index
  * @Author : M.V.M.
  * @Version 1.0.11
**/

if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;

(string) $coreDir    = dirname( __FILE__ ).DIRECTORY_SEPARATOR;
(string) $ruteAdmin  = $coreDir.'admin'.DIRECTORY_SEPARATOR;
(string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
(string) $ruteUser   = $ruteAdmin.'user'.DIRECTORY_SEPARATOR;
(string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

include $ruteInc.'function.php';
include $ruteInc.'setting.php';

include $ruteTheme.'header.php';
include $ruteTheme.'navbar.php';

?>
<body>
  <main class="container-fluid">
    <div class="section_item container">
        <div class="d-lg-flex align-items-center mt-4">
          <a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
          <h1 class="text-light"><?php echo $company ; ?> Recambios - Test endpoints</h1>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-10 col-lg-10">
            <aside class="pt-lg-2 pb-lg-2">
            <div class="table-responsive">
              <table id="tableMain" class="table table-sm table-hover">
                <thead>
                  <tr class="table-secondary">
                    <th class="text-center">URL</th>
                    <th class="text-center">Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-light">
                    <td><a target="new" href="<?php echo $route;?>api/hello">GET /hello</a></td>
                    <td>Test: {"hello":"World! from telepieza.com"}</td>
                  </tr>
                  <tr class="table-success">
                    <td><a target="new" href="<?php echo $route;?>api/hello/Telepieza">GET /hello/Telepieza</a></td>
                    <td>Test: {"hello":"Telepieza"}</td>
                  </tr>
                  <tr class="table-danger">
                    <td><a target="new" href="admin/user/login.php">Login User demo</a></td>
                    <td>Generate token with user demo</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="category/index.php">FrontEnd category table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-info">
                  <td><a target="new" href="language/index.php">FrontEnd language table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="manufacturer/index.php">FrontEnd manufacturer table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="geo_zone/index.php">FrontEnd geo-zone table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="country/index.php">FrontEnd country table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="zone/index.php">FrontEnd zone table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="location/index.php">FrontEnd location table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="tax/index.php">FrontEnd tax (class,rate,rule) table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="customer/index.php">FrontEnd Customer table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="product/index.php">FrontEnd Product table</a></td>
                    <td>Schema, Mobile and Desktop form, with GET and POST methods in API Rest with Json.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php include $ruteTheme.'footer.php' ?>
