<?php 

declare(strict_types=1);

namespace App\Service;                                    // (1) Modificar en la clase nueva el valor, si se copia la clase.                       
                                           // (1) Modificar en la clase nueva el valor, si se copia la clase.
use Psr\Log\LoggerInterface;
use App\Service\BaseRepository;
use App\Controller\BaseParameters;
use PDOException;
/*
  Observaciones :
   ROUTE : $group->delete('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
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
  public function delete(array $args) 
  {
      $count  = 0;                                                           // count default = 0
      $status = 'error';
      $message = '';
      $id = isset($args[$this->tableClass->getFieldsId()]) ? $args[$this->tableClass->getFieldsId()] : 0;  // Recuperar el id desde $args
      if ( $id > 0 && is_numeric($id))                                       // Controlar si el id es mayor a 0 y numerico
      {
         $params  = [$this->tableClass->getFieldsId() => $id];               // Pasamos el id a parametros
         $result  = (array) $this->count( $this->parameters->getDb(),$this->tableClass->toTable(), $this->tableClass->getFieldsId(),$params); 
         $msgDebug = 'count: '.$result['count'].' key: '.json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR );
         $this->toDebugger($this->parameters->getLogger(), $msgDebug, $this->query);                 // print_r($result['code']); echo "  "; print_r($result['count']);
         if ($result['code'] == 200 &&  $result['count'] > 0)                 // Si existe el registro con el select count(*)
         {   
            $sql  = "DELETE FROM `{$this->tableClass->toTable()}` WHERE `{$this->tableClass->getFieldsId()}`" . " = :" . $this->tableClass->getFieldsId(); 
            $stmt = $this->parameters->getDb()->prepare($sql);                                              // preparamos la sentencia sql
            $msgDebug = 'sql: '.$sql.' params: '.str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
            $this->toDebugger($this->parameters->getLogger(),'',$msgDebug);                                 // Si debug = true, graba el sql y parametros en el logger
            try 
            {
               $stmt->execute($params);                                   // Ejecutamos la sentencia           
               $code    = 202;                                            // Si es ok, info status 202
               $count   = 1;                                              // Nro registros
               $status  = 'Info';
               $message = "The data has been deleted in the database with ID {' . $id . '} is correct.";
            } 
            catch(PDOException $ex) 
            {
               $code    = 500;                                             // Si hay error status 500                                     
               $message = $ex->getMessage();
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

  private function toDebugger(LoggerInterface $logger, $action, $message) 
    {     
      if ($this->parameters->getDebug()) {
            $msg = $this->tableClass->toTableName() . ' ' . $this->tableClass->toTextFind() . ' ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }
}
