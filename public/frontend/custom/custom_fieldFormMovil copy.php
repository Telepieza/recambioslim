<?php
/**
  * custom_fieldFormMovil.php
  * Description: Mobile custom_field form
  * @Author : M.V.M.
  * @Version 1.0.10
  * --------------- Fields -----------------
  * getfieldid()  (int)    custom_field_id
  * getfield01()  (string) type
  * getfield02()  (string) value
  * getfield03()  (string) validation
  * getfield04()  (string) location
  * getfield05()  (int)    status
  * getfield06()  (int)    sort_order
**/

 if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;
 
 (string) $endpoint   = 'api/custom_field';  // endpoint custom_field
 (string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
 (string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
 (string) $ruteEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
 (string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

 include_once $ruteEntity.'custom_field.php';        // template custom_field

 $core = "readId";
 include_once $ruteInc.'core.php';

 ?>
  <body>
    <div class="container">
       <h1 class="flex-item text-white"><?php echo  $company ; ?> TEST API custom_field</h1>
       <hr>
        <div class="row m-auto">
          <main class="container-fluid">
            <div class="p-1 col-md-6 order-2 order-lg-1 bg-dark">
                <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="custom_fieldFormMovil.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
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
              
                <form method="post" action="custom_fieldFormMovil.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                onsubmit="return verifForm([<?php echo getfield01()?>,<?php echo getfield02()?>,<?php echo getfield03()?>,<?php echo getfield04()?>,<?php echo getfield05()?>,<?php echo getfield06()?>],'Error : fields marked with an asterisk are mandatory!');">

                        <div class="form-floating mb-1 w-50">
                          <input type="number" class="form-control" readonly disabled name="<?php echo getfieldid()?>" placeholder="<?php echo getfieldid()?>" value="<?php { echo $id ; } ?>"/>
                          <label for="<?php echo getfieldid()?>"><small><?php echo getfieldid()?>:</small></label>
                        </div>

                        <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield01()?>" id="<?php echo getfield01()?>" placeholder="<?php echo getfield01()?>" value="<?php if (isset($val[0][getfield01()])) {echo htmlspecialchars($val[0][getfield01()]);}?>"/>
                           <label for="<?php echo getfield01()?>">* <?php echo getfield01()?>:</label>
                       </div>

                       <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield02()?>" id="<?php echo getfield02()?>" placeholder="<?php echo getfield02()?>" value="<?php if (isset($val[0][getfield02()])) {echo htmlspecialchars($val[0][getfield02()]);}?>"/>
                           <label for="<?php echo getfield02()?>">* <?php echo getfield02()?>:</label>
                       </div>

                       <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield03()?>" id="<?php echo getfield03()?>" placeholder="<?php echo getfield03()?>" value="<?php if (isset($val[0][getfield03()])) {echo htmlspecialchars($val[0][getfield03()]);}?>"/>
                           <label for="<?php echo getfield03()?>">* <?php echo getfield03()?>:</label>
                       </div>

                       <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield04()?>" id="<?php echo getfield04()?>" placeholder="<?php echo getfield04()?>" value="<?php if (isset($val[0][getfield04()])) {echo htmlspecialchars($val[0][getfield04()]);}?>"/>
                           <label for="<?php echo getfield04()?>">* <?php echo getfield04()?>:</label>
                       </div>

                       <div class="form-floating mb-1 w-50">
                           <input type="number" class="form-control" name="<?php echo getfield05()?>" id="<?php echo getfield05()?>" min="0" placeholder="<?php echo getfield05()?>" value="<?php if (isset($val[0][getfield05()])) {echo $val[0][getfield05()];}?>"/>
                           <label for="<?php echo getfield05()?>">* <?php echo getfield05()?>:</label>
                       </div>

                       <div class="form-floating mb-1 w-50">
                           <input type="number" class="form-control" name="<?php echo getfield06()?>" id="<?php echo getfield06()?>" min="0" placeholder="<?php echo getfield06()?>" value="<?php if (isset($val[0][getfield06()])) {echo $val[0][getfield06()];}?>"/>
                           <label for="<?php echo getfield06()?>">* <?php echo getfield06()?>:</label>
                       </div>
      
                      <div class="form-floating mb-1">
                         <button class="col-lg-2 btn btn-success btn-default text-blank pe-2"><?php echo $action; ?></button>
                         <button type="button" class="col-lg-2 btn btn-success btn-info pe-2 ><a href="custom_fieldFormMovil.php?action=Cancel>Cancel</a></button>
                         <?php  if ('' != $id && $status == 200) { 
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-warning pe-24 \">
                           <a onclick=\"return confirm('Delete custom #{$id}');\" href=\"custom_fieldFormMovil.php?action=Delete&amp;id={$id}\">Delete</a>
                           </button>"; }
                          if (isset ($_SESSION['parent_PAGE']) && !empty($_SESSION['parent_PAGE'])) { $url = $_SESSION['parent_PAGE'];
                             if (isset ($_SESSION['parent_ACTION']) && !empty($_SESSION['parent_ACTION'])) { $url .= $_SESSION['parent_ACTION']; }
                          } else { $url = "index_field.php"; }
                             echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-default pe-2 \">
                             <a href=\" {$url} \">Exit</a></button></div>"; ?>
                      </div>
                </form>
                <?php if (!$isMobile) { $isMobile = true; }  ?>
                  <div class="col-md-6">
                  <?php include_once $ruteTheme.'viewMsg.php'; ?>
               </div>
            </div>
          </main>
        </div>
      </div>
      <?php include_once $ruteTheme.'footer.php'; ?>
