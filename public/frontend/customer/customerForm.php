<?php
/**
  * customerForm.php
  * Description: Deskdata customer form
  * @Author : M.V.M.
  * @Version 1.0.10
  * --------------- Fields -----------------
  *  getfieldid()  (int)    // customer_id
  *  getfield01()  (int)    // customer_group_id
  *  getfield02()  (int)    // store_id
  *  getfield03()  (int)    // language_id
  *  getfield04()  (string) // firstname
  *  getfield05()  (string) // lastname
  *  getfield06()  (string) // email
  *  getfield07()  (string) // telephone
  *  getfield08()  (string) // fax
  *  getfield09()  (string) // password
  *  getfield10()  (string) // salt
  *  getfield11()  (string) // cart
  *  getfield12()  (string) // wishlist
  *  getfield13()  (int)    // newsletter
  *  getfield14()  (int)    // address_id
  *  getfield15()  (string) // custom_field
  *  getfield16()  (string) // ip
  *  getfield17()  (int)    // status
  *  getfield18()  (int)    // safe
  *  getfield19()  (string) // token
  *  getfield20()  (string) // code
  *  getfield21()  (string) // date_added
**/

 if (!defined('_TEXEC'))  define( '_TEXEC' , 1) ;
 
 (string) $endpoint   = 'api/customer';  // endpoint customer

 (string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR;
 (string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
 (string) $ruteEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
 (string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

 include_once $ruteEntity.'customer.php';        // template customer

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
               <h1 class="text-white"><?php echo $company ; ?> TEST API customer</h1>
             </div>
             <img class = "mb-3" src="<?php echo $urltemplate ?>/images/bg_table.jpg" alt="">
           </div>
        </div>

        <div class="row">
        
          <main class="container-fluid">

            <form class="mb-2" role = "form" aria-activedescendant="" method="post" action="customerForm.php?action=Read" onsubmit="return verifForm([id],'Error : fields marked with an asterisk are mandatory!');">
              <div class="form-group row">
                <label for="id" class="col-sm-2 d-flex justify-content-end align-items-center pe-3">* Id:</label> 
                <div class="col-sm-2">
                  <input  type="text" class="form-control pe-3" name="id" placeholder="id" value="<?php echo $id; ?>"/> 
                </diV>
                <button type="submit" class="col-sm-2 btn btn-success btn-secondary">Read</button>
              </div>
            </form>

            <form class="form-horizontal mb-2" method="post" action="customerForm.php?action=<?php echo $action."&amp;id={$id}"; ?>"
                        onsubmit="return verifForm([<?php echo getfield01()?>,<?php echo getfield02()?>,<?php echo getfield03()?>,<?php echo getfield04()?>,<?php echo getfield05()?>,<?php echo getfield06()?>,<?php echo getfield07()?>,<?php echo getfield09()?>],'Error : fields marked with an asterisk are mandatory!');">

              <div class="form-group row mb-2">
                <label for="<?php echo getfieldid()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfieldid()?>:</label>
                <div class="col-sm-2">
                   <input type="number" class="form-control text-white bg-transparent" readonly disabled name="<?php echo getfieldid()?>" placeholder="<?php echo getfieldid()?>" value="<?php { echo $id ; } ?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield01()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield01()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield01()?>" min="0" placeholder="<?php echo getfield01()?>" value="<?php if (isset($val[0][getfield01()])) {echo $val[0][getfield01()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield02()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield02()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield02()?>" min="0" placeholder="<?php echo getfield02()?>" value="<?php if (isset($val[0][getfield02()])) {echo $val[0][getfield02()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield03()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield03()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield03()?>" min="0" placeholder="<?php echo getfield03()?>" value="<?php if (isset($val[0][getfield03()])) {echo $val[0][getfield03()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield04()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield04()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield04()?>" placeholder="<?php echo getfield04()?>" value="<?php if (isset($val[0][getfield04()])) {echo htmlspecialchars($val[0][getfield04()]);}?>"/>
                </div>
              </div>

              
              <div class="form-group row mb-1">
               <label for="<?php echo getfield05()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield05()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield05()?>" placeholder="<?php echo getfield05()?>" value="<?php if (isset($val[0][getfield05()])) {echo htmlspecialchars($val[0][getfield05()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield06()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield06()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield06()?>" placeholder="<?php echo getfield06()?>" value="<?php if (isset($val[0][getfield06()])) {echo htmlspecialchars($val[0][getfield06()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield07()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield07()?>:</label>
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
               <label for="<?php echo getfield09()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 ">* <?php echo getfield09()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield09()?>" placeholder="<?php echo getfield09()?>" value="<?php if (isset($val[0][getfield09()])) {echo htmlspecialchars($val[0][getfield09()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield10()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield10()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield10()?>" placeholder="<?php echo getfield10()?>" value="<?php if (isset($val[0][getfield10()])) {echo htmlspecialchars($val[0][getfield10()]);}?>"/>
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
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield12()?>" placeholder="<?php echo getfield12()?>" value="<?php if (isset($val[0][getfield12()])) {echo htmlspecialchars($val[0][getfield12()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield13()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield13()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield13()?>" min="0" placeholder="<?php echo getfield13()?>" value="<?php if (isset($val[0][getfield13()])) {echo $val[0][getfield13()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield14()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield14()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield14()?>" min="0" placeholder="<?php echo getfield14()?>" value="<?php if (isset($val[0][getfield14()])) {echo $val[0][getfield14()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield15()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield15()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield15()?>" placeholder="<?php echo getfield15()?>" value="<?php if (isset($val[0][getfield15()])) {echo htmlspecialchars($val[0][getfield15()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield16()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield16()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield16()?>" placeholder="<?php echo getfield16()?>" value="<?php if (isset($val[0][getfield16()])) {echo htmlspecialchars($val[0][getfield16()]);}?>"/>
                </div>
              </div>
              
              <div class="form-group row mb-1">
               <label for="<?php echo getfield17()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield17()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield17()?>" min="0" placeholder="<?php echo getfield17()?>" value="<?php if (isset($val[0][getfield17()])) {echo $val[0][getfield17()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield18()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield18()?>:</label>
               <div class="col-sm-2">
                  <input type="number" class="form-control" name="<?php echo getfield18()?>" min="0" placeholder="<?php echo getfield18()?>" value="<?php if (isset($val[0][getfield18()])) {echo $val[0][getfield18()];}?>"/>
               </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield19()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield19()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield19()?>" placeholder="<?php echo getfield19()?>" value="<?php if (isset($val[0][getfield19()])) {echo htmlspecialchars($val[0][getfield19()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
               <label for="<?php echo getfield20()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield20()?>:</label>
                <div class="col-sm-2 col-lg-6">
                 <input type="text" class="form-control" name="<?php echo getfield20()?>" placeholder="<?php echo getfield20()?>" value="<?php if (isset($val[0][getfield20()])) {echo htmlspecialchars($val[0][getfield20()]);}?>"/>
                </div>
              </div>

              <div class="form-group row mb-1">
                <label for="<?php echo getfield21()?>" class="col-sm-2 d-flex justify-content-end align-items-center pe-3 "><?php echo getfield21()?>:</label>
                <div class="col-sm-2 col-lg-3">
                  <input type="text" name="<?php echo getfield21()?>"
                  <?php if ($action != "create") {
                     echo " class =\"form-control text-white bg-transparent\" readonly disabled ";
                  } else { echo " class =\"form-control\" ";} ?>
                  placeholder="<?php echo $date; ?>"  size="20" value="<?php if (isset($val[0][getfield21()])) {echo htmlspecialchars($val[0][getfield21()]);}?>"/>
                </div>
              </div>
     
              <div class="form-group row mb-0 pe-4">
                <label for="label" class="col-sm-2">&nbsp;</label>
                <div class="col-sm-2">
                  <button class="col-lg-8 btn btn-success btn-default text-blank pe-4"><?php echo $action; ?></button>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="col-lg-8 btn btn-success btn-info pe-4" ><a href="customerForm.php?action=Cancel">Cancel</a></button>
                </div>

                <?php  if ('' != $id && $status == 200) { 
                  echo "<div class=\"col-sm-2\">
                      <button type=\"button\" class=\"col-lg-8 btn btn-success text-danger btn-warning pe-4 \">
                      <a onclick=\"return confirm('Delete customer #{$id}');\" href=\"customerForm.php?action=Delete&amp;id={$id}\">Delete</a>
                      </button></div>"; }
                   if (isset ($_SESSION['parent_PAGE']) && !empty($_SESSION['parent_PAGE'])) { $url = $_SESSION['parent_PAGE'];
                      if (isset ($_SESSION['parent_ACTION']) && !empty($_SESSION['parent_ACTION'])) { $url .= $_SESSION['parent_ACTION']; }
                   } else { $url = "index_customer.php"; }
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

