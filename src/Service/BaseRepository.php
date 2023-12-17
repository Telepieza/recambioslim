<?php
/**
  * BaseFind.php
  * Description: Principal object repository class of all templates
  * @Author : M.V.M.
  * @Version 1.0.15
**/
declare(strict_types=1);

namespace App\Service;

use PDOException;
use PDO;
use Psr\Log\LoggerInterface;
use PHPMailer\PHPMailer\PHPMailer;

// Clase principal extends de las clases BaseCreate, BaseDelete, BaseFind, BaseUpdate
class BaseRepository
{
    protected string $query;
    // Monta la sentencia "Select" de los fields and parameters para el query del PDO

    protected function query(PDO $db, object $tableClass, $parameter=array(), int $limit, int $offset)
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
        $tableName    = $tableClass->toTable();
        if (strpos($tableClass->toTable(),'_'))
        {
           $tableName = substr($tableClass->toTable(), strpos($tableClass->toTable(), '_') + 1);
        }
        $baseUtils   = new BaseUtils();
        $fields      = $baseUtils->buildingSqlFields($tableClass->toMapfields());  // fields
        $this->query = "SELECT {$fields} FROM `{$tableClass->toTable()}` ";
        if ($limit > 0 ) {
            $pagination = " LIMIT :limit OFFSET :offset ";
        }
        $where  = $baseUtils->buildingSqlWhere($parameter,$tableClass->getFieldsId());    // where
        if (empty($where))
        {
           if (!empty(trim($tableClass->toSortOrder()))) {
              $sql = 'ORDER BY ' .$tableClass->toSortOrder();
           }
        }
        else
        {
            $sql = 'WHERE ' . $where;
            $params = $baseUtils->buildingSqlParams($parameter,'select', $tableClass->getFieldsId(), array());  // parameters
            if (isset($params[$tableClass->getFieldsId()]))
            {
               $id = $params[$tableClass->getFieldsId()];
            }
            else
            {
               if (str_contains($sql,':' .  $tableClass->getFieldsId()))
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
                $msg = $id > 0  ? "A {$tableName} with {$tableClass->getFieldsId()}  {' . $id . '} was not found."
                                : "There is no information in the {$tableName} in database.";
                $message =  $msg;
            }
        }
        else
        {
                $message = "A {$tableName} with {$tableClass->getFieldsId()} {' . $id . '} is not correct.";  
        }

//  echo  "query status: " . $status . " code: " . $code . " count: " . $count . " message: " . print_r($message);

        return [ 'status'  => $status,
                 'code'    => $code,
                 'count'   => $count,
                 'message' => $message
        ];
    }

    // Monta la sentencia "Select count" para el query del PDO.
    protected function toCount(PDO $db, string $table,string $fieldsId, $parameter=array())
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
        if (!empty($parameter)) {
          $where = $baseUtils->buildingSqlWhere($parameter,$fieldsId);       // where
        }
        if (!empty($where))
        {
            $sql = 'WHERE ' . $where;
            $params = $baseUtils->buildingSqlParams($parameter,'select',$fieldsId,array());  // parameters
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
    
    // Calculos y control de las datos de paginacion 
    protected function toPagination(int $perPage, int $count, int $limit, int $offset)
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

    protected function toDebugger(LoggerInterface $logger, $isDebug, $msgName, $action, $message)
    {
      $msg = '';
      if ($isDebug) {
        if (!empty($msgName)) {
            $msg = $msgName;
        }
        if (!empty($action)) {
            $msg .= $action . ' ';
        }
        $msg .= str_replace('\/','/',json_encode($message));
        $logger->debug($msg);
      }
    }

    protected function toMailer(PHPMailer $mailer, $ismail, $product, $action, $table, $message)
    {
      $msg         = '';
      $mailContent = '';
      if ($ismail) {
         $msg   = $action . ' table ' . $table . ' ' . $product;
         $mailer->Subject = $msg;
         $mailer->msgHTML(date('Y-m-d H:i:s'));
         $mailContent = '<h1>User ' . $action . ' api ' . $product . '</h1><p>' . json_encode($message) . '</p>';
         $mailer->Body    = $mailContent;
         $mailer->AltBody = json_encode($message);
         if($mailer->send()) {
             $msg .= 'Message has been sent';
         } else {
            $msg .= 'Mailer Error: ' . $mailer->ErrorInfo;
         }
      }
      return $msg;
    }

}
