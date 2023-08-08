<?php 

declare(strict_types=1);

namespace App\Service\Citas;                                                  // (1) Modificar en la clase nueva el valor, si se copia la clase.
use App\Entity\Citas ;                                                       // (1) Modificar en la clase nueva el valor, si se copia la clase.

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use App\Service\BaseRepository;
use App\Service\BaseUtils;

use PDO;
use PDOException;

/*
  1.- Recoge los datos del request con getParseBody
  2.- Asigna nombre de la tabla y asocia la clase de la tabla al objeto de negocio ($this).
  3.- Busca los campos que conforman la clave unica de la tabla: No es el ID.
  4.- Busca mediante un Select count(*), si existe la clave unica antes de realizar el Insert to.
  5.- Si no existe, $result['code'] = 404 y count = 0, sigue el proceso, si existe  $result['code'] = 200, da mensaje de error con status 404.
  6.- Serializa los campos a grabar en la base de datos, excepto el ID, por ser Auto_Increment
  7.- Localiza y monta la sentencia INSERT TO del SQL con los nombres y valores a insertar en la DB.
  8.- Localiza y monta los parametros (Campos y Valores asociados), antes de realizar el execute del PDO.
  9.- PDO: prepare y execute la sentencia sql, con control de try y catch, por si hay Exception por parte de PDO.
 10.- Localiza el ultimo valor ID insertado, entendiendo que posiblemente no sea el que se ha creado en la sentencia INSERT TO.
 11.- Busca mediante un Select count(*), el registro grabado con INSERT con la clave unica en la DB.
 12.- Si existe la clave, $result['code'] == 200 y count > 0. El proceso del INSERT TO en DB es ok, damos mensaje por JSON de todo ok.
 13.- Si esta activo el debug, la clase en cada accion de base de datos, va grabando la informacion en el fichero de logger, para su control.

  Observaciones :
   ROUTE : $group->post('/{$tableName}/new','App\Controller\{$tableName}\Create:create');
   En todos los procesos de la clase, si existe Exception, al final de la clase, se analiza con el status = 404, para enviar un mensaje de error por json.
   La instruccion return $this->jsonResponse($response, 'success', $message, $code). El $message puede tener los datos o el mensaje de error.
   Si hacemos una copia de la clase a otra clase, para tratar otra tabla, las sentencias a cambiar en la nueva clase, son las que tienen en el comentario un (1).
   Se aconseja que en la configuracion, se active el debug, para realizar el seguimiento de la api como de los accessos de los usuarios a la base de datos.
*/

final class Create extends BaseRepository 
{
    protected bool $debug;
    protected Citas $tableClass;
    public function create(PDO $db, Request $request, LoggerInterface $logger, bool $debug) {
      
        $this->debug   = $debug;
        $body       = (array) $request->getParsedBody();                        // Asignar los datos del Body del request y pasarlos a un array inputs
        $this->tableClass = new Citas($body);                                   // (1) Modificar si se copia la clase a otra clase. (Nombre de la clase) 
        $id         = 0;                                                        // Se inicia el id con valor 0.
        $code       = 404;                                                      // Status = 404. Nos evitamos de gestionar todos los else de cada uno de los if.
        $status     = 'Error';                                                  // Status default = "Error"
        $count      = 0;                                                        // Count = 0                                                    
        $this->toDebugger($logger,'body', $this->tableClass->toJson());         // Si debug = true, graba la informacion de entrada en logger
        $inputs     = (array) $this->tableClass->toCheckValue($this->tableClass->toTextCreate(),$body);
        $this->toDebugger($logger,'inputs', $inputs);                           // Si debug = true, graba la informacion chequeda en el logger
        $primaryKey = $this->tableClass->toPrimaryKey();                        // Campos de la clave primaria de la tabla.
        $baseutils  = new BaseUtils();                                          // New clase BaseUtils (Function para montar los sql)
        $paramKey   = $baseutils->buildingSqlPrimaryKey($primaryKey, $inputs);  // Asignar los valores a los campos de la clave primaria
        $result     = $this->count($db,$this->tableClass->toTable(),$paramKey); // PDO: Analizar si existen filas con la clave primaria y su valor
        $msgDebug = 'count: '.$result['count'].' key: '. json_encode($paramKey,JSON_PARTIAL_OUTPUT_ON_ERROR );
        $this->toDebugger($logger, $msgDebug, $this->query);                    // Si debug = true, graba el query en el logger
        if ($result['code'] == 404 &&  $result['count'] == 0)                   // El code=404 y count=0,indica que no existe la clave primaria, procedemos al insert
        {
           $data   = $this->tableClass->jsonSerialize($this->tableClass->toTextCreate()); // Serializamos los campos dando los formatos a cada uno de ellos.
           $sql    = $baseutils->buildingSqlInsert($data, $this->tableClass->toTable());  // Montamos sentencia sql, Ejemplo: INSERT INTO citas (area,nombre) VALUES (:area,:nombre)
           $params = $baseutils->buildingSqlParams($inputs, $this->tableClass->toTextCreate(), array()); // Asignamos los parametros asociando los valores del insert.
           $msgDebug = 'sql: '.$sql.' params: '. str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
           $this->toDebugger($logger,'',$msgDebug);
           $stmt = $db->prepare($sql);                                        // PDO: Preparamos la sentencia query y la enviamos.
           try
           {
              $result = $stmt->execute($params);                              // PDO: Ejecutamos  el insert con sus parametros.
              if ($result) 
              {
                 $id =  $db->lastInsertId();                                  // PDO: Localizamos el ultimo id creado anteriormente
              }
           } catch(PDOException $e)
           {
             $code = 500; 
             $message = $e->getMessage();                                      // Mensaje de error
           }

           if ($id > 0) {                                                      // Si el id > 0 la creacion de la fila o del registro puede ser correcto.
              $result = $this->count($db,$this->tableClass->toTable(),$paramKey);                // PDO: Analizamos si se ha creado la fila en DDBB con un count y clave primaria
              $msgDebug = 'id: '.$id.' count: '.$result['count'].' key: '.json_encode($paramKey,JSON_PARTIAL_OUTPUT_ON_ERROR );
              $this->toDebugger($logger, $msgDebug, $this->query);               // Si debug = true, graba el count del query en el logger
              if ($result['code'] == 200 &&  $result['count'] > 0) {           // Si el code = 200 y count > 0, significa que se ha creado la fila y es ok.
                 $code    = 201;                                               // Mensaje status 201 es ok.
                 $count   = $result['count'];                                  // Nro de registros
                 $status  = 'Info';
                 $message = "The data has been created in the database with ID {' . $id . '} is correct.";
              }  
           }  
        } 

        // Por defecto status = 404,si hay un error en la creacion de la fila o insert en db, dicho valor no es cambiado, y se envia en mensaje del error.
        if ($code == 404) {
           $message = "There has been an error creating the application in the {$this->tableClass->toTable()} table ";
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
      if ($this->debug) {
            $msg = $this->tableClass->toTable() . ' ' . $this->tableClass->toTextCreate() . ' ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }

}
 