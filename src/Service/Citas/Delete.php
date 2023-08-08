<?php 

declare(strict_types=1);

namespace App\Service\Citas;                                    // (1) Modificar en la clase nueva el valor, si se copia la clase.                       
use App\Entity\Citas ;                                                   // (1) Modificar en la clase nueva el valor, si se copia la clase.

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use App\Service\BaseRepository;

use PDO;
use PDOException;

/*
  1.- Recoge el ID por el array $args. Es una forma diferente de extraer el ID.
  2.- Analizamos si el id > 0 y si es un dato numerico.
  3.- Pasamos a array params el valor del ID.
  4.- Busca mediante un Select count(*), si existe con el ID, antes de realizar el DELETE.
  5.- Si existe el registro, $result['code'] == 200 y count > 0. Se procede a crear la sentencia DELETE FROM.
  6.- PDO: prepare y execute la sentencia sql, con control de try y catch, por si hay Exception por parte de PDO.
  7.- Si es borrado el registro, el status = 204 y damos mensaje por JSON de todo ok.
  8.- Si esta activo el debug, la clase en cada accion de base de datos, va grabando la informacion en el fichero de logger, para su control.

  Observaciones :
   ROUTE : $group->delete('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
   En todos los procesos de la clase, si existe Exception, se analizan colocando el status = 404 o 500, para enviar um mensaje de error por json.
   La instruccion return $this->jsonResponse($response, 'success', $message, $code). El $message puede tener los datos o el mensaje de error.
   Si hacemos una copia de la clase a otra clase, para tratar otra tabla, las sentencias a cambiar en la nueva clase, son las que tienen en el comentario un (1).
   Se aconseja que en la configuracion, se active el debug, para realizar el seguimiento de la api como de los accessos de los usuarios a la base de datos.
*/

final class Delete extends BaseRepository
{

   protected bool $debug;
   protected Citas $tableClass;
  public function delete(PDO $db, Request $request, array $args, LoggerInterface $logger, bool $debug) 
  {

      $this->debug   = $debug;                                               // Debug
      $body          = (array) $request->getParsedBody();                    // Asignar los datos del Body del request y pasarlos a un array.  
      $this->tableClass = new Citas($body);                                  // (1) Modificar si se copia la clase a otra clase. (Nombre de la clase) 
      $count  = 0;                                                           // count default = 0
      $status = 'Error';                                                     // status default = 'Error'
      $id = isset($args['id']) ? (int) $args['id'] : 0;                      // Recuperar el id desde $args
      if ( $id > 0 && is_numeric($id))                                       // Controlar si el id es mayor a 0 y numerico
      {
         $params  = ['id' => $id];                                           // Pasamos el id a parametros
         $result  = $this->count($db,$this->tableClass->toTable(), $params); // Ejemplo sentencia : $sql = "SELECT COUNT(*) FROM `{$tableName}` WHERE `id` = :id";
         $msgDebug = 'count: '.$result['count'].' key: '.json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR );
         $this->toDebugger($logger, $msgDebug, $this->query);                                                       // print_r($result['code']); echo "  "; print_r($result['count']);
         if ($result['code'] == 200 &&  $result['count'] > 0)                 // Si existe el registro con el select count(*)
         {    
            $sql  = "DELETE FROM `{$this->tableClass->toTable()}` WHERE `id` = :id"; // Montamos la sentencia delete con el id
            $stmt = $db->prepare($sql);                                              // preparamos la sentencia sql
            $msgDebug = 'sql: '.$sql.' params: '.str_replace('"','',json_encode($params,JSON_PARTIAL_OUTPUT_ON_ERROR ));
            $this->toDebugger($logger,'',$msgDebug);                                 // Si debug = true, graba el sql y parametros en el logger
            try 
            {
               $stmt->execute($params);                                              // Ejecutamos la sentencia
               $code    = 204;                                                       // Si es ok, info status 204
               $count   = $result['count'];                                          // Nro registros
               $status  = "Info";
               $message = "The data has been deleted in the database";
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
           $message = "There is no information in the {$this->tableClass->toTable()} table";
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
          $msg = $this->tableClass->toTable() . ' ' .  $this->tableClass->toTextDelete() . ' ' . $action . ' ' . json_encode($message);
          $logger->debug($msg);
    }
  }
}

