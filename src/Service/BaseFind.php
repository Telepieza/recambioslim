<?php 
/** 
  * BaseFind.php
  * Description: Principal object read class of all templates
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Service;                                 
use App\Controller\BaseParameters;
use Psr\Log\LoggerInterface;

/*
  Observaciones :
    ROUTE : $group->get('/{$tableName}','App\Controller\{$tableName}\Find:getAll');
    ROUTE : $group->get('/{$tableName}/{id}','App\Controller\{$tableName}\Find:getOne');
*/
 final class BaseFind extends BaseRepository
{
    protected object $tableClass;
    protected BaseParameters $parameters;

    public function __construct(object $tableClass, BaseParameters $parameters)   
   {
        $this->tableClass   = $tableClass;  
        $this->parameters  = $parameters;
   }
    // Leemos los registros de una tabla dependiendo de limit y offset
    public function getAll(array $query) 
    {
        $limit  = (int) isset($query['limit'])  ? $query['limit']  : $this->parameters->getPerPage();   // Localizamos el Limit  por parameter
        $offset = (int) isset($query['offset']) ? $query['offset'] : 0;                                 // Localizamos el offset por parameter
        if ($this->parameters->getPerPage() > $limit)                                                   // Control del limite por defecto .env PER_PAGE
        {
          $limit =  $this->parameters->getPerPage();
        }
        $records = array();                                                                    
        $count   = 0;  
        $fields  = (array) $this->tableClass->toMapfields();                                            // Asignar las campos de la tabla a visualizar
        $results = $this->count($this->parameters->getDb(),$this->tableClass->toTable(),$this->tableClass->getFieldsId(), array());   // Buscar total de filas
        $count   = (int) isset($results['count']) ? $results['count'] : 0;                              // Pasar a count total de filas
        if ($results['status'] != 'error' && $results['code'] === 200 && $count > 0) 
        {                         
            $results = $this->query($this->parameters->getDb(), $this->tableClass->toTable(), $this->tableClass->getFieldsId(),  // Query DDBB
                                    $this->tableClass->toSortOrder(), $fields, array(), (int) $limit, (int) $offset);  
            $this->toDebugger($this->parameters->getLogger(),'query ', $this->query);                   // Si debug = true, graba el query en el logger
            if ($results['status'] != 'error')                                                          // Si hay error, no genera el logger, lo genera la clase principal
            {                                
               $this->toDebugger($this->parameters->getLogger(),'result ', $results);                   // Si debug = true, graba los resultados en el logger
            }                                                                         
            if  ($results['code'] === 200)                                                               // Si es 200 procedemos a leer los datos.     
            {                                                                               
               foreach ($results['message'] as $record)                                                  // Leemos los registos recupereados de la DDBB      
               {                                                           
                  $records[] = $this->tableClass->toCheckValue($this->tableClass->toTextFind(),$record); // Chequeamos todas las filas y sus columnas,antes de visualizar
               }                                                               
               $results['status'] = $this->tableClass->toTableName();                                    // Nombre de la tabla
               $results['message'] = $records;                                                           // Pasamos el objeto array a json
               $records = null;                                                                          // Liberamos memoria.
            }
        }
        $paginateEntity = $this->toPagination((int) $this->parameters->getPerPage(), (int) $count, (int) $limit, (int) $offset); // Pasamos datos paginacion al objeto
        return  [ 'status'  => $results['status'],
                  'code'    => $results['code'],
                  'count'   => (int) $count,
                  'message' => $results['message'],
                  'pagination' => json_encode($paginateEntity)
                ];
    }
    // Leemos un registro de una tabla dependiendo del id
    public function getOne(array $args)
    {
        $params   = array();                                                          // parametros 
        $count    = 0;                                                                // Contador nro de registros
        $limit    = 0; 
        $offset   = 0;
        $records  = array();                                                          // Inicializamos array records
        $afields  = (array) $this->tableClass->toMapfields();                         // Inicializar array parametros sql
        $id       = isset($args[$this->tableClass->getFieldsId()]) ? $args[$this->tableClass->getFieldsId()] : 0; // $sql = "SELECT * FROM {$table} WHERE id = :id"
        $params=[$this->tableClass->getFieldsId() => $id];                            // Asignar a parametros de id el valor id de entrada
        $result  = (array) $this->query($this->parameters->getDb(), $this->tableClass->toTable(), $this->tableClass->getFieldsId(),
                           $this->tableClass->toSortOrder(), $afields, $params,(int) $limit, (int) $offset);  // Leemos base de datos
        $this->toDebugger($this->parameters->getLogger(),'query' . ' ' . $this->tableClass->getFieldsId() . ':' . $id, $this->query); 
        if ($result['status'] != 'Error') {                                            // Si hay error, no genera el logger, lo genera la clase principal
          $this->toDebugger($this->parameters->getLogger(),'result', $result);         // Si debug = true, graba los resultados en el logger
        }
        if  ($result['code'] === 200)                                                  // Si estatus = 200, se han localizado registros en BD
        {                                                     
            foreach ($result['message'] as $record)                                    // Leemos los registos recupereados de la BD
            {                                  
               $records[] =  $this->tableClass->toCheckValue($this->tableClass->toTextFind(),$record);  // Chequeamos todas las filas y sus columnas, antes de visualizar
            } 
            $result['status']  =$this->tableClass->toTableName();                      // Nombre de la tabla             
            $result['message'] = $records;                                             // Pasamos el objeto array a json
            $records = null;                                                           // Liberamos memoria.
        }
       return   
            [ 'status'  => $result['status'],
              'code'    => $result['code'],
              'count'   => $count,
              'message' => $result['message'],
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

