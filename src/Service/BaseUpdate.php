<?php
/**
  * BaseFind.php
  * Description: Principal object update class of all templates
  * @Author : M.V.M.
  * @Version 1.0.15
**/
declare(strict_types=1);

namespace App\Service;
use App\Service\BaseRepository;
use App\Service\BaseUtils;
use App\Controller\BaseParameters;
use PDOException;

/*
  Observations :
    ROUTE : $group->put('/{$this->tableClass->toTable()}/update/{id}','App\Controller\{$this->tableClass->toTable()}\Update:update');
    ROUTE : $group->post('/{$this->tableClass->toTable()}/update/{id}','App\Controller\{$this->tableClass->toTable()}\Update:update');
*/

final class BaseUpdate extends BaseRepository
{
  protected object $tableClass;
  protected BaseParameters $parameters;

  public function __construct(object $tableClass, BaseParameters $parameters)
 {
      $this->tableClass  = $tableClass;
      $this->parameters  = $parameters;
 }

  public function update(array $body,array $args)
  {
       $status        = 'error';                                                       // status (Nombre de la tabla, error o info)
       $isUpdate      = false;                                                         // Booleano. Nos indica si podemos realizar el UPDATE.
       $code          = 404;                                                           // El status de control, se inicia con el valor 404.
       $count         = 0;                                                             // count default 0
       $data          = array();                                                       // data default array null
       $limit         = 0;
       $offset        = 0;
       $countKey      = 0;
       $paramKey      = null;
       $message       = '';
       $params        = array();
       $noPrimaryKey  = "NoPrimaryKey";
       $msgName       = $this->tableClass->toTableName() . ' ' . $this->tableClass->toTextFind() . ' ';
       $id = isset($args[$this->tableClass->getFieldsId()]) ? (int) $args[$this->tableClass->getFieldsId()] : 0; // Recuperar el id desde $args
       if ( $id > 0 && is_numeric($id))                                                 // Controlar si el id es mayor a 0 y numerico
       {
            $params=[$this->tableClass->getFieldsId() => $id];                          // Asignar a parametros de id el valor id de entrada
            $result  = (array) $this->query($this->parameters->getDb(), $this->tableClass, $params,(int) $limit, (int) $offset);  // Leemos base de datos
            $this->toDebugger($this->parameters->getLogger(),$this->parameters->getDebug(),$msgName,'query',$this->query);    // Si debug = true, graba el query en el logger
            if ($result['status'] != 'error')
            {                                                                           // Si hay error, no genera el logger, lo genera la clase principal
              $this->toDebugger($this->parameters->getLogger(),$this->parameters->getDebug(),$msgName,'result',$result);     // Si debug = true, graba los resultados en el logger
            }
            if ($result['code'] == 200 &&  $result['count'] > 0)                       // Si existe el registro con el select query, recuperamos los datos de la DB.
            {
                $data   = (array) $result['message'][0];                               // El primer registro de la matriz
                $inputs = $this->tableClass->toCheckValue($this->tableClass->toTextUpdate(),$body);   // Serializamos los campos y sus formatos asociados.
                $inputs[$this->tableClass->getFieldsId()] = $id ?? $inputs[$this->tableClass->getFieldsId()] ?? 0;   // Grabamos el id correcto en inputs
                $baseUtils    = new BaseUtils();                                       // New clase BaseUtils (Function para montar y gestionar los sql)
                $primaryKey   = (array) $this->tableClass->toPrimaryKey();             // Buscamos los campos de la clave primaria de la tabla.
                if (!is_null($primaryKey) && is_array($primaryKey) && !isset($primaryKey[$noPrimaryKey])) 
                {
                  $countKey = (int) count(array_keys($primaryKey));                      // Comprobamos si la tabla tiene campos de clave primaria.
                }
                if ($countKey > 0) {                                                   // Si tiene campos que conforman la clave primaryKey (Unique)
                    $paramKey    = (array) $baseUtils->buildingSqlPrimaryKey($primaryKey,$inputs); // Buscar valores y campos de la clave PrimaryKey input
                    $dataKey     = (array) $baseUtils->buildingSqlPrimaryKey($primaryKey,$data);   // Buscar valores y campos de la clave PrimaryKey db.
                    $isKeyEqual  = $baseUtils->buildingCheckPrimaryKey($dataKey,$paramKey); // Compara valores de campos de clave son iguales  
                    if ($isKeyEqual)                                                   // Si son iguales activamos el booleano para realizar el update.
                    {
                      $isUpdate = true;                                                // Por igual,se quitara del UPDATE los campos y valores de la primaryKey.
                    }
                    else                                                               // Los valores de los campos de primaryKey son diferentes entre la DB e inputs
                    {
                      $result  = $this->toCount($this->parameters->getDb(),$this->tableClass->toTable(),$this->tableClass->getFieldsId(),$paramKey); // PDO: Analizar si existen filas con clave primaria y su valor nuevo (inputs)
                      $this->toDebugger($this->parameters->getLogger(),$this->parameters->getDebug(),$msgName,'count',$this->query); // Si debug = true, graba el query en el logger
                      if ($result['status'] != 'Error')
                      {                                                                         // Si hay error, no genera el logger, lo genera la clase principal
                        $this->toDebugger($this->parameters->getLogger(),$this->parameters->getDebug(),$msgName,'result',$result);    // Si debug = true, graba los resultados en el logger
                      }
                      if ($result['code'] == 404 &&  $result['count'] == 0)                     // El code=404 ,indica que no existe el valor nuevo de la clave primaria;
                      {
                        $primaryKey = array();                                                  // PrimaryKey se inicializa,para que actualice los nuevos valores.
                        $isUpdate = true;                                                       // Indicamos que se puede realizar el UPDATE
                      }
                    }
                }
                else                                                                            // La tabla no tiene clave primaria (PrimaryKey Unique).
                {
                    $isUpdate = true;                                                           // Indicamos que se puede realizar el UPDATE
                }

                if ($isUpdate)                                                                  // Se procede al UPDATE
                {
                    $sql  = $baseUtils->buildingSqlUpdate($inputs, $this->tableClass->toTable(),$this->tableClass->getFieldsId(), $primaryKey );    // Montar la sentencia UPDATE
                    if (!empty($sql))
                    {
                        $params = (array) $baseUtils->buildingSqlParams($inputs, $this->tableClass->toTextUpdate(),$this->tableClass->getFieldsId(), $primaryKey );
                        $msgDebug = 'sql: '.$sql.' params: '.str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
                        $this->toDebugger($this->parameters->getLogger(),$this->parameters->getDebug(),$msgName,'query',$msgDebug);  // Si debug = true, graba el sql y parametros en el logger
                        $stmt = $this->parameters->getDb()->prepare($sql);                                    // PDO: Preparamos la sentencia query y la enviamos.
                        try
                        {
                           $stmt ->execute($params);                                                    // PDO: Ejecutamos  el Update con sus parametros.
                           $code    = 200;
                           $status  = 'Info';
                           $message = "The data has been updated in the {$this->tableClass->toTableName()} database";
                        }
                        catch(PDOException $e)
                        {
                          $code    = 500;
                          $message = $e->getMessage();
                        }
                    }
                    else
                   {
                       $message = "Invalid json structure.";
                   }
                }
                else
                {
                  $value = str_replace('"','',json_encode($paramKey,JSON_PARTIAL_OUTPUT_ON_ERROR ));
                  $message = "A {$this->tableClass->toTableName()} with {$this->tableClass->getFieldsId()} . {$args[$this->tableClass->getFieldsId()]} .'} and $value is not correct.";
                }
            }
        }

        if ($code == 404)
        {
            if (empty($message))
            {
              $message = "A {$this->tableClass->toTableName()} with {$this->tableClass->getFieldsId()} {' . {$args[$this->tableClass->getFieldsId()]} . '} is not correct.";
            }
        }

        return
           ['status'  => $status,
            'code'    => $code,
            'count'   => $count,
            'message' => $message
           ];
  }
}
 