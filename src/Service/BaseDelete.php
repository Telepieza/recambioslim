<?php
/**
  * BaseDelete.php
  * Description: Principal object delete class of all templates
  * @Author : M.V.M.
  * @Version 1.0.15
**/

declare(strict_types=1);

namespace App\Service;
                                                          
use App\Service\BaseRepository;
use App\Controller\BaseParameters;
use PDOException;

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
      $msgName = $userInfo . ' ' . $this->tableClass->toTableName() . ' ' . $this->tableClass->toTextFind() . ' ';
      $id = isset($args[$this->tableClass->getFieldsId()]) ? $args[$this->tableClass->getFieldsId()] : 0;  // Recuperar el id desde $args
      if ( $id > 0 && is_numeric($id))                                                                     // Controlar si el id es mayor a 0 y numerico
      {
         $params  = [$this->tableClass->getFieldsId() => $id];                                             // Pasamos el id a parametros
         $result  = (array) $this->toCount( $this->parameters->getDb(),$this->tableClass->toTable(), $this->tableClass->getFieldsId(),$params);  //  leemos DDBB con id
         $action = 'count: '.$result['count'].' key: '.json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR );
         $this->toDebugger($this->parameters->getLogger(),$this->parameters->getDebug(), $msgName, $action, $this->query);  // Si debug = true, graba el sql y parametros en el logger
         if ($result['code'] == 200 &&  $result['count'] > 0)                                              // Si existe el registro con el select count(*)
         {
            $sql  = "DELETE FROM `{$this->tableClass->toTable()}` WHERE `{$this->tableClass->getFieldsId()}`" . " = :" . $this->tableClass->getFieldsId(); // Delete DDBB
            $stmt = $this->parameters->getDb()->prepare($sql);                                                            // preparamos la sentencia sql
            $msgDebug = 'sql: '.$sql.' params: '.str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
            $this->toDebugger($this->parameters->getLogger(),$this->parameters->getDebug(),$msgName,'query',$msgDebug);  // Si debug = true, graba el sql y parametros en el logger
            $msgMail = $this->toMailer($this->parameters->getMailer(),$this->parameters->getIsmail(),$this->parameters->getAppProduct(),$this->tableClass->toTable(),'delete',$msgDebug);
            if (!empty($msgMail)) {
               $this->toDebugger($this->parameters->getLogger(), $this->parameters->getDebug(),$msgName,'mailer',$msgMail);
            }
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

}
