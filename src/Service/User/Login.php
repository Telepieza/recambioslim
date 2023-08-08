<?php

declare(strict_types=1);

namespace App\Service\User;  
use App\Service\User\Find;     

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Firebase\JWT\JWT;
use Exception;
use PDO;

/*
Observaciones :
    http://telepiezaslim/users/login
    ROUTE : $group->post('/{$tableName}/new','App\Controller\{$tableName}\Create:create');
*/

final class Login                                            // La clase devuelve el token.
{
    protected bool $debug;
    protected array $result;
    private   Find  $find;
    public function login(PDO $db,Request $request, string $keyToken, LoggerInterface $logger, bool $debug)
    {
        $body  = (array) $request->getParsedBody();           // por POST, recupera el id o name o email, y el password 

        $this->debug = $debug;  
        $this->find = new Find($db,$body);                    // instancia la clase Find, enviando objeto DB y los datos del body
        (string) $jsonResult = $this->find->getUser();        // analiza los datos con el usuario de la BD.
        $this->result = (array) json_decode($jsonResult);     // decodifica el result para pasarlo a array, se trabaja mejor.
        $this->toDebugger($logger, ' ', $this->result);  
        if ($this->result['status'] != 'Error' && $this->result['code'] === 200)     // comprueba que no sea error y code = 200.
        {       
           if (isset($this->result["message"]))              // comprueba que exista la key = "Message"
           {
               $message = (array) $this->result["message"];
               $param = [
                 'id'    => isset($message['id'])    ? $message['id'] : 0 ,        // grabamos el Id para el tocken
                 'name'  => isset($message['name'])  ? $message['name'] : '',      // grabamos el name para el tocken
                 'email' => isset($message['email']) ? $message['email'] : '',     // grabamos el email para el tocken
               ];
               $token = [
                 'info'  => json_encode($param),               // generamos la key info, con json_encode de $param
                 'iat'   => time(),                            // tiempo actual  
                 'exp'   => time() + (7 * 24 * 60 * 60),       // tiempo de caducidad del tocken
               ];
               try
               {
                  $this->result['token'] = (JWT::encode($token,$keyToken,"HS256"));  // generamos el tocken, y se pasa al array
               } 
               catch (Exception $ex)                        // Si hay error, el array result, se adapta para indicar el error.
               {
                 $this->result['status']  = 'Error';
                 $this->result['code']    = 500;
                 $this->result['count']   = 0;
                 $this->result['message'] = $ex->getMessage();
                 $this->result['token']   = '';
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

    private function toDebugger(LoggerInterface $logger, $action, $message) 
    {     
      if ($this->debug) {
            $msg = 'login ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }

}
