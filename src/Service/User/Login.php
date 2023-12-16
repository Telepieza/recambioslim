<?php
/**
  * Login.php
  * Description: Service Login User
  * @Author : M.V.M.
  * @Version 1.0.12
*/
declare(strict_types=1);

namespace App\Service\User;
use App\Service\User\Find;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Firebase\JWT\JWT;
use App\Controller\BaseParameters;
use App\Service\BaseUserAgent;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Exception;
/*
  Observations :
    ROUTE : $group->post('/users/login');
*/
final class Login extends BaseUserAgent
{
    protected bool  $debug;
    protected bool  $ismail;
    protected array $result;
    protected array $agent;
    
    private   Find  $find;

    public function login(Request $request, BaseParameters $parameters)
    {
        $body  = (array) $request->getParsedBody();                                    // POST, recupera el id o name o email, y el password
        $this->getUserAgent($request);
        $this->debug  = $parameters->getDebug();
        $this->ismail = $parameters->getIsmail();
        $this->find   = new Find($parameters->getDb(),$body,$parameters->getPrefix());  // instancia la clase Find, enviando objeto DB y los datos del body
        (string) $jsonResult = $this->find->getUser();                                  // analiza los datos con el usuario de la BD.
        $this->result = (array) json_decode($jsonResult);                               // decodifica el result para pasarlo a array, se trabaja mejor.
        $this->toDebugger($parameters->getLogger(), 'login', $this->result);
        $msg = $this->toMailer($parameters->getMailer(), 'login', $this->result);
        if (!empty($msg)) {$this->toDebugger($parameters->getLogger(),'Mailer message: ', $msg); }
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
            if (!is_null($this->agent) && count($this->agent) > 0 && $action == 'login') {
               $msg = $action . ' ' . str_replace('\/','/',json_encode($this->agent));
               $logger->debug($msg);
            }
            $msg = $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }

    private function toMailer(PHPMailer $mailer, $action, $message)
    {
      $msg = '';
      if ($this->ismail) {
            $msg   = $action . ' ';
            $mailer->Subject = $msg  . 'user connection (RecambioSlim)';
            $mailer->msgHTML(date('Y-m-d H:i:s'));
            $mailContent = '<h1>User login api RecambioSlim</h1>';
            $mailer->Body = $mailContent . '<p>' . json_encode($message) . '</p>';
          if($mailer->send()) {
             $msg .= 'Message has been sent';
         } else {
            $msg .= 'Mailer Error: ' . $mailer->ErrorInfo;
         }
      }
      return $msg;
    }

}
