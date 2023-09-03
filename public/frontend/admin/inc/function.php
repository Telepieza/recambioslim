<?php
/**
  * function.php
  * Description: Create start session and FontEnd functions
  * @Author : M.V.M.
  * @Version 1.0.5
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

session_start();

$coreDirAdmin = dirname( __DIR__ ).DIRECTORY_SEPARATOR;
$coreDirInc   = dirname( __FILE__ ).DIRECTORY_SEPARATOR;

// Locate token by session or by cookie
function session_login() {
  $jwt = '';
  if (isset($_SESSION['token'])) {
    $jwt = $_SESSION['token'];
  }
  if (empty($jwt) && isset($_COOKIE['Authorization'])) {
    $jwt = $_COOKIE['Authorization'];
  }
  if (isset($_SESSION['token']) && isset($_COOKIE['Authorization']))
  {
     if ($_SESSION['token'] != $_COOKIE['Authorization'] )
     {
        setcookie("Authorization", $_POST[$_SESSION['token']], time()+(3600 * 4), "/", '');
     }
  }
   return $jwt;
}
// Message error or info
function msgError($action, $status, $error, $info, $id ) {

   $message = '';
   $msg     = '';
   if ($status == 500)  {
     if (is_array($error)) {
        $message = $error['type'] . ' ' . $error['description'] ;
     } else {
      $message = $error;
     }
   }
   elseif ($status >= 400) {
     if (is_array($error)) {
       $message = $error['description'];
       if ($id > 0) {
        $message .= ' id: '. $id;
       }
     } else {
      $message = $error;
     }
   }

   if (!empty($message)) {
      if (isset($action)) {
        $msg = $action;
      }
       $msg .= ' Error '. $message;
   } else {
     if (!empty($info)) {
       $msg = $info;
     } else {
       $msg = $action . ' is Ok';
       if ($id > 0) {
           $msg .= ' - id: '. $id;
       }
     }
   }
   return $msg;
}

function isMobile(){
  (boolean) $isMobile = false;
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$_SERVER['HTTP_USER_AGENT'])||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($_SERVER['HTTP_USER_AGENT'],0,4))) {
	  $isMobile = true;
  }
	return $isMobile;
}

// curl call to server
function CallAPI($method, $url, $token, $data = false)
{
    $curl      = curl_init();
    $arrHeader = array();

    switch ($method) {
        case 'POST':  // CREATE / UPDATE/ DELETE/ LOGIN
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
            break;
        case 'PUT': // UPDATE
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
            break;
        case 'DELETE': // DELETE
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            if ($data) {
                $url = sprintf('%s?%s', $url, $data);
            }
            break;
        default: // READ
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            if ($data) {
              $url = sprintf('%s?%s', $url, $data);
            }
            break;
    }

    (string) $auth = trim($token);
    curl_setopt($curl, CURLOPT_URL, $url);
  // curl_setopt($curl, CURLOPT_FAILONERROR, 1);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HEADER, 0);

    if (empty($auth) && isset($_COOKIE['Authorization']) && !empty($_COOKIE['Authorization'])) {
      $auth = $_COOKIE['Authorization'];
    }
    
    if (empty($auth) && isset($_SESSION['token']) && !empty($_SESSION['token'])) { 
      $auth = $_SESSION['token'];
    }

    $arrHeader[] = "Content-type: application/json";
    if (!empty($auth)) {
       $arrHeader[] = "Authorization: Bearer ". $auth;
    }
 
    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeader);

    $result = curl_exec($curl);

//  $respHeaderSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $respHttpCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
//  $respHttpConnectCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CONNECTCODE);
//  $curlErrorNum = curl_errno($curl);
    if ($respHttpCode == 405) {
      (array) $error = null;
      $error['status']  = 500;
      $error['error'] = '(nginx) Not Allowed';
      $result =  json_encode($error, JSON_PRETTY_PRINT);
    }
    curl_close($curl);
    return $result;
}

// Pagination request variables
function setPageFields()
{
   $limit  = 0;
   $offset = 0;
   if (isset($_REQUEST['limit']))   $limit   = $_REQUEST['limit'];
   if (isset($_REQUEST['offset']))  $offset  = $_REQUEST['offset'];
  
   $formFields = array(
     'limit'   => (int) $limit,
     'offset'  => (int) $offset);
   return $formFields;
}

// Header (Parent)
function showParent($parent)
{
  header("Location: " . $parent);
}