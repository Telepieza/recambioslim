<?php 

declare(strict_types=1);

namespace App\Service;

use PDOException;
use PDO;

class BaseRepository 
{
    protected string $query;
    public function query(PDO $db, string $table, string $fieldsId, string $fieldOrder, $pfields=array(), $pparams=array(), int $limit, int $offset)
    {
        $params       = array();
        $id           = 0;
        $sql          = '';
        $this->query  = '';
        $code         = 0;
        $count        = 0;
        $message      = '';
        $code         = 404;
        $status       = 'error';
        $results      = array();
        $pagination   = '';
        $tableName    = $table;
        if (strpos($table,'_')) 
        {
            $tableName = substr($table, strpos($table, '_') + 1);
        }
        $baseUtils   = new BaseUtils();
        $fields      = $baseUtils->buildingSqlFields($pfields);  // fields
 
        $this->query = "SELECT {$fields} FROM `{$table}` ";
        if ($limit > 0 ) {
            $pagination = " LIMIT :limit OFFSET :offset "; 
        }
        $where  = $baseUtils->buildingSqlWhere($pparams,$fieldsId);    // where
        if (empty($where))
        {   
            if (!empty(trim($fieldOrder))) {
               $sql = 'ORDER BY ' . $fieldOrder;  
            }
            else {
                $sql = 'ORDER BY ' . $fieldsId;  
            }
        } 
        else
        { 
            $sql = 'WHERE ' . $where;
            $params = $baseUtils->buildingSqlParams($pparams,'select',$fieldsId, array());  // parameters
            if (isset($params[$fieldsId])) 
            { 
               $id = $params[$fieldsId];
            } 
            else 
            {
               if (str_contains($sql,':' . $fieldsId)) 
               {
                  $id = 0;
               } 
           }
        }

        $this->query .= $sql . $pagination ;

// echo "query:" .  $this->query . "\n";

        if ($limit > 0 ) {
           $params['limit']  = $limit;
           $params['offset'] = $offset;
        }

        if (is_numeric($id)) 
        {
           $statement = $db->prepare($this->query);  
           try { 
                $response = $statement->execute($params); 
                if ($response)
                {
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                    if (is_array($results)) {
                        $count = count($results);
                        if ($count > 0)
                        {
                          $code    = 200;
                          $status  = $tableName;
                          $message = $results;
                        }
                    } 
                } 
            }
            catch (PDOException $ex)
            {
               $code    = 500;
               $message = $ex->getMessage();
            } 

            if ($code == 404)
            {
                $msg = $id > 0  ? "A {$tableName} with {$fieldsId}  {' . $id . '} was not found."
                                : "There is no information in the {$tableName} in database.";
                $message =  $msg;   
            }  
        } 
        else
        {
                $message = "A {$tableName} with {$fieldsId} {' . $id . '} is not correct.";  
        }    

//  echo  "query status: " . $status . " code: " . $code . " count: " . $count . " message: " . print_r($message);

        return [ 'status'  => $status,
                 'code'    => $code,
                 'count'   => $count,
                 'message' => $message
        ];
    }

    public function count(PDO $db, string $table,string $fieldsId, $pparams=array())
    {
        $params      = array();
        $id          = 0;
        $sql         = '';
        $this->query = '';
        $message     = '';
        $count       = 0;
        $code        = 404;
        $status      = 'error';
        $tableName   = $table;
        $where       = '';
        if (strpos($table,'_')) 
        {
            $tableName = substr($table, strpos($table, '_') + 1);
        }

        $baseUtils = new BaseUtils();
        $this->query = "SELECT COUNT(*) AS count FROM `{$table}` ";
        if (!empty($pparams)) {
          $where = $baseUtils->buildingSqlWhere($pparams,$fieldsId);       // where
        }
        if (!empty($where)) 
        {
            $sql = 'WHERE ' . $where;
            $params = $baseUtils->buildingSqlParams($pparams,'select',$fieldsId,array());  // parameters
            if (isset($params[$fieldsId]))
            { 
                $id = $params[$fieldsId];
            }
            else 
            {
                if (str_contains($sql,':' . $fieldsId . '')) 
                {
                   $id = 0;
                } 
            }
        }

        $this->query .= $sql;

        if (is_numeric($id)) 
        {
            $statement = $db->prepare($this->query);   
            try { 
                $statement->execute($params); 
                $result = $statement->fetch();  
                $count = $result['count'];
                if ($count  > 0) 
                {            
                   $code    = 200;
                   $status  = 'info';
                   $message = "count {' .$count . '}" ;
                }
                else 
                {
                   $message = "There is no information in the {$tableName} in database.";
                }
            } 
            catch (PDOException $ex)
            {
                $code    = 500;
                $message = $ex->getMessage();
            }
        }  
        else 
        {
             $message = "A {$tableName} with {$fieldsId}  {' . $id . '} is not correct. ";   
        }    
// echo  "count status: " . $status . " code: " . $code . " count: " . $count . " message: " . print_r($message); 
        return [ 'status'  => $status,
                 'code'    => $code,
                 'count'   => $count,
                 'message' => $message
        ];
    }

    public function toPagination(int $perPage, int $count, int $limit, int $offset) 
    {
           
      if ($limit == 0) {
         $limit = $perPage;
      }

      $page = (int) ceil($offset / $limit) + 1;
      $paginateEntity = new PaginateEntity(); 
      $paginateEntity->setCurrentPage($page);  // Pagina 
      $paginateEntity->setCountRows($count);   // Total registros  
      $paginateEntity->setLimit($limit);       // Limite, si es 0 es $perPage
      if ($count > 0) { 
        $paginateEntity->setTotalLimit((int) ceil($count/$limit));                                               
      } 
      else 
      {
        $paginateEntity->setTotalLimit($count);                                               
      } 
      if ($offset == 0) {
         $offset = (int) ($page - 1) * $limit;  
      } 
      $paginateEntity->setOffset((int) $offset); 
      return $paginateEntity;
    }

}
