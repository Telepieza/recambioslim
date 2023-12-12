<?php
/**
  * index.php
  * Description: product table index
  * @Author : M.V.M.
  * @Version 1.0.10
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
          <h1 class="text-light"><?php echo $company ; ?> Recambios - Product</h1>
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
                  <tr class="table-light">
                    <td><a target="index" href="index_product.php">Index product</a></td>
                    <td>Schemas, Desktop, Mobile product</td>
                  </tr>
                  <tr class="table-info">
                    <td><a target="index" href="index_store.php">Index product store</a></td>
                    <td>Schemas, Desktop, Mobile product store</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="index" href="index_attribute.php">Index product attribute</a></td>
                    <td>Schemas, Desktop, Mobile product attribute</td>
                  </tr>
                  <tr class="table-info">
                  <td><a target="index" href="index_description.php">Index product description</td>
                    <td>Schemas, Desktop, Mobile product description</td>
                  </tr>
                  <tr class="table-light">
                   <td><a target="index" href="index_related.php">Index product related</a></td>
                   <td>Schemas, Desktop, Mobile product related</td>
                  </tr>
                  <tr class="table-info">
                   <td><a target="index" href="index_layout.php">Index product layout</a></td>
                   <td>Schemas, Desktop, Mobile product layout</td>
                  </tr>
                  <tr class="table-light">
                   <td><a target="index" href="index_reward.php">Index product reward</a></td>
                   <td>Schemas, Desktop, Mobile product reward</td>
                  </tr>
                  <tr class="table-info">
                   <td><a target="index" href="index_category.php">Index product category</a></td>
                   <td>Schemas, Desktop, Mobile product category</td>
                  </tr>
                  <tr class="table-light">
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
