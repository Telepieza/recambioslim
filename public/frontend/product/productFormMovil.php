<?php
/**
  * productFormMovil.php
  * Description: Mobile product form
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
    <div class="container">
       <h1 class="flex-item text-white"><?php echo  $company ; ?> TEST API product</h1>
       <hr>
        <div class="row m-auto">
          <main class="container-fluid">
            <div class="p-1 col-md-6 order-2 order-lg-1 bg-dark">
                <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="productFormMovil.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
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
              
                <form method="post" action="productFormMovil.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                                    onsubmit="return verifForm([<?php echo getfield01()?>,<?php echo getfield02()?>,<?php echo getfield03()?>,<?php echo getfield04()?>],'Error : fields marked with an asterisk are mandatory!');">

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
                      <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield05()?>" id="<?php echo getfield05()?>" placeholder="<?php echo getfield05()?>" value="<?php if (isset($val[0][getfield05()])) {echo htmlspecialchars($val[0][getfield05()]);}?>"/>
                           <label for="<?php echo getfield05()?>"><?php echo getfield05()?>:</label>
                      </div>
                      <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield06()?>" id="<?php echo getfield06()?>" placeholder="<?php echo getfield06()?>" value="<?php if (isset($val[0][getfield06()])) {echo htmlspecialchars($val[0][getfield06()]);}?>"/>
                           <label for="<?php echo getfield06()?>"><?php echo getfield06()?>:</label>
                      </div>
                      <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield07()?>" id="<?php echo getfield07()?>" placeholder="<?php echo getfield07()?>" value="<?php if (isset($val[0][getfield07()])) {echo htmlspecialchars($val[0][getfield07()]);}?>"/>
                           <label for="<?php echo getfield07()?>"><?php echo getfield07()?>:</label>
                      </div>
                      <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield08()?>" id="<?php echo getfield08()?>" placeholder="<?php echo getfield08()?>" value="<?php if (isset($val[0][getfield08()])) {echo htmlspecialchars($val[0][getfield08()]);}?>"/>
                           <label for="<?php echo getfield08()?>"><?php echo getfield08()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                           <input type="number" class="form-control" name="<?php echo getfield09()?>" id="<?php echo getfield09()?>" min="1" placeholder="<?php echo getfield09()?>" value="<?php if (isset($val[0][getfield09()])) {echo $val[0][getfield09()];}?>"/>
                           <label for="<?php echo getfield09()?>"><?php echo getfield09()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                         <input type="number" class="form-control" name="<?php echo getfield10()?>" min="0" id="<?php echo getfield10()?>" placeholder="<?php echo getfield10()?>" value="<?php if (isset($val[0][getfield10()])) {echo $val[0][getfield10()];}?>"/>
                         <label for="<?php echo getfield10()?>"><?php echo getfield10()?>:</label>
                      </div>
                      <div class="form-floating mb-1">
                           <input type="text" class="form-control" name="<?php echo getfield11()?>" id="<?php echo getfield11()?>" placeholder="<?php echo getfield11()?>" value="<?php if (isset($val[0][getfield11()])) {echo htmlspecialchars($val[0][getfield11()]);}?>"/>
                           <label for="<?php echo getfield11()?>"><?php echo getfield11()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield12()?>" min="0" id="<?php echo getfield12()?>" placeholder="<?php echo getfield12()?>" value="<?php if (isset($val[0][getfield12()])) {echo $val[0][getfield12()];}?>"/>
                        <label for="<?php echo getfield12()?>"><?php echo getfield12()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield13()?>" min="0" id="<?php echo getfield13()?>" placeholder="<?php echo getfield13()?>" value="<?php if (isset($val[0][getfield13()])) {echo $val[0][getfield13()];}?>"/>
                        <label for="<?php echo getfield13()?>"><?php echo getfield13()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield14()?>" min="0.01" id="<?php echo getfield14()?>" placeholder="<?php echo getfield14()?>" value="<?php if (isset($val[0][getfield14()])) {echo $val[0][getfield14()];}?>"/>
                        <label for="<?php echo getfield14()?>"><?php echo getfield14()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield15()?>" min="0" id="<?php echo getfield15()?>" placeholder="<?php echo getfield15()?>" value="<?php if (isset($val[0][getfield15()])) {echo $val[0][getfield15()];}?>"/>
                        <label for="<?php echo getfield15()?>"><?php echo getfield15()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield16()?>" min="0" id="<?php echo getfield16()?>" placeholder="<?php echo getfield16()?>" value="<?php if (isset($val[0][getfield16()])) {echo $val[0][getfield16()];}?>"/>
                        <label for="<?php echo getfield16()?>"><?php echo getfield16()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-75">
                           <input type="text" class="form-control" name="<?php echo getfield17()?>" id="<?php echo getfield17()?>" placeholder="<?php echo getfield17()?>" value="<?php if (isset($val[0][getfield17()])) {echo htmlspecialchars($val[0][getfield17()]);}?>"/>
                           <label for="<?php echo getfield17()?>"><?php echo getfield17()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield18()?>" min="0.01" id="<?php echo getfield18()?>" placeholder="<?php echo getfield18()?>" value="<?php if (isset($val[0][getfield18()])) {echo $val[0][getfield18()];}?>"/>
                        <label for="<?php echo getfield18()?>"><?php echo getfield18()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield19()?>" min="0" id="<?php echo getfield19()?>" placeholder="<?php echo getfield19()?>" value="<?php if (isset($val[0][getfield19()])) {echo $val[0][getfield19()];}?>"/>
                        <label for="<?php echo getfield19()?>"><?php echo getfield19()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield20()?>" min="0.00" id="<?php echo getfield20()?>" placeholder="<?php echo getfield20()?>" value="<?php if (isset($val[0][getfield20()])) {echo $val[0][getfield20()];}?>"/>
                        <label for="<?php echo getfield20()?>"><?php echo getfield20()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield21()?>" min="0.00" id="<?php echo getfield21()?>" placeholder="<?php echo getfield21()?>" value="<?php if (isset($val[0][getfield21()])) {echo $val[0][getfield21()];}?>"/>
                        <label for="<?php echo getfield21()?>"><?php echo getfield21()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield22()?>" min="0.00" id="<?php echo getfield22()?>" placeholder="<?php echo getfield22()?>" value="<?php if (isset($val[0][getfield22()])) {echo $val[0][getfield22()];}?>"/>
                        <label for="<?php echo getfield22()?>"><?php echo getfield22()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield23()?>" min="0" id="<?php echo getfield23()?>" placeholder="<?php echo getfield23()?>" value="<?php if (isset($val[0][getfield23()])) {echo $val[0][getfield23()];}?>"/>
                        <label for="<?php echo getfield23()?>"><?php echo getfield23()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield24()?>" min="0" id="<?php echo getfield24()?>" placeholder="<?php echo getfield24()?>" value="<?php if (isset($val[0][getfield24()])) {echo $val[0][getfield24()];}?>"/>
                        <label for="<?php echo getfield24()?>">* <?php echo getfield24()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield25()?>" min="0" id="<?php echo getfield25()?>" placeholder="<?php echo getfield25()?>" value="<?php if (isset($val[0][getfield25()])) {echo $val[0][getfield25()];}?>"/>
                        <label for="<?php echo getfield25()?>"><?php echo getfield25()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield26()?>" min="0" id="<?php echo getfield26()?>" placeholder="<?php echo getfield26()?>" value="<?php if (isset($val[0][getfield26()])) {echo $val[0][getfield26()];}?>"/>
                        <label for="<?php echo getfield26()?>"><?php echo getfield26()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield27()?>" min="0" id="<?php echo getfield27()?>" placeholder="<?php echo getfield27()?>" value="<?php if (isset($val[0][getfield27()])) {echo $val[0][getfield27()];}?>"/>
                        <label for="<?php echo getfield27()?>"><?php echo getfield27()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-50">
                        <input type="number" class="form-control" name="<?php echo getfield28()?>" min="0" id="<?php echo getfield28()?>" placeholder="<?php echo getfield28()?>" value="<?php if (isset($val[0][getfield28()])) {echo $val[0][getfield28()];}?>"/>
                        <label for="<?php echo getfield28()?>"><?php echo getfield28()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-75">
                         <input type="text" name="<?php echo getfield29()?>"
                         <?php if ($action != "create") {
                             echo " class =\"form-control \" readonly disabled ";
                           } else { echo " class =\"form-control\" ";} ?>
                            id = "<?php echo getfield29()?>" placeholder="<?php echo $date; ?>" size="20" value="<?php if (isset($val[0][getfield29()])) {echo htmlspecialchars($val[0][getfield29()]);}?>"/>
                           <label for="<?php echo getfield29()?>"><?php echo getfield29()?>:</label>
                      </div>
                      <div class="form-floating mb-1 w-75">
                        <input type="text" name="<?php echo getfield30()?>"
                        <?php if ($action == "create") {
                              echo " class =\"form-control text-white \" readonly disabled ";
                        } else { echo " class =\"form-control\" ";} ?>
                         id = "<?php echo getfield30()?>" placeholder="<?php echo $date; ?>" size="20" value="<?php if (isset($val[0][getfield30()])) {echo htmlspecialchars($val[0][getfield30()]);}?>"/>
                         <label for="<?php echo getfield30()?>"><?php echo getfield30()?>:</label>
                      </div>
      
                      <div class="form-floating mb-1">
                         <button class="col-lg-2 btn btn-success btn-default text-blank pe-2"><?php echo $action; ?></button>
                         <button type="button" class="col-lg-2 btn btn-success btn-info pe-2 ><a href="productFormMovil.php?action=Cancel>Cancel</a></button>
                         <?php  if ('' != $id && $status == 200) {
                           echo "<button type=\"button\" class=\"col-lg-2 btn btn-success text-danger btn-warning pe-24 \">
                           <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"productFormMovil.php?action=Delete&amp;id={$id}\">Delete</a>
                           </button>"; }
                          if (isset ($_SESSION['parent_PAGE']) && !empty($_SESSION['parent_PAGE'])) { $url = $_SESSION['parent_PAGE'];
                             if (isset ($_SESSION['parent_ACTION']) && !empty($_SESSION['parent_ACTION'])) { $url .= $_SESSION['parent_ACTION']; }
                          } else { $url = "index_product.php"; }
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
