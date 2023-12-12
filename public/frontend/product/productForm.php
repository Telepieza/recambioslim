<?php
/**
  * productForm.php
  * Description: Desktop product form
  * @Author : M.V.M.
  * @Version 1.0.11
  * --------------- Fields -----------------
  * getfieldid() (int)    product_id
	* getfield01() (string) model
  * getfield02() (string) sku
  * getfield03() (string) upc
  * getfield04() (string) ean
  * getfield05() (string) jan
  * getfield06() (string) isbn
  * getfield07() (string) mpn
  * getfield08() (string) location
  * getfield09() (int)    quantity
  * getfield10() (int)    stock_status_id
  * getfield11() (string) image
  * getfield12() (int)    manufacturer_id
  * getfield13() (int)    shipping
  * getfield14() (float)  price
  * getfield15() (int)    points
  * getfield16() (int)    tax_class_id
  * getfield17() (string) date_available
  * getfield18() (float)  weight
  * getfield19() (int)    weight_class_id
  * getfield20() (float)  length
  * getfield21() (float)  width
  * getfield22() (float)  height
  * getfield23() (int)    length_class_id
  * getfield24() (int)    subtract
  * getfield25() (int)    minimum
  * getfield26() (int)    sort_order
  * getfield27() (int)    status
  * getfield28() (int)    viewed
  * getfield29() (string) date_added
  * getfield30() (string) date_modified
**/

 if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;
 
 (string) $endpoint   = 'api/product';  // endpoint product

 (string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
 (string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
 (string) $ruteEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
 (string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

 include_once $ruteEntity.'product.php';        // template product

 $core = "readId";
 include_once $ruteInc.'core.php';

?>
   <body>
     <div class="flex-container mx-10">
       <div class="container shadow-lg mx-5 p-4">
         <div class="col-md-8">
           <div class="row">
             <div class="d-lg-flex align-items-center mb-2">
					     <a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
               <h1 class="text-white"><?php echo $company ; ?> TEST API product</h1>
             </div>
             <img class = "mb-3" src="<?php echo $urltemplate ?>/images/bg_table.jpg" alt="">
           </div>
        </div>

        <div class="row">
        
          <main class="container-fluid">

            <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="productForm.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
              <div class="form-group row">
                <label for="id" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">* Id:</label>
                <div class="col-sm-2">
                  <input  type="text" class="form-control pe-3" name="id" placeholder="id" value="<?php echo $id; ?>"/>
                </diV>
                <button type="submit" class="col-sm-2 btn btn-success btn-secondary">Read</button>
              </div>
            </form>

            <form class="form-horizontal mb-2" method="post" action="productForm.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                        onsubmit="return verifForm([<?php echo getfield01()?>,<?php echo getfield02()?>,<?php echo getfield03()?>,<?php echo getfield04()?>],'Error : fields marked with an asterisk are mandatory!');">

              <div class="form-group row mb-2">
                <label for="<?php echo getfieldid()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfieldid()?>:</label>
                <div class="col-sm-2">
                   <input type="number" class="form-control text-white bg-transparent" readonly disabled name="<?php echo getfieldid()?>" placeholder="<?php echo getfieldid()?>" value="<?php { echo $id ; } ?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield01()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo  getfield01()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield01()?>" placeholder="<?php echo getfield01()?>" value="<?php if (isset($val[0][getfield01()])) {echo htmlspecialchars($val[0][ getfield01()]);}?>"/>
                </div>
              </div>
    
              <div class="form-group row mb-1">
               <label for="<?php echo getfield02()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo  getfield02()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield02()?>" placeholder="<?php echo getfield02()?>" value="<?php if (isset($val[0][getfield02()])) {echo htmlspecialchars($val[0][ getfield02()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield03()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield03()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield03()?>" placeholder="<?php echo getfield03()?>" value="<?php if (isset($val[0][getfield03()])) {echo htmlspecialchars($val[0][getfield03()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield04()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield04()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield04()?>" placeholder="<?php echo getfield04()?>" value="<?php if (isset($val[0][getfield04()])) {echo htmlspecialchars($val[0][getfield04()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield05()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield05()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield05()?>" placeholder="<?php echo getfield05()?>" value="<?php if (isset($val[0][getfield05()])) {echo htmlspecialchars($val[0][getfield05()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield06()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield06()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield06()?>" placeholder="<?php echo getfield06()?>" value="<?php if (isset($val[0][getfield06()])) {echo htmlspecialchars($val[0][getfield06()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield07()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield07()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield07()?>" placeholder="<?php echo getfield07()?>" value="<?php if (isset($val[0][getfield07()])) {echo htmlspecialchars($val[0][getfield07()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield08()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield08()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield08()?>" placeholder="<?php echo getfield08()?>" value="<?php if (isset($val[0][getfield08()])) {echo htmlspecialchars($val[0][getfield08()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield09()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield09()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield09()?>" min="0" placeholder="<?php echo getfield09()?>" value="<?php if (isset($val[0][getfield09()])) {echo $val[0][getfield09()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield10()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield10()?>:</label>
                <div class="col-sm-2">
                 <input type="number" class="form-control" name="<?php echo getfield10()?>" min="0" placeholder="<?php echo getfield10()?>" value="<?php if (isset($val[0][getfield10()])) {echo $val[0][getfield10()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield11()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield11()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield11()?>" placeholder="<?php echo getfield11()?>" value="<?php if (isset($val[0][getfield11()])) {echo htmlspecialchars($val[0][getfield11()]);}?>"/>
                </div>
              </div>
      
              <div class="form-group row mb-1">
               <label for="<?php echo getfield12()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield12()?>:</label>
                <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield12()?>" min="0" placeholder="<?php echo getfield12()?>" value="<?php if (isset($val[0][getfield12()])) {echo $val[0][getfield12()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield13()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield13()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield13()?>" min="0" placeholder="<?php echo getfield13()?>" value="<?php if (isset($val[0][getfield13()])) {echo $val[0][getfield13()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield14()?>"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield14()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield14()?>" step="0.01" min="0" placeholder="<?php echo getfield14()?>" value="<?php if (isset($val[0][getfield14()])) {echo $val[0][getfield14()];} ?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield15()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield15()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield15()?>" min="0" placeholder="<?php echo getfield15()?>" value="<?php if (isset($val[0][getfield15()])) {echo $val[0][getfield15()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield16()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield16()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield16()?>" min="0" placeholder="<?php echo getfield16()?>" value="<?php if (isset($val[0][getfield16()])) {echo $val[0][getfield16()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield17()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield17()?>:</label>
                <div class="col-sm-2 col-lg-3">
                 <input type="text" class="form-control" name="<?php echo getfield17()?>" placeholder="<?php echo getfield17()?>" value="<?php if (isset($val[0][getfield17()])) {echo htmlspecialchars($val[0][getfield17()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield18()?>"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield18()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield18()?>" step="0.01" min="0" placeholder="<?php echo getfield18()?>" value="<?php if (isset($val[0][getfield18()])) {echo $val[0][getfield18()];} ?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield19()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield19()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield19()?>" min="0" placeholder="<?php echo getfield19()?>" value="<?php if (isset($val[0][getfield19()])) {echo $val[0][getfield19()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield20()?>"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield20()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield20()?>" step="0.01" min="0" placeholder="<?php echo getfield20()?>" value="<?php if (isset($val[0][getfield20()])) {echo $val[0][getfield20()];} ?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield21()?>"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield21()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield21()?>" step="0.01" min="0" placeholder="<?php echo getfield21()?>" value="<?php if (isset($val[0][getfield21()])) {echo $val[0][getfield21()];} ?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield22()?>"  class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield22()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield22()?>" step="0.01" min="0" placeholder="<?php echo getfield22()?>" value="<?php if (isset($val[0][getfield22()])) {echo $val[0][getfield22()];} ?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield23()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield23()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield23()?>" min="0" placeholder="<?php echo getfield23()?>" value="<?php if (isset($val[0][getfield23()])) {echo $val[0][getfield23()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield24()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield24()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield24()?>" min="0" placeholder="<?php echo getfield24()?>" value="<?php if (isset($val[0][getfield24()])) {echo $val[0][getfield24()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield25()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield25()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield25()?>" min="0" placeholder="<?php echo getfield25()?>" value="<?php if (isset($val[0][getfield25()])) {echo $val[0][getfield25()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield26()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield26()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield26()?>" min="0" placeholder="<?php echo getfield26()?>" value="<?php if (isset($val[0][getfield26()])) {echo $val[0][getfield26()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield27()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield27()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield27()?>" min="0" placeholder="<?php echo getfield27()?>" value="<?php if (isset($val[0][getfield27()])) {echo $val[0][getfield27()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield28()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield28()?>:</label>
                <div class="col-sm-2">
                  <input type="number"  class="form-control" name="<?php echo getfield28()?>" min="0" placeholder="<?php echo getfield28()?>" value="<?php if (isset($val[0][getfield28()])) {echo $val[0][getfield28()];}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield29()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield29()?>:</label>
                <div class="col-sm-2 col-lg-3">
                  <input type="text" name="<?php echo getfield29()?>"
                  <?php if ($action != "create") {
                     echo " class =\"form-control text-white bg-transparent\" readonly disabled ";
                  } else { echo " class =\"form-control\" ";} ?>
                  placeholder="<?php echo $date; ?>"  size="20" value="<?php if (isset($val[0][getfield29()])) {echo htmlspecialchars($val[0][getfield29()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="<?php echo getfield30()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield30()?>:</label>
                <div class="col-sm-2 col-lg-3">
                  <input type="text" name="<?php echo getfield30()?>"
                  <?php if ($action == "create") {
                     echo " class =\"form-control text-white bg-transparent\" readonly disabled ";
                  } else { echo " class =\"form-control\" ";} ?>
                  placeholder="<?php echo $date; ?>" size="20" value="<?php if (isset($val[0][getfield30()])) {echo htmlspecialchars($val[0][getfield30()]);}?>"/>
                </div>
              </div>
      
              <div class="form-group row mb-0 pe-4">
                <label for="label" class="col-sm-2">&nbsp;</label>
                <div class="col-sm-2">
                  <button class="col-lg-8 btn btn-success btn-default text-blank pe-4"><?php echo $action; ?></button>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="col-lg-8 btn btn-success btn-info pe-4" ><a href="productForm.php?action=Cancel">Cancel</a></button>
                </div>
              
                <?php  if ('' != $id && $status == 200) {
                  echo "<div class=\"col-sm-2\">
                      <button type=\"button\" class=\"col-lg-8 btn btn-success text-danger btn-warning pe-4 \">
                      <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"productForm.php?action=Delete&amp;id={$id}\">Delete</a>
                      </button></div>"; }
                   if (isset ($_SESSION['parent_PAGE']) && !empty($_SESSION['parent_PAGE'])) { $url = $_SESSION['parent_PAGE'];
                      if (isset ($_SESSION['parent_ACTION']) && !empty($_SESSION['parent_ACTION'])) { $url .= $_SESSION['parent_ACTION']; }
                   } else { $url = "index_product.php"; }
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
