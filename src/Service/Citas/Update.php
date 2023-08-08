<?php 

declare(strict_types=1);

namespace App\Service\Citas;                                               // (1) Modificar en la clase nueva el valor, si se copia la clase.
use App\Entity\Citas;                                                            // (1) Modificar en la clase nueva el valor, si se copia la clase.

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use App\Service\BaseRepository;
use App\Service\BaseUtils;

use PDO;
use PDOException;

/*
   1.- Recoge los datos del request con getParseBody
   2.- Asigna nombre de la tabla y asocia la clase de la tabla al objeto de negocio ($this).
   3.- Recupera el valor del id desde $args
   4.- Sentencia Select con db,nombre tabla, campos y parametros con where id=:id y su valor
   5.- Si existe, $result['code'] == 200 &&  $result['count'] > 0, sigue el proceso, si no existe , da mensaje de error con status 404.
   6.- Serializa los campos a grabar en la base de datos, excepto el ID, por ser Auto_Increment
   7.- Analizamos si la tabla tiene clave primaria unica, para buscar los nombres de los campos que conforman la clave primaria. 
      SI TIENE CLAVE PRIMARIA LA TABLA
         A).- Buscar valores y campos de la clave PrimaryKey del input
         B).- Buscar valores y campos de la clave PrimaryKey de la base de datos
         C).- Compara los valores de cada campo que conforman la clave primaria unica entre la entrada y base de datos.
         D).- Si los valores son iguales, se quitaran los campos y sus valores de la clave primaria, en la sentencia UPDATE del SQL.
         E).- Si los valores son diferentes, se leera con un SELECT COUNT(*) y WHERE con los campos de la clave principal y los valores de entrada.
              Si existe la clave, no realizara el update, porque dara clave duplicada, pero si no existe, se procedera a modificar la clave con el UPDATE.
   8.- Localiza y monta los parametros (Campos y valores asociados), antes de realizar el execute del PDO.
   9.- PDO: prepare y execute la sentencia sql, con control de try y catch, por si hay Exception por parte de PDO.
  10.- Si esta activo el debug, la clase en cada accion de base de datos, va grabando la informacion en el fichero de logger, para su control.

  Observaciones :
    ROUTE : $group->put('/{$this->tableClass->toTable()}/update/{id}','App\Controller\{$this->tableClass->toTable()}\Update:update');
    En todos los procesos de la clase, si existe Exception, al final de la clase, se analiza con el status = 404, para enviar um mensaje de error por json.
    La instruccion return $this->jsonResponse($response, 'success', $message, $code). El $message puede tener los datos o el mensaje de error.
    Si hacemos una copia de la clase a otra clase, para tratar otra tabla, las sentencias a cambiar en la nueva clase, son las que tienen en el comentario un (1).
    Al comprobar ante de realizar el update, que no existe el registro con el ID, la clase no crea el registro con un INSERT TO, solo gestiona el UPDATE.
    Se aconseja que en la configuracion, se active el debug, para realizar el seguimiento de la api como de los accessos de los usuarios a la base de datos.

*/

final class Update extends BaseRepository 
{
  protected bool $debug;
  protected Citas $tableClass;
  public function update(PDO $db, Request $request, array $args, LoggerInterface $logger, bool $debug) 
  {
       $this->debug   = $debug;                                                        // Debug
       $body          = (array) $request->getParsedBody();                             // Asignar los datos del Body del request y pasarlos a un array.  
       $this->tableClass = new Citas($body);                                           // (1) Modificar si se copia la clase a otra clase. (Nombre de la clase) 
       $status        = 'Error';                                                       // status (Nombre de la tabla, error o info)
       $isUpdate      = false;                                                         // Booleano. Nos indica si podemos realizar el UPDATE.
       $code          = 404;                                                           // El status de control, se inicia con el valor 404.
       $count         = 0;                                                             // count default 0
       $data          = array();                                                       // data default array null
       $id = isset($args['id']) ? (int) $args['id'] : 0;                               // Recuperar el id desde $args
       $limit         = 0;
       $offset        = 0;
       
       if ( $id > 0 && is_numeric($id))                                                // Controlar si el id es mayor a 0 y numerico
       {
            $params    = array();                                                      // Iniciamos $params (parametros del sql)
            $fields    = (array)$this->tableClass->toMapfields();                      // Asignar las campos de la tabla a visualizar
            $paramId   = ['id' => $id];                                                // Asignar a parametros, el valor del id de la entrada
            $result    = $this->query($db,$this->tableClass->toTable(), $fields, $paramId, $limit, $offset);  // Select con db,nombre tabla, campos y parametro del id y su valor
            $this->toDebugger($logger,'query', $this->query);                          // Si debug = true, graba el query en el logger
            if ($result['status'] != 'Error') {                                        // Si hay error, no genera el logger, lo genera la clase principal
              $this->toDebugger($logger,'result', $result);                            // Si debug = true, graba los resultados en el logger
            }     
            if ($result['code'] == 200 &&  $result['count'] > 0)                       // Si existe el registro con el select query, recuperamos los datos de la DB.
            {
                $data   = (array) $result['message'][0];                               // El primer registro de la matriz
                $inputs = $this->tableClass->toCheckValue($this->tableClass->toTextUpdate(),$body);   // Serializamos los campos y sus formatos asociados.
                $inputs['id'] = $id ?? $inputs['id'] ?? 0;                             // Grabamos el id correcto en inputs
                $primaryKey   = (array)$this->tableClass->toPrimaryKey();              // Buscamos los campos de la clave primaria de la tabla.
                $baseutils    = new BaseUtils();                                       // New clase BaseUtils (Function para montar y gestionar los sql)
                $countKey = (int) count(array_keys($primaryKey));                      // Comprobamos si la tabla tiene campos de clave primaria.
                if ($countKey > 0) {                                                   // Si tiene campos que conforman la clave primaryKey (Unique)
                    $paramKey    = (array) $baseutils->buildingSqlPrimaryKey($primaryKey,$inputs); // Buscar valores y campos de la clave PrimaryKey input
                    $dataKey     = (array) $baseutils->buildingSqlPrimaryKey($primaryKey,$data);   // Buscar valores y campos de la clave PrimaryKey db.
                    $isKeyEqual  = $baseutils->buildingCheckPrimaryKey($dataKey,$paramKey); // Compara valores de campos de clave son iguales  
                    if ($isKeyEqual)                                                   // Si son iguales activamos el booleano para realizar el update.
                    {
                      $isUpdate = true;                                                // Por igual,se quitara del UPDATE los campos y valores de la primaryKey.
                    }
                    else                                                               // Los valores de los campos de primaryKey son diferentes entre la DB e inputs
                    {
                      $result  = $this->count($db,$this->tableClass->toTable(),$paramKey); // PDO: Analizar si existen filas con clave primaria y su valor nuevo (inputs)
                      $this->toDebugger($logger,'count',  $this->query);                   // Si debug = true, graba el query en el logger
                      if ($result['status'] != 'Error') {                                  // Si hay error, no genera el logger, lo genera la clase principal
                        $this->toDebugger($logger,'result', $result);                      // Si debug = true, graba los resultados en el logger
                      } 
                      if ($result['code'] == 404 &&  $result['count'] == 0)                // El code=404 ,indica que no existe el valor nuevo de la clave primaria;
                      {
                        $primaryKey = array();                                             // PrimaryKey se inicializa,para que actualice los nuevos valores.
                        $isUpdate = true;                                                  // Indicamos que se puede realizar el UPDATE
                      }
                    }
                }  
                else                                                                   // La tabla no tiene clave primaria (PrimaryKey Unique).
                {
                      $isUpdate = true;                                                // Indicamos que se puede realizar el UPDATE
                } 
                if ($isUpdate)                                                         // Se procede al UPDATE                                                      
                {   
                    $sql    = $baseutils->buildingSqlUpdate($inputs, $this->tableClass->toTable(), $primaryKey );      // Montar la sentencia UPDATE sus campos y where
                    $params = (array) $baseutils->buildingSqlParams($inputs, $this->tableClass->toTextUpdate(), $primaryKey ); // Montar los parametros (valores) para la sentencia UPDATE
                    $msgDebug = 'sql: '.$sql.' params: '.str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
                    $this->toDebugger($logger, '',$msgDebug);                                       // Si debug = true, graba el sql y parametros en el logger
                    $stmt = $db->prepare($sql);                                                     // PDO: Preparamos la sentencia query y la enviamos.
                    try 
                    {
                        $stmt ->execute($params);                                                    // PDO: Ejecutamos  el Update con sus parametros.
                        $code    = 200;
                        $status  = "Info";
                        $message = "The data has been updated in the {$this->tableClass->toTable()} database";
                    } 
                    catch(PDOException $e) 
                    {
                        $code    = 500;
                        $message = $e->getMessage();
                    }
                }
            }
        }  
        if ($code == 404) {
            $message = "Invalid login credentials provided.";
        }

        return  
           ['status'  => $status,
            'code'    => $code,
            'count'   => $count,
            'message' => $message
           ];
  }

  private function toDebugger(LoggerInterface $logger, $action, $message) 
    {     
      if ($this->debug) {
            $msg = $this->tableClass->toTable() . ' ' . $this->tableClass->toTextUpdate() . ' ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }
}
 