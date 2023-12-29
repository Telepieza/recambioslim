<?php
/**
  * checkJWTForm.php
  * Description: check JWT (token) form
  * @Author : M.V.M.
  * @Version 1.0.19
**/
    
    if (!defined('_TEXEC'))  {
      define( '_TEXEC' , 1) ;
    }

    (string) $ruteAdmin  = '..'.DIRECTORY_SEPARATOR;
    (string) $ruteInc    = $ruteAdmin.'inc'.DIRECTORY_SEPARATOR;
    (string) $rutaEntity = $ruteAdmin.'entity'.DIRECTORY_SEPARATOR;
    (string) $ruteTheme  = $ruteAdmin."template".DIRECTORY_SEPARATOR;

    include_once $ruteInc.'function.php';
    include_once $ruteInc.'setting.php';
    include_once $ruteTheme.'header.php';
    include_once $ruteTheme.'navbar.php';

?>

<body>
   <div class="flex-container mx-10">
     <div class="container shadow-lg mx-5 p-4">
        <div class="col-md-8">
           <div class="row">
             <div class="d-lg-flex align-items-center mb-2">
					     <a href="index.php"><img src="<?php echo $urlTemplate ?>/images/company_98x82.png" alt="" width="98" height="82"></a>
               <h1 class="text-white"><?php echo $company ; ?> API - Check JWT</h1>
             </div>
             <img class = "mb-3" src="<?php echo $urlTemplate ?>/images/bg_table.jpg" alt="">
           </div>
        </div>
        <div class="row">
          <div class="col-md-8 p-4">
             <form method="post" action="checkJWTForm.php" onsubmit="return verifForm([jwt],'Error : fields marked with an asterisk are mandatory!'); return false;">
                <label    class="form-label">* JWT/JSON Web Token:</label>
                <textarea class="form-control" rows="5" cols="100" name="jwtarea" placeholder="Token"><?php echo $jwt; ?></textarea>
                <label    class="form-label">Token details:</label>
                <textarea class="form-control" rows="12" cols="100" name="jwtd" placeholder="Token">
                <?php 
                   if ('' != $jwt)
                   {
                      $splitJwt = explode('.', $jwt);
                      if (3 != count($splitJwt)) {
                        echo '** Alert : The JWT string must have two dots **'."\n";
                      }
                      foreach ($splitJwt as $key => $chunk)
                      {
                        if ($remainder = strlen($chunk) % 4) {
                             $chunk .= str_repeat('=', 4 - $remainder);
                        }
                        $decoded = base64_decode(strtr($chunk, '-_', '+/'));
                        $result = print_r(json_decode($decoded),true);
                        $data = str_replace("stdClass Object", "", $result);
                        if (strlen($data) > 0 && !empty(trim($data))) echo $data;
                      }
                    }
                ?>
                </textarea>
                <div class="mt-3">
                   <button class="btn btn-primary px-4 me-2 text-center"><b>Check</b></button>
                   <button class="btn btn-info px-4 me-2"><a target="jwt_io" href="https://jwt.io/?value=<?php echo $jwt; ?>">Check from jwt.io</a></button>
                   <button class="btn btn-warning px-4 me-2"
                            onclick="javascript:var d = new Date(); var l = 4; d.setTime(d.getTime() + (l * 60 * 60 *  60)); var expires = 'expires='+d.toUTCString();
                            document.cookie = 'Authorization=<?php echo $jwt; ?>; Max-Age='+expires+'; HttpOnly; Secure; SameSite=Strict; path=/;'; alert('Cookie created for '+l+' hours');">Forge Cookie
                   </button>
                   <button class="btn btn-warning px-4 me-2"
                        onclick="javascript:document.cookie = 'Authorization=;expires=Thu, 01 Jan 1970 00:00:00 UTC; HttpOnly; Secure; SameSite=Strict; path=/;'">Delete Cookie
                   </button>
                </div>
              </form>
          </div>
        </div>
     </div>
  </div>
  
  <?php include_once $ruteTheme.'footer.php'; ?>