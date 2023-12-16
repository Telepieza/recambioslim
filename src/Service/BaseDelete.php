<?php
/**
  * BaseDelete.php
  * Description: Principal object delete class of all templates
  * @Author : M.V.M.
  * @Version 1.0.14
**/

declare(strict_types=1);

namespace App\Service;
                                                          
use Psr\Log\LoggerInterface;
use App\Service\BaseRepository;
use App\Controller\BaseParameters;
use PDOException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

/*
   Observations :
   ROUTE : $group->delete('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
   ROUTE : $group->post('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete')
*/
final class BaseDelete extends BaseRepository
{
   protected object $tableClass;
   protected BaseParameters $parameters;

   public function __construct(object $tableClass, BaseParameters $parameters)
  {
       $this->tableClass  = $tableClass;
       $this->parameters  = $parameters;
  }
  public function delete(string $userInfo, array $args)
  {
      $count  = 0;                                                                                         // count default = 0
      $status = 'error';
      $message = '';
      $id = isset($args[$this->tableClass->getFieldsId()]) ? $args[$this->tableClass->getFieldsId()] : 0;  // Recuperar el id desde $args
      if ( $id > 0 && is_numeric($id))                                                                     // Controlar si el id es mayor a 0 y numerico
      {
         $params  = [$this->tableClass->getFieldsId() => $id];                                             // Pasamos el id a parametros
         $result  = (array) $this->count( $this->parameters->getDb(),$this->tableClass->toTable(), $this->tableClass->getFieldsId(),$params);  //  leemos DDBB con id
         $msgDebug = 'count: '.$result['count'].' key: '.json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR );
         $this->toDebugger($userInfo, $this->parameters->getLogger(), $msgDebug, $this->query);            // Si debug = true, graba el sql y parametros en el logger  
         if ($result['code'] == 200 &&  $result['count'] > 0)                                              // Si existe el registro con el select count(*)
         {
            $sql  = "DELETE FROM `{$this->tableClass->toTable()}` WHERE `{$this->tableClass->getFieldsId()}`" . " = :" . $this->tableClass->getFieldsId(); // Delete DDBB
            $stmt = $this->parameters->getDb()->prepare($sql);                                                            // preparamos la sentencia sql
            $msgDebug = 'sql: '.$sql.' params: '.str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
            $this->toDebugger($userInfo, $this->parameters->getLogger(),'',$msgDebug);                                              // Si debug = true, graba el sql y parametros en el logger
            $msgMail = $this->toMailer($this->parameters->getMailer(), 'delete' , $msgDebug);
            if (!empty($msgMail)) { $this->toDebugger($userInfo, $this->parameters->getLogger(), 'Mailer message: ', $msgMail); }
            try
            {
               $stmt->execute($params);                                   // Ejecutamos la sentencia
               $code    = 202;                                            // Si es ok, info status 202
               $count   = 1;                                              // Nro registros
               $status  = 'Info';
               $message = "The data has been deleted in the database with ID {' . $id . '} is correct.";  // Message
            }
            catch(PDOException $ex)
            {
               $code    = 500;                                             // Si hay error status 500
               $message = $ex->getMessage();                               // Error message
            }
         }
         else
         {
              $code    = $result['code'];
              $message = $result['message'];
         }
      }
      else
      {
           $code    = 404;
           $message = "There is no information in the {$this->tableClass->toTableName()} table";
      }
      return
             [ 'status'  => $status,
               'code'    => $code,
               'count'   => $count,
               'message' => $message
            ];
  }
// Si el debug = true, se grabara la informacion en el logger
  private function toDebugger($userInfo, LoggerInterface $logger, $action, $message)
    {
      if ($this->parameters->getDebug()) {
            $msg = $userInfo . ' ' . $this->tableClass->toTableName() . ' ' . $this->tableClass->toTextFind() . ' ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }

    private function toMailer(PHPMailer $mailer, $action, $message)
    {
      $msg = '';
      if ($this->parameters->getIsmail()) {
         $msg   = $action . ' ';
         $mailer->Subject = $msg . 'table ' . $this->tableClass->toTable() . ' (RecambioSlim)';
         $mailer->msgHTML(date('Y-m-d H:i:s'));
         $mailContent = '<h1>User delete api RecambioSlim</h1>';
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
