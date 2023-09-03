<?php
/**
  * BaseCreate.php
  * Description: Principal object create class of all templates
  * @Author : M.V.M.
  * @Version 1.0.5
**/
declare(strict_types=1);

namespace App\Service;
                              
use App\Controller\BaseParameters;
use Psr\Log\LoggerInterface;
use App\Service\BaseRepository;
use App\Service\BaseUtils;
use PDOException;

/*
  Observations :
   ROUTE : $group->post('/{$tableName}/new','App\Controller\{$tableName}\Create:create');
*/

final class BaseCreate extends BaseRepository
{
    protected object $tableClass;
    protected BaseParameters $parameters;
    public function __construct(object $tableClass, BaseParameters $parameters)
   {
        $this->tableClass  = $tableClass;
        $this->parameters  = $parameters;
   }
    public function new(array $body)
    {
        $id           = 0;                                                     // Se inicia el id con valor 0.
        $code         = 404;                                                   // Status = 404. Nos evitamos de gestionar todos los else de cada uno de los if.
        $status       = 'error';                                               // Status default = "Error"
        $count        = 0;                                                     // count = 0
        $noPrimaryKey = 'NoPrimaryKey';                                        // variable indicando no tiene tiene la tabla clave primaria
        $this->toDebugger($this->parameters->getLogger(),'body', $this->tableClass->toJson());  // Si debug = true, graba la informacion de entrada en logger
        $inputs     = (array) $this->tableClass->toCheckValue($this->tableClass->toTextCreate(),$body);
        $this->toDebugger($this->parameters->getLogger(),'inputs', $inputs);                      // Si debug = true, graba la informacion chequeda en el logger
        $primaryKey = $this->tableClass->toPrimaryKey();                                          // Campos de la clave primaria de la tabla.
        $baseUtils  = new BaseUtils();                                                             // nueva instancia clase BaseUitls;
        if (!is_null($primaryKey) && is_array($primaryKey) && !isset($primaryKey[$noPrimaryKey]))  // Si la tabla tiene clave primaria
        {
           $paramKey = $baseUtils->buildingSqlPrimaryKey($primaryKey, $inputs);                    // Asignar los valores a los campos de la clave primaria
           $result  = (array) $this->count($this->parameters->getDb(),$this->tableClass->toTable(),$this->tableClass->getFieldsId(),$paramKey); // Leemos base datos
           $msgDebug = 'count: '.$result['count'].' key: '. json_encode($paramKey,JSON_PARTIAL_OUTPUT_ON_ERROR );
           $this->toDebugger($this->parameters->getLogger(), $msgDebug, $this->query);             // Si debug = true, graba el query en el logger
        } else {
            $result = array();
            $result['code'] = 404;
            $result['count'] = 0;
        }
        if ($result['code'] == 404 && $result['count'] == 0)                   // El code=404 y count=0,indica que no existe la clave primaria, procedemos al insert
        {
           $data   = $this->tableClass->jsonSerialize($this->tableClass->toTextCreate());      // Serializamos los campos dando los formatos a cada uno de ellos.
           $sql    = $baseUtils->buildingSqlInsert($data, $this->tableClass->toTable());       // sql,  INSERT INTO Manufacturer (area,nombre) VALUES (:area,:nombre)
           $params = $baseUtils->buildingSqlParams($inputs, $this->tableClass->toTextCreate(), $this->tableClass->getFieldsId(), array()); // parametros
           $msgDebug = 'sql: '.$sql.' params: '. str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
           $this->toDebugger($this->parameters->getLogger(),'',$msgDebug);
           $stmt = $this->parameters->getDb()->prepare($sql);                                  // PDO: Preparamos la sentencia query y la enviamos.
           try
           {
            $result = $stmt->execute($params);                                                 // PDO: Ejecutamos  el insert con sus parametros.
            if ($result)
            {
                $id =  $this->parameters->getDb()->lastInsertId();                             // PDO: Localizamos el ultimo id creado anteriormente
            }
           } catch(PDOException $e)
           {
             $code = 500;
             $message = $e->getMessage();                                                     // Mensaje de error
           }

           if ($id > 0)                                                                     // Si el id localizado > 0
           {
              if (!is_null($primaryKey) && is_array($primaryKey) && !isset($primaryKey[$noPrimaryKey]))  // Si es clave primaria, volvemos a leer la tabla con la clave
              {
                 $result = (array) $this->count($this->parameters->getDb(),$this->tableClass->toTable(),$this->tableClass->getFieldsId(),$paramKey);
                 $msgDebug = $this->tableClass->getFieldsId() . ':' .$id.' count: '.$result['count'].' key: '.json_encode($paramKey,JSON_PARTIAL_OUTPUT_ON_ERROR );
                 $this->toDebugger($this->parameters->getLogger(), $msgDebug, $this->query);               // Si debug = true, graba el count del query en el logger
              }
              else
              {
                $result = array();
                $result['code'] = 200;
                $result['count'] = 1;
              }
              
              if ($result['code'] == 200 &&  $result['count'] > 0)   // Si el code = 200 y count > 0, significa que se ha creado la fila y es ok.
              {
                 $code    = 201;                                               // Mensaje status 201 es ok.
                 $count   = $result['count'];                                  // Nro de registros
                 $status  = 'Info';
                 $message = "The data has been created in the database with ID {' . $id . '} is correct.";
              }
           }
        }

        // Por defecto status = 404,si hay un error en la creacion de la fila o insert en db, dicho valor no es cambiado, y se envia en mensaje del error.
        if ($code == 404) {
           $message = "There has been an error creating the application in the {$this->tableClass->toTableName()} table ";
        }

        return
           [ 'status'  => $status,
             'code'    => $code,
             'count'   => $count,
             'message' => $message
            ];
    }
    // Si el debug = true, se grabara la informacion en el logger
    private function toDebugger(LoggerInterface $logger, $action, $message)
    {     
      if ($this->parameters->getDebug()) {
            $msg = $this->tableClass->toTableName() . ' ' . $this->tableClass->toTextFind() . ' ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }
}
 