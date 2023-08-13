<?php 
/** 
  * BaseUtils.php
  * Description: Principal object utils class of all templates
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Service;

// Monta en un string el sql de la sentencia INSERT TO
class BaseUtils {
    public function buildingSqlInsert($data, string $table) {
        $sql = '';
        if (is_array($data)) {
           $keys = array_keys($data);
           $aks  = array();
           foreach ($keys as $key) 
           {
              $aks[$key] = '`' . $key . '`';
           }
           $sql = "INSERT INTO ".$table." (";
           $sql .= implode(",",  $aks );
           $sql .= ")";
           $sql .= " VALUES ";
           $sql .= "(";
           $sql .= ":" .implode(",:", $keys);
           $sql .= ")";
        }
        return $sql;
    }

    // Monta el string el sql de la sentencia UPDATE, controlando el id y los campos de la key principal.
    public function buildingSqlUpdate(array $data, string $table, string $fieldId, array $primaryKey)
    {
        $keys        = array_keys($data);
        $countKeys   = count($keys);
        $countPriKey = count(array_keys($primaryKey));
        $countIteration = 0;
        $fields = '';
        $sql    = '';
        foreach ($keys as $key) 
        {
           $countIteration = $countIteration + 1;
           if ($countPriKey > 0 && isset($primaryKey[$key]))
           {
               continue;
           }
           if ($key !=  $fieldId)
           {
              $str = ', ';
              if($countIteration == $countKeys)
              {
                 $str = '';
              }
               $fields .= '`' . $key . '`' . " = :" . $key . $str;
           }
        }
        
        if (!empty($fields)) 
        {
          $sql  = "UPDATE " . $table . " SET " . $fields ;
          $sql .= " WHERE " . '`' . $fieldId . '`' . " = :" . $fieldId ;
        }
        return $sql;
    } 

    // Monta en un string los valores del WHERE de las sentencia SELECT 
    public function buildingSqlWhere(array $inputs,string $fieldId)
    {
        $keys      = array_keys($inputs);
        $countKeys = count($keys);
        $countIteration = 0;
        $where = '';
        foreach ($keys as $key)
        {
           $countIteration = $countIteration + 1;
           if ($key ===  $fieldId && $inputs[$fieldId] === 0)
           {
               continue;
           }
           $str = ', ';
           if($countIteration == $countKeys) {
              $str = '';
           }
           $where .= '`' . $key . '`' . " = :". $key . $str;
        }
        return $where;
    } 

    // Monta en un string los campos para la sentencia SELECT $fields, si no hay campos pone un *
    public function buildingSqlFields($inputs) {
      $fields = '';
      if (!empty($inputs)) {
         $keys  = array_keys($inputs);
         foreach ($keys as $key) 
         { 
           if (!empty($fields)) {
              $fields .= ', ';
           }
            $fields .=  '`' . $key . '`';
         }   
      }
      if (empty($fields)) {
         $fields = '*';
      }
      return $fields;
  }

    // Monta el array params para (parametros y valor) del SQL, con control del id en la accion "create" y valor 0.
    public function buildingSqlParams(array $inputs, string $action, string $fieldId, array $primaryKey)
    {
       $count       = count(array_keys($inputs));
       $params      = array();
       $countPriKey = count(array_keys($primaryKey));
       if ($count > 0) 
       {
          foreach ($inputs as $key => $value) 
          {
            if (!empty($key)) 
            {
               if($key ===  $fieldId && $action === 'create') {
                  continue;
               } 
               if ($key ===  $fieldId && $value === 0)
               {
                  continue;
               }
               if ($action === 'update' && $countPriKey > 0 && isset($primaryKey[$key])) {
                  continue;
               }
               $params[$key] = $value;
            }
          }
       }
    return $params;
   }

   // Monta el array params, con la key del nombre del campo y el valor input asociado para la PrimaryKey
   public function buildingSqlPrimaryKey(array $PrimaryKey, array $inputs)
   {
      $count_pk    = count(array_keys($PrimaryKey));
      $count_in    = count(array_keys($inputs));

      $params     = array();
      if ($count_in > 0 && $count_pk > 0) 
      {
         foreach ($inputs as $key => $value) 
         {
           if (!empty($key) && !empty($value)) 
           {
              if (isset($PrimaryKey[$key]) && !empty($value))
              {
               $params[$key] = trim($value);
              } 
           }
         }
      }
   return $params;
  }

  // Compara si los valores de los campos de la clave primaria unica de la base de datos
  // son iguales a los valores de entrada en procesos como el UPDATE.
  public function buildingCheckPrimaryKey(array  $dataKey, array $inputsKey)
   {
      $count_dk    = count(array_keys($dataKey));
      $count_in    = count(array_keys($inputsKey));
      $isEqual = true;
      if ($count_in > 0 && $count_dk > 0) 
      {
         foreach ($dataKey as $key => $value) 
         {
            if (isset($inputsKey[$key]) && trim($inputsKey[$key]) != trim($value))
            {
               $isEqual = false;
            }
         }
      } 
   return $isEqual;
  }
  
}
