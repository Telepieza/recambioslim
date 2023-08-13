<?php
 /** 
  * Auth.php
  * Description: Authorization : Verify token, user and password
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Service\User\Find;     
use PDO;

class Auth
{
    private int $code = 400;                           // default = 400
    private string $status = 'error';                  // default = 'error'
    private string $message = '';                
    private int $count = 0;
    private $request;
    private string $keySecret;
    private $decoded = array();
    private $payload = array();

    public function __construct(Request $request,string $keySecret)    // Constructor, pasa el request y keySecret a global
    {
        $this->request     = $request;
        $this->keySecret   = $keySecret;
    }

    public function verifyToken()                                      // verificamos el token que nos llega del cliente
    {            
        $jwtHeader = $this->request->getHeaderLine('Authorization');   // getHeaderLine   $authorization = explode(' ',$jwtHeader);
        $authorization = explode(' ',$jwtHeader); 
        $this->count   = count($authorization);                        // count array

        (string) $type = '';
        (string) $credentials = '';
        $result = array();
        
        if (is_array($authorization)) {
            if (isset($authorization[0])) {
               $type = trim($authorization[0]);                         // pasamos el tipo
            }
            if (isset($authorization[1])) {
              $credentials = trim($authorization[1]);                   // pasamos el token
            }
        }

        if ($type !== 'Bearer')                                         // si tipo != Bearer mensaje de error
        {
            $this->code = 403;                                          // cambiamos el code 400 por 403
            $this->message = 'Forbidden: (Bearer) You are not authorized. Token invalid.';
        }
        elseif (empty($credentials))                                    // si no existe token mensaje error
        {
            $this->code   = 403;                                        // cambiamos el code 400 por 403
            $this->message = 'Forbidden: (Credentials) You are not authorized. Token required.';
        }

        if ($this->code !== 403)                                        // si es 400 o != 403
        {
           try
           {
              $this->decoded = JWT::decode($credentials, new Key($this->keySecret, 'HS256'));  // decodificamos el token
              $this->status  = 'Auth';                                                         // status = Auth
              $this->code   = 200;                                                             // code = 200 (OK)
           } 
           catch (Exception $ex) 
           {
             $this->code = 403;                                                 // Si hay exception pasamos el code de 400 a 403
             $this->message = $ex->getMessage();                                // recuperamos el error, para enviar por return
           }
         }

        $this->payload = [                                                     // montamos el payload (status,code, count)
            'status'  => $this->status,
            'code'    => $this->code ,
            'count'   => $this->count,
        ]; 

        if ($this->code === 200)                                               // si code = 200
        {
            foreach ($this->decoded as $key => $val) {                         // localizamos el key = info
                if ($key === 'info')
                {
                  $result = json_decode($val);                                // decodificamos el valor (las keys son id,name,email);
                }
            }
            $this->payload ['message'] = $result;                             // pasamos los datos al payload como array
        }
        else 
        { 
            $this->payload ['message'] = $this->message;                      // si es != 200, grabamos el mensaje de error como string
        }
       return $this->payload;                                                 // enviamos el payload.   
    }  

    public function verifyUser(PDO $db,$prefix)                               // Verificamos el usuario de los datos recuperados del token.
    {
        $result = array();
        if (isset($this->payload['message']))                                 // analizamos si hay datos en el payload["menssage"]
        {
          (array) $body = (array) $this->payload['message'];                  // Pasamos a array body el array de payload (id,name,email)
          $body['auth'] = 'no_password';                                      // grabamos el key auth,se indica al objeto Find, es una verificacion tocken
          $find = new Find($db,$body,$prefix);                                // creamos la clase Find con su constructor. 
          $jsonResult = $find->getUser();                                     // la funcion getUser nos indicara si la información es correcta del tocken
        } else {
            $result['code'] = 403;                                            // Si no existe en payload la key "message", genera un code = 403 con error.
            $result['message'] = '(Users) Forbidden: You are not authorized. Verify User.';
            $jsonResult = json_encode($result);                               // convierte el array en string json (Motivo es para picar menos codigo).
        }
        return $jsonResult;                                                   // return en json_encode
    }

}
    