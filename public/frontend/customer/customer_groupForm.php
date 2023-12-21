<?php
/**
  * customer_groupForm.php
  * Description: Deskdata customer_groupform
  * @Author : M.V.M.
  * @Version 1.0.17
  * --------------- Fields -----------------
  * getfieldid()  (int)    customer_group_id
  * getfield01()  (int)    customer_id
  * getfield02()  (string) type
  * getfield03()  (string) date_added
**/

 if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;
 
 (string) $endpoint   = 'api/customer_group';  // endpoint customer_group

 (string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
 (string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
 (string) $ruteEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
 (string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

 include_once $ruteEntity.'customer_group.php';        // template customer_group

 $core = "readId";
 include_once $ruteInc.'core.php';

?>
   <body>
     <div class="flex-container mx-10">
       <div class="container shadow-lg mx-5 p-4">
         <div class="col-md-8">
           <div class="row">
             <div class="d-lg-flex align-items-center mb-2">
					     <a href="index.php"><img src="<?php echo $ruteTheme ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
               <h1 class="text-white"><?php echo $company ; ?> TEST API customer_group</h1>
             </div>
             <img class = "mb-3" src="<?php echo $ruteTheme ?>/images/bg_table.jpg" alt="">
           </div>
        </div>

        <div class="row">
        
          <main class="container-fluid">

            <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="customer_groupForm.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
              <div class="form-group row">
                <label for="id" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">* Id:</label> 
                <div class="col-sm-2">
                  <input  type="text" class="form-control pe-3" name="id" placeholder="id" value="<?php echo $id; ?>"/> 
                </diV>
                <button type="submit" class="col-sm-2 btn btn-success btn-secondary">Read</button>
              </div>
            </form>

            <form class="form-horizontal mb-2" method="post" action="customer_groupForm.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                        onsubmit="return verifForm([<?php echo getfield01()?>,<?php echo getfield02()?>],'Error : fields marked with an asterisk are mandatory!');">

              <div class="form-group row mb-2">
                <label for="<?php echo getfieldid()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfieldid()?>:</label>
                <div class="col-sm-2">
                   <input type="number" class="form-control text-white bg-transparent" readonly disabled name="<?php echo getfieldid()?>" placeholder="<?php echo getfieldid()?>" value="<?php { echo $id ; } ?>"/>
                </div>
              </div>
    
              <div class="form-group row mb-1">
               <label for="<?php echo getfield01()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield01()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="number" class="form-control" name="<?php echo getfield01()?>" min="0" placeholder="<?php echo getfield01()?>" value="<?php if (isset($val[0][getfield01()])) {echo $val[0][getfield01()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield02()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield02()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="number" class="form-control" name="<?php echo getfield02()?>" min="0" placeholder="<?php echo getfield02()?>" value="<?php if (isset($val[0][getfield02()])) {echo $val[0][getfield02()];}?>"/>
                </div>
              </div>
              </div>

              <div class="form-group row mb-0 pe-4">
                <label for="label" class="col-sm-2">&nbsp;</label>
                <div class="col-sm-2">
                  <button class="col-lg-8 btn btn-success btn-default text-blank pe-4"><?php echo $action; ?></button>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="col-lg-8 btn btn-success btn-info pe-4" ><a href="customer_groupForm.php?action=Cancel">Cancel</a></button>
                </div>
              
                <?php  if ('' != $id && $status == 200) { 
                  echo "<div class=\"col-sm-2\">
                      <button type=\"button\" class=\"col-lg-8 btn btn-success text-danger btn-warning pe-4 \">
                      <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"customer_groupForm.php?action=Delete&amp;id={$id}\">Delete</a>
                      </button></div>"; }
                   if (isset ($_SESSION['parent_PAGE']) && !empty($_SESSION['parent_PAGE'])) { $url = $_SESSION['parent_PAGE'];
                      if (isset ($_SESSION['parent_ACTION']) && !empty($_SESSION['parent_ACTION'])) { $url .= $_SESSION['parent_ACTION']; }
                   } else { $url = "index_group.php"; }
                  echo "<div class=\"col-sm-2\">
                     <button type=\"button\" class=\"col-lg-8 btn btn-success btn-default pe-4 \">
                     <a href=\" {$url} \">Exit</a></button></div>"; ?>
              </div>

            </form>
            <div class="col-md-10">
               <?php include_once $ruteTheme.'viewMsg.php'; ?>
            </div>
          </main>
        </div>
      </div>
    </div>

    <?php include_once $ruteTheme.'footer.php'; ?>
