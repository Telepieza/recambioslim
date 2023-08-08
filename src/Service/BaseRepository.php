<?php 

declare(strict_types=1);

namespace App\Service;

use App\Service\BaseUtils;
use PDOException;
use App\Service\PaginateEntity;
use PDO;

class BaseRepository 
{
    protected string $query;
    public function query(PDO $db, string $table, $pfields=array(), $pparams=array(), int $plimit, int $poffset)
    {
        $params  = array();
        $id      = 0;
        $sql     = "";
        $this->query  = "";
        $code    = 0;
        $count   = 0;
        $message = "";
        $code    = 404;
        $status  = "Error";
        $results = array();
        $pagination = "";
       
        $baseutils   = new BaseUtils();
        $fields      = $baseutils->buildingSqlFields($pfields);  // fields
        $this->query = "SELECT {$fields} FROM `{$table}` ";
        if ($plimit > 0 ) {
            $pagination = " LIMIT :limit OFFSET :offset "; 
        }
        $where       = $baseutils->buildingSqlWhere($pparams);    // where
        if (empty($where))
        {
            $sql = 'ORDER BY id';  // order by
        } 
        else
        { 
            $sql = 'WHERE ' . $where;
            $params = $baseutils->buildingSqlParams($pparams,'select',array());  // parameters
            if (isset($params['id'])) 
            { 
               $id = $params['id'];
            } 
            else 
            {
               if (str_contains($sql,':id')) 
               {
                  $id = 0;
               } 
           }
        }

        $this->query .= $sql . $pagination;

        if ($plimit > 0 ) {
           $params['limit']  = $plimit;
           $params['offset'] = $poffset;
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
                          $status  = $table;
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
                $msg = $id > 0  ? "A {$table} with ID {' . $id . '} was not found."
                                : "There is no information in the {$table} in database.";
                $message =  $msg;   
            }  
        } 
        else
        {
                $message = "A {$table} with ID {' . $id . '} is not correct.";  
        }    
        return [ 'status'  => $status,
                 'code'    => $code,
                 'count'   => $count,
                 'message' => $message
        ];

    }

    public function count(PDO $db, string $table, $pparams=array())
    {
        $params  = array();
        $id      = 0;
        $sql     = "";
        $this->query = "";
        $message = "";
        $count   = 0;
        $code    = 404;
        $status  = "Error";

        $baseutils = new  BaseUtils();
        $this->query = "SELECT COUNT(*) AS count FROM `{$table}` ";
        $where = $baseutils->buildingSqlWhere($pparams);       // where
        if (!empty($where)) 
        {
            $sql = 'WHERE ' . $where;
            $params = $baseutils->buildingSqlParams($pparams,'select',array());  // parameters
            if (isset($params['id']))
            { 
                $id = $params['id'];
            }
            else 
            {
                if (str_contains($sql,':id')) 
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
                   $status  = "info";
                   $message = "count {' .$count . '}" ;
                }
                else 
                {
                   $message = "There is no information in the {$table} in database.";
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
             $message = "A {$table} with ID {' . $id . '} is not correct. ";   
        }  
            
        return [ 'status'  => $status,
                 'message' => $message,
                 'code'    => $code,
                 'count'   => $count
        ];

    }

    public function toPagination(int $perPage, int $count, int $limit, int $offset) 
    {
      if ($limit > $perPage || $limit == 0) {
          $limit = $perPage;
      }
      $page = (int) ceil($offset / $limit) + 1;
      $paginateEntity = new PaginateEntity(); 
      $paginateEntity->setCurrentPage($page);  // Pagina 
      $paginateEntity->setCountRows($count);   // Total registros  
      $paginateEntity->setLimitRows($limit);   // Limite, si es 0 es $perPage
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
