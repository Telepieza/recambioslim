<?php
/**
  * zoneFormMovil.php
  * Description: Mobile zone form
  * @Author : M.V.M.
  * @Version 1.0.5
  * ------------------- fields ------------------------------
  * getfieldid() (int)    zone_id
  * getfield01() (int)    country_id
  * getfield02() (string) name
  * getfield03() (string) code
  * getfield04() (int)    status
**/

if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;

(string) $endpoint   = 'api/zone';  // zone
(string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
(string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
(string) $rutaEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
(string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

 include_once $rutaEntity.DIRECTORY_SEPARATOR.'zone.php';        // zone

 include_once $ruteInc.DIRECTORY_SEPARATOR.'function.php';
 include_once $ruteInc.DIRECTORY_SEPARATOR.'setting.php';
 include_once $ruteInc.DIRECTORY_SEPARATOR.'getAction.php';
 include_once $ruteInc.DIRECTORY_SEPARATOR.'create.php';
 include_once $ruteInc.DIRECTORY_SEPARATOR.'update.php';
 include_once $ruteInc.DIRECTORY_SEPARATOR.'delete.php';
 include_once $ruteInc.DIRECTORY_SEPARATOR.'readId.php';
 include_once $ruteInc.DIRECTORY_SEPARATOR.'action.php';
 
 include_once $ruteTheme.DIRECTORY_SEPARATOR.'header.php';
 include_once $ruteTheme.DIRECTORY_SEPARATOR.'navbar.php';

 ?>
  <body>
    <div class="container">
       <h1 class="flex-item text-white"><?php echo $company ; ?> TEST API zone</h1>
       <hr>
        <div class="row m-auto">
          <main class="container-fluid">
            <div class="p-1 col-12 col-md-6 order-2 order-lg-1 bg-dark">
                <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="zoneFormMovil.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
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

                <form method="post" action="zoneFormMovil.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                      onsubmit="return verifForm([<?php echo getfield01()?>,<?php echo getfield02()?>,<?php echo getfield03()?>],'Error : fields marked with an asterisk are mandatory!');">

                        <div class="form-floating mb-1 w-50">
                          <input type="number" class="form-control" readonly disabled name="<?php echo getfieldid()?>" placeholder="<?php echo getfieldid()?>" value="<?php { echo $id ; } ?>"/>
                          <label for="<?php echo getfieldid()?>"><?php echo getfieldid() ?>:</label>
                        </div>
                        
                        <div class="form-floating mb-1 w-50">
                          <input type="number" class="form-control" name="<?php getfield01()?>" min="0" id="<?php echo getfield01()?>" placeholder="<?php echo getfield01()?>" value="<?php if (isset($val[0][getfield01()])) {echo $val[0][getfield01()];}?>"/>
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

                        <div class="form-floating mb-1 w-50">
                          <input type="number" class="form-control" name="<?php getfield04()?>" min="0" id="<?php echo getfield04()?>" placeholder="<?php echo getfield04()?>" value="<?php if (isset($val[0][getfield04()])) {echo $val[0][getfield04()];}?>"/>
                          <label for="<?php echo getfield04()?>"><?php echo getfield04()?>:</label>
                        </div>
      
                      <div class="form-floating mb-1">
                         <button class="col-lg-2 btn btn-success btn-default text-blank pe-3"><?php echo $action; ?></button>
                         <button type="button" class="col-lg-2 btn btn-success btn-info pe-3" ><a href="zoneFormMovil.php?action=Cancel">Cancel</a></button>
                         <?php  if ('' != $id && $status == 200) {
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-warning pe-3 \">
                           <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"zoneFormMovil.php?action=Delete&amp;id={$id}\">Delete</a>
                           </button>"; }
                           if (isset ($_SESSION['parent_PAGE']) && !empty($_SESSION['parent_PAGE'])) { $url = $_SESSION['parent_PAGE'];
                             if (isset ($_SESSION['parent_ACTION']) && !empty($_SESSION['parent_ACTION'])) { $url .= $_SESSION['parent_ACTION']; }
                           } else { $url = "index.php"; }
                             echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-default pe-2 \">
                                  <a href=\" {$url} \">Exit</a></button></div>"; ?>
                      </div>
                </form>
                <?php if (!$isMobile) { $isMobile = true; }  ?>  
                  <div class="col-md-6">
                    <?php include_once $ruteTheme.DIRECTORY_SEPARATOR.'viewMsg.php'; ?>
               </div>
            </div>
          </main>
        </div>
      </div>
      <?php include_once $ruteTheme.DIRECTORY_SEPARATOR.'footer.php'; ?>

