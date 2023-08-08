<?php 

declare(strict_types=1);

namespace App\Service\Citas;                                      // (1) Modificar en la clase nueva el valor, si se copia la clase.
use App\Entity\Citas ;                                                     // (1) Modificar en la clase nueva el valor, si se copia la clase.
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use App\Service\BaseRepository;

use PDO;

/*
  1.- Son dos funciones separadas. La function getAll que lee todos los registros, y getOne lee un solo registro de la DB.
  2.- Recoge los datos del request con getParseBody
  3.- Asigna nombre de la tabla y asocia la clase de la tabla al objeto de negocio ($this).
  2.- Busca los nombre de los campos de la tabla a visualizar. Muchas tablas tenen datos que no es necesario su visualizacion.
  4.- Montamos la sentencia SQL mediante un SELECT y sus campos asociados o con un *.
  5.- Para la funcion getOne, se localiza el ID, y se analiza si es un dato numerico para pasarlo como parametro al PDO.
  6.- PDO: prepare y execute la sentencia sql, con control de try y catch, por si hay Exception por parte de PDO.
  7.- Si existen resultados, lee los registros de la base de datos con un foreach
  8.- Cada registro o fila, se envia a una verificación de todas sus columnas (Campos), para un chequeo de datos, antes de pasar el array a json.
  9.- Si esta activo el debug, la clase en cada accion de base de datos, va grabando la informacion en el fichero de logger, para su control.

  Observaciones :
    ROUTE : $group->get('/{$tableName}','App\Controller\{$tableName}\Find:getAll');
    ROUTE : $group->get('/{$tableName}/{id}','App\Controller\{$tableName}\Find:getOne');
    En todos los procesos de la clase, si existe Exception, se analizan colocando el status = 404 o 500, para enviar un mensaje de error por json.
    La instruccion return $this->jsonResponse($response, 'success', $result['message'], $result['code']). El message puede tener los datos o un mensaje de error.
    Si hacemos una copia de la clase a otra clase, para tratar otra tabla, las sentencias a cambiar en la nueva clase, son las que tienen en el comentario un (1).
    Se aconseja que en la configuracion, se active el debug, para realizar el seguimiento de la api como de los accessos de los usuarios a la base de datos.
*/
 final class Find extends BaseRepository
{
    protected bool $debug;
    protected Citas $tableClass;

    public function getAll(PDO $db, Request $request, int $perPage, LoggerInterface $logger, bool $debug) 
    {
        $this->debug   = $debug;                                                                  // Debug
        $body          = (array) $request->getParsedBody();                                       // Asignar los datos del Body del request y pasarlos a un array.  
        $query         = (array) $request->getQueryParams();    
        $this->tableClass = new Citas($body);                                                     // (1) Modificar si se copia la clase. (Nombre de la clase) 
        $limit  = (int) isset($query['limit'])  ? $query['limit']  : $perPage; 
        $offset = (int) isset($query['offset']) ? $query['offset'] : 0;
        if ($limit > $perPage) 
        {
          $limit = $perPage;
        }
        $records  = array();                                                                    
        $count    = 0;  
        $fields  = (array) $this->tableClass->toMapfields();                                          // Asignar las campos de la tabla a visualizar
        $results = $this->count($db,$this->tableClass->toTable(), array());                           // Buscar total de filas
        $count   = (int) isset($results["count"]) ? $results["count"] : 0;                             // Pasar a count total de filas
        if ($results['status'] != 'Error' && $results['code'] === 200 && $count > 0) 
        {                         
            $results = $this->query($db,$this->tableClass->toTable(), $fields, array(), (int) $limit, (int) $offset);  // Select con db,nombre tabla, campos y parametros
            $this->toDebugger($logger,'query ', $this->query);                                             // Si debug = true, graba el query en el logger
            if ($results['status'] != 'Error')                                                             // Si hay error, no genera el logger, lo genera la clase principal
            {                                
               $this->toDebugger($logger,'result ', $results);                                             // Si debug = true, graba los resultados en el logger
            }                                                                         
            if  ($results['code'] === 200)                                                                 // Si es 200 procedemos a leer los datos.     
            {                                                                               
               foreach ($results['message'] as $record)                                                   // Leemos los registos recupereados de la BD      
               {                                                           
                  $records[] = $this->tableClass->toCheckValue($this->tableClass->toTextFind(),$record);  // Chequeamos todas las filas y sus columnas, antes de visualizar
               }                                                               // Nro de registros
               $results['status'] = $this->tableClass->toTable();                                         // Nombre de la tabla
               $results['message'] = $records;                                                            // Pasamos el objeto array a json
               $records = null;    
            }
        }

        $paginateEntity = $this->toPagination($perPage, $count, (int) $limit, (int) $offset); 
        
        return  [ 'status'  => $results['status'],
                  'code'    => $results['code'],
                  'count'   => $count,
                  'message' => $results['message'],
                  'pagination' => json_encode($paginateEntity)
                ];
    }

    public function getOne(PDO $db,Request $request, array $args,LoggerInterface $logger, bool $debug)
    {
        $this->debug   = $debug;                                                               // Debug
        $body          = (array) $request->getParsedBody();                                    // Asignar los datos del Body del request y pasarlos a un array.
 
        $this->tableClass = new Citas($body);                                                  // (1) Modificar si se copia la clase. (Nombre de la clase) 
        $params        = array();                                                              // parametros 
        $count         = 0;                                                                    // Contador nro de registros
        $limit         = 0; 
        $offset        = 0;
        $records       = array();                                                              // Inicializamos array records
        $afields       = (array) $this->tableClass->toMapfields();                             // Inicializar array parametros sql
        $id            = isset($args['id']) ? $args['id'] : 0;                                 // Recuperar el id desde $args. Localizar parametro id
                                                                                               // Ejemplo : $sql = "SELECT * FROM {$table} WHERE id = :id";
        $params=['id' => $id];                                                                 // Asignar a parametros de id el valor id de entrada
        $result  = $this->query($db,$this->tableClass->toTable(), $afields, $params, (int) $limit, (int) $offset);          // Select con db,nombre tabla, campos y parametros
        $this->toDebugger($logger,'query id:' . $id, $this->query);                            // Si debug = true, graba el query en el logger
        if ($result['status'] != 'Error') {                                                    // Si hay error, no genera el logger, lo genera la clase principal
          $this->toDebugger($logger,'result', $result);                                        // Si debug = true, graba los resultados en el logger
        }
        if  ($result['code'] === 200)                                                          // Si estatus = 200, se han localizado registros en BD
        {                                                     
            foreach ($result['message'] as $record)                                            // Leemos los registos recupereados de la BD
            {                                    
               $records[] = $this->tableClass->toCheckValue($this->tableClass->toTextFind(),$record); // Chequeamos todas las filas y sus columnas, antes de visualizar
            } 
            $result['status']  =$this->tableClass->toTable();                                  // Nombre de la tabla             
            $result['message'] = $records;                                                     // Pasamos el objeto array a json
            $records = null;                                                                   // Liberamos memoria.
        }
    
       return   
            [ 'status'  => $result['status'],
              'code'    => $result['code'],
              'count'   => $count,
              'message' => $result['message'],
            ];  
    }

    private function toDebugger(LoggerInterface $logger, $action, $message) 
    {     
      if ($this->debug) {
            $msg = $this->tableClass->toTable() . ' ' . $this->tableClass->toTextFind() . ' ' . $action . ' ' . json_encode($message);
            $logger->debug($msg);
      }
    }

}

