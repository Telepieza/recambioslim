<?php
/**
  * Mail.php
  * Description: Service Mail and debug
  * @Author : M.V.M.
  * @Version 1.0.18
*/
declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use App\Controller\BaseParameters;
use PHPMailer\PHPMailer\PHPMailer;
use Exception;

class Mail extends UserAgent
{
    protected array $result;
    protected BaseParameters $parameters;
    protected Request        $request;
    protected BaseUserAgent  $useragent;

    public function __construct(Request $request,BaseParameters $parameters, array $result)   // Constructor
    {
         $this->request     = $request;
         $this->parameters  = $parameters;
         $this->result      = $result;
         $this->getUserAgent($this->request);
    }
 
    public function send($action)
    {
      $msgAgent = '';
      $msgHTML  = '';
      $msgTXT   = '';
      $msg      = '';
      if (!is_null($this->getAgent()) && count($this->getAgent()) > 0) {
        $msgAgent = str_replace('\/','/',json_encode($this->getAgent()));
        $this->toDebugger($this->parameters->getLogger(),$action.' AgentUser', $msgAgent);
      }
      $this->toDebugger($this->parameters->getLogger(),$action.' user',json_encode($this->result));
      $msgHTML = '<table><tbody>';
      if (!is_null($this->request)) {
        $msgHTML .= '<tr><td><p>' . json_encode($this->request) . '</p></td></tr>';
      }
      if (!is_null($this->result)) {
         $msgHTML .= '<tr><td><p>'.json_encode($this->result).'</p></td></tr>';
      }
      if (!empty($msgAgent)) {
        $msgHTML .= '<tr><td><p>'.$msgAgent.'</p></td></tr>';
      }
      $msgHTML .= '</tbody></table>';
      $msgTXT   = json_encode($this->request) . "/n" . json_encode($this->result) . "/n" . $msgAgent;
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