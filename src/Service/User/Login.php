<?php
/**
  * Login.php
  * Description: Service Login User
  * @Author : M.V.M.
  * @Version 1.0.15
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
use Exception;

/*
  Observations :
    ROUTE : $group->post('/users/login');
*/
final class Login extends BaseUserAgent
{
    protected array $result;
    protected array $agent;
    protected BaseParameters $parameters;
    
    private   Find  $find;

    public function login(Request $request, BaseParameters $parameters)
    {
        $body  = (array) $request->getParsedBody();                                    // POST, recupera el id o name o email, y el password
        $this->getUserAgent($request);                                                 // Info connection User Agent
        $this->parameters = $parameters;
        $this->find = new Find($this->parameters->getDb(),$body,$this->parameters->getPrefix());  // instancia la clase Find, enviando objeto DB y los datos del body
        (string) $jsonResult = $this->find->getUser();                                  // analiza los datos con el usuario de la BD.
        $this->result = (array) json_decode($jsonResult);                               // decodifica el result para pasarlo a array, se trabaja mejor.
        $this->toDebugAndMail();                                                        // Debug abd Mailer
        $this->result['token']  = '';
        if ($this->result['status'] != 'error' && $this->result['code'] === 200 && isset($this->result["message"]))                                        // comprueba que exista la key = "Message"
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
              $this->result['token'] = (JWT::encode($token,$this->parameters->getKeyToken(),"HS256"));  // generamos el tocken, y se pasa al array
            }
              catch (Exception $ex)                                                                  // Si hay error, el array result, se regenera para indicar el error.
              {
                $this->result['status']  = 'error';
                $this->result['code']    = 500;
                $this->result['count']   = 0;
                $this->result['message'] = $ex->getMessage();
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

    private function toDebugAndMail() {
      $msgAgent = '';
      $action   ='login';
      $msgHTML  = '';
      $msgTXT   = '';
      $msg      = '';
      if (!is_null($this->agent) && count($this->agent) > 0) {
        $msgAgent = str_replace('\/','/',json_encode($this->agent));
        $this->toDebugger($this->parameters->getLogger(),$action.' AgentUser', $msgAgent);
      }
      $this->toDebugger($this->parameters->getLogger(),$action.' user',json_encode($this->result));
      $msgHTML = '<table><tbody><tr><td><p>'.json_encode($this->result).'</p></td></tr>';
      if (!empty($msgAgent)) {
        $msgHTML .= '<tr><td><p>'.$msgAgent.'</p></td></tr>';
      }
      $msgHTML .= '</tbody></table>';
      $msgTXT   = json_encode($this->result) . "/n" . $msgAgent;
      $msg      = $this->toMailer($this->parameters->getMailer(),$action,$this->parameters->getAppProduct(), $msgHTML,$msgTXT);
      if (!empty($msg)) {
        $this->toDebugger($this->parameters->getLogger(),'mailer '.$action, $msg);
      }
    }
    
    // Grabar datos en el log si la variable debug de setting = true;
    private function toDebugger(LoggerInterface $logger, $action, $message)
    {
      if ($this->parameters->getDebug()) {
          $msg = $action . ' ' . $message;
          $logger->debug($msg);
      }
    }

    private function toMailer(PHPMailer $mailer, $action, $product, $msgHTML, $msgTXT)
    {
      $msg = '';
      $mailContent = '';
      if ($this->parameters->getIsmail()) {
          $msg   = $action . ' ';
          $mailer->Subject = $msg  . 'user connection ' . $product;
          $mailer->msgHTML(date('Y-m-d H:i:s'));
          $mailContent = '<h1>User login api ' . $product . '</h1><p>' . $msgHTML . '</p>';
          $mailer->Body    = $mailContent;
          $mailer->AltBody = $msgTXT;
          if($mailer->send()) {
             $msg .= 'Message has been sent';
          } else {
            $msg .= 'Mailer Error: ' . $mailer->ErrorInfo;
          }
      }
      return $msg;
    }

}