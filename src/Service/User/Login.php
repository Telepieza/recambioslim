<?php
/**
  * Login.php
  * Description: Service Login User
  * @Author : M.V.M
  * @Version 1.0.0
*/
declare(strict_types=1);

namespace App\Service\User;  
use App\Service\User\Find;     

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Firebase\JWT\JWT;
use App\Controller\BaseParameters;
use Exception;
/*
  Observations :
    ROUTE : $group->post('/users/login');
*/
final class Login                                            
{
    protected bool $debug;
    protected array $result;
    private   Find  $find;
    public function login(Request $request, BaseParameters $parameters)
    {
        $body  = (array) $request->getParsedBody();                                    // POST, recupera el id o name o email, y el password 
        $this->debug = $parameters->getDebug(); 
        $this->find  = new Find($parameters->getDb(),$body,$parameters->getPrefix());  // instancia la clase Find, enviando objeto DB y los datos del body
        (string) $jsonResult = $this->find->getUser();                                 // analiza los datos con el usuario de la BD.
        $this->result = (array) json_decode($jsonResult);                              // decodifica el result para pasarlo a array, se trabaja mejor.
        $this->toDebugger($parameters->getLogger(), ' ', $this->result); 
        $this->result['token']   = ''; 
        if ($this->result['status'] != 'error' && $this->result['code'] === 200)       // comprueba que no sea error y code = 200.
        {       
           if (isset($this->result["message"]))                                        // comprueba que exista la key = "Message"
           {
               $message = (array) $this->result["message"];
               $param = [
                 'user_id'    => isset($message['user_id'])   ? (int) $message['user_id'] : 0 ,  // grabamos el Id para el tocken
                 'username'   => isset($message['username'])  ? $message['username'] : '',       // grabamos el name para el tocken
                 'email'      => isset($message['email'])     ? $message['email'] : '',          // grabamos el email para el tocken
               ];
               $token = [
                 'info'  => json_encode($param),                                                 // generamos la key info, con json_encode de $param
                 'iat'   => time(),                                                              // tiempo actual  
                 'exp'   => time() + (7 * 24 * 60 * 60),                                         // tiempo de caducidad del tocken (7 Días)
               ];
               try
               {
                  $this->result['token'] = (JWT::encode($token,$parameters->getKeyToken(),"HS256"));  // generamos el tocken, y se pasa al array
               } 
               catch (Exception $ex)                                                                  // Si hay error, el array result, se regenera para indicar el error.
               {
                 $this->result['status']  = 'error';
                 $this->result['code']    = 500;
                 $this->result['count']   = 0;
                 $this->result['message'] = $ex->getMessage();
               }
            }
        }
// Envia el resultado del tocken o del error.
        return   
          [ 'status'  => $this->result['status'],               
            'code'    => $this->result['code'], 
            'count'   => $this->result['count'], 
            'token'   => $this->result['token'],
            'message' => $this->result['message'], 
          ];  
    }
    // Grabar datos en el log si la variable debug de setting = true;
    private function toDebugger(LoggerInterface $logger, $action, $message) 
    {     
      if ($this->debug) {
            $msg = 'login ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }
}
