<?php
/** 
  * index.php
  * Description: Homepage or index
  * @Author : M.V.M
  * @Version 1.0.0
**/
include 'inc/function.php';
include 'inc/setting.php';

include 'template/header.php';
include 'template/navbar.php';
?>
<body>
  <main class="container-fluid">
    <div class="section_item container">
        <h1 class="text-center"><?php echo $company ; ?> Recambios - Test endpoints</h1>
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
                  <tr class="table-light">
                    <td><a target="new" href="<?php echo $route;?>api/hello">GET /hello</a></td>
                    <td>Test: {"hello":"World! from telepieza.com"}</td>
                  </tr>
                  <tr class="table-success">
                    <td><a target="new" href="<?php echo $route;?>api/hello/Telepieza">GET /hello/Telepieza</a></td>
                    <td>Test: {"hello":"Telepieza"}</td>
                  </tr>
                  <tr class="table-warning">
                    <td><a target="new" href="<?php echo $route;?>api/category/">Category table documentation /api/category/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="categoryRead.php">Desk category GET ALL /api/category</a></td>
                    <td>Desktop category of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                  <td><a target="new" href="categoryForm.php">Desk category GET and POST /api/category</a></td>
                    <td>Desktop test form category table by ID</td>
                  </tr>
                  <tr class="table-light">
                   <td><a target="new" href="categoryFormMovil.php">Mobile category GET and POST /api/category</a></td>
                   <td>Mobile test form category table by ID</td>
                  </tr>
                  <tr class="table-warning">
                    <td><a target="new" href="<?php echo $route;?>api/language/">Language table documentation /api/language/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="languageRead.php">Desk language GET ALL /api/language</a></td>
                    <td>Desktop language of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="languageForm.php">Desk language GET and POST /api/language</a></td>
                    <td>Desktop test form language table by ID</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="languageFormMovil.php">Mobile language GET and POST /api/language</a></td>
                    <td>Mobile test form language table by ID</td>
                  </tr>
                  <tr class="table-warning">
                    <td><a target="new" href="<?php echo $route;?>api/manufacturer/">Manufacturer table documentation /api/manufacturer/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="manufacturerRead.php">Desk manufacturer GET ALL /api/manufacturer</a></td>
                    <td>Desktop test manufacturer of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="new" href="manufacturerForm.php">Desk manufacturer GET and POST /api/manufacturer</a></td>
                    <td>Desktop test form manufacturer table by ID</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="manufacturerFormMovil.php">Mobile manufacturer GET and POST /api/manufacturer</a></td>
                    <td>Mobile test form manufacturer table by ID</td>
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
                    <td><a target="new" href="geo_zoneForm.php">Desk geo_zone GET and POST /api/geo_zone</a></td>
                    <td>Desktop test form geo_zone table by ID</td>
                  </tr>
                  <tr class="table-light">
                    <td><a target="new" href="geo_zoneFormMovil.php">Mobile geo_zone GET and POST /api/geo_zone</a></td>
                    <td>Mobile test form geo_zone table by ID</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php include 'template/footer.php' ?>
