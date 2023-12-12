<?php
/**
  * index.php
  * Description: tax_class, tax-rate, tax.rule table index
  * @Author : M.V.M.
  * @Version 1.0.7
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
  <main class="container-fluid">tax_class
    <div class="section_item container">
       <div class="d-lg-flex align-items-center mt-4">
					<a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
          <h1 class="text-light"><?php echo $company ; ?> Recambios - tax_class,tax_rate,tax_rule</h1>
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
                    <td><a target="new" href="<?php echo $rute;?>api/tax_class/">tax_class table documentation /api/tax_class/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="tax_classRead.php">Desk tax_class GET ALL /api/tax_class</a></td>
                    <td>Desktop tax_class of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                  <td><a target="new" href="tax_classForm.php?action=index">Desk tax_class GET and POST /api/tax_class</a></td>
                    <td>Desktop test form tax_class table by ID</td>
                  </tr>
                  <tr class="table-light">
                   <td><a target="new" href="tax_classFormMovil.php?action=index">Mobile tax_class GET and POST /api/tax_class</a></td>
                   <td>Mobile test form tax_class table by ID</td>
                  </tr>

                  <tr class="table-warning">
                    <td><a target="new" href="<?php echo $rute;?>api/tax_rate/">tax_rate table documentation /api/tax_rate/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="tax_rateRead.php">Desk tax_rate GET ALL /api/tax_rate</a></td>
                    <td>Desktop tax_rate of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                  <td><a target="new" href="tax_rateForm.php?action=index">Desk tax_rate GET and POST /api/tax_rate</a></td>
                    <td>Desktop test form tax_rate table by ID</td>
                  </tr>
                  <tr class="table-light">
                   <td><a target="new" href="tax_rateFormMovil.php?action=index">Mobile tax_rate GET and POST /api/tax_rate</a></td>
                   <td>Mobile test form tax_rate table by ID</td>
                  </tr>

                  <tr class="table-warning">
                    <td><a target="new" href="<?php echo $rute;?>api/tax_rule/">tax_rule table documentation /api/tax_rule/</a></td>
                    <td>Schemas, json structure, type of data and error code</td>
                  </tr>
                  <tr class="table-light">
                  <td><a target="new" href="tax_ruleRead.php">Desk tax_rule GET ALL /api/tax_rule</a></td>
                    <td>Desktop tax_rule of all rows table form.</td>
                  </tr>
                  <tr class="table-info">
                  <td><a target="new" href="tax_ruleForm.php?action=index">Desk tax_rule GET and POST /api/tax_rule</a></td>
                    <td>Desktop test form tax_rule table by ID</td>
                  </tr>
                  <tr class="table-light">
                   <td><a target="new" href="tax_ruleFormMovil.php?action=index">Mobile tax_rule GET and POST /api/tax_rule</a></td>
                   <td>Mobile test form tax_rule table by ID</td>
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
