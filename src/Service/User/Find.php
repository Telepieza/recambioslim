<?php 
/** 
  * Find.php
  * Description: Service User
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Service\User;                                      
use App\Entity\User;                                                    
use App\Service\BaseRepository;
use PDO;

final class Find extends BaseRepository
{
   private User $tableClass;
   private PDO $db;
   private array $body;
   private string $prefix;

   public function __construct(PDO $db,array $body,string $prefix)   // Constructor, pasa a global el objeto DDBB y los datos ya decodificado del tocken
   {
        $this->db     = $db;  
        $this->body   = $body;
        $this->prefix = $prefix;  
   }

   public function getUser()
   {        
      $this->tableClass = new User($this->prefix,$this->body);   // clase usuario, pasando los datos al constructor                                                 
      $params        = array();                                                                                                                              
      $code          = 401;                                      // default code 401
      $message       = (string) "";  
      $password      = (string) "";   
      $auth          = (string) ""; 
      $fields        = (array) $this->tableClass->toMapfields();             // mapeamos los campos  
      $inputs        = (array) $this->tableClass->toCheckValue($this->body); // verificamos los valores   
      
      $id    = (int) 0;  
      $name  = (string) "";  
      $email = (string) "";  
      $limit  = (int) 0;  
      $offset = (int) 0;  
 
      if (isset($inputs[$this->tableClass->getFieldsId()]) && is_numeric($inputs[$this->tableClass->getFieldsId()]) && $inputs[$this->tableClass->getFieldsId()] > 0 )
      {
         $id = $inputs[$this->tableClass->getFieldsId()];
         $params=[$this->tableClass->getFieldsId() => $id]; 
      } 
      elseif (isset($inputs['username']) && !empty($inputs['username']))  // Si existe el nombre, lo pasa a parametro para el sql
      {
         $name = $inputs['username'];
         $params=['username' => $name]; 
      } 
      elseif (isset($inputs['email']) && !empty($inputs['email']))        // Si existe el email, lo pasa a parametro para el sql
      {
         $email = $inputs['email'];
         $params=['email' => $email];  
      }  
      else 
      {
         $message = "Invalid login - parameters";                         // Si no hay ningún parametro en el sql, mensaje de error.
      }

      if (isset($inputs['password']) && !empty($inputs['password']))      // Analizamos si hay password
      {
         $password = hash('sha256', $inputs['password']);  
      }  

      if (isset($inputs['auth']) && !empty($inputs['auth']))               // analizamos si es el tocken. Si hay token no controla password
      {
         $auth = $inputs['auth'];  
      }  

      if (empty($message) && count($params) > 0)                           // Tiene que existir como minimo un parametro (Clave de busqueda en el select)
      {                            
         $result  = $this->query($this->db, $this->tableClass->toTable(), $this->tableClass->getFieldsId(), $this->tableClass->getFieldsId(),
                                 $fields, $params, $limit, $offset); 
         if ($result['count'] != 1)                                       // Tiene que existir uno, si es 0 o más error.
         {                                                                                                 
            $message = "Invalid login - user";
         }
         else 
         {
            if  ($result['code'] === 200)                                             // Si estatus = 200, se han localizado registros en BD
            {     
               $record = $this->tableClass->toCheckValue($result['message'][0]);     // pasamos el registro primero a record.
               if (empty($auth) && isset($record['password']) && $record['password'] === $password) // analizamos si tenemos que comprobar el pass
               {
                  $code = 200;                                                       // Si el password es igual a la base de datos pasamos el code a 200.
               } 
               elseif (!empty($auth) && $auth === 'no_password' && empty($password)) // analizamos si es el token
               {                     
                  (bool) $lok = true;
                  if  ($id > 0 && $id != $record[$this->tableClass->getFieldsId()])  // comprobamos el id del tocken con el id de la BD.
                  {
                     $lok = false;
                  } 
                  if  ($lok && !empty($name) && $name != $record['username'])        // comprobamos el nombre del tocken con el id de la BD.
                  {
                     $lok = false;
                  } 
                  if  ($lok && !empty($email) && $email != $record['email'])         // comprobamos el email del tocken con el id de la BD.
                  {
                     $lok = false;
                  } 
                  if ($lok)                                                         // Si todos los campos son iguales , el code = 200.
                  {
                     $code = 200;
                  } 
                  else                                                              // Si algun campo es diferente, indicara error 401.
                  {
                     $message = "Invalid login credentials provided";
                  } 
               }                 
               else
               {
                  $message = "Invalid login - password";                             // Si el code inicial es != 200 , mensaje de error.
               } 
            } 
         }
      }

      if ($code === 200)                                          // Comprobamos que es 200, eso significa que los datos del token o del pass son ok.
      {
         $result['status']   = $this->tableClass->toTable();      // Nombre de la tabla             
         $record['password'] = '***************';                 // Ponemos mascara al password, motivo es grabacion del logger.       
         $result['message']  = $record;                           // grabamos los datos de la DB al result
      }
      else 
      {                                                           // Si es diferente de 200, indicamos mensaje de error.
         $result['status']   = 'error';                           // Status = 'Error' 
         $result['count']    = 0;                                 // Sin registros count = 0
         if (!isset($result['code']))                             // Analizamos si existe el code o es 500.  
         {                                                     
            $result['code']     = $code;                          // si el array no tiene code, añadimos el 401
            $result['message']  = $message;                       // Mensaje de error.
         }
         else 
         {
            if ($result['code'] != 500)                           // Si es 401, por exception se graba el array result.
            {                                                      
               $result['code']     = $code;                       // Modificamos el code a 401.
               if (!empty($message)) {
                  $result['message']  = $message;                 // grabamos el  mensaje de error.
               }
            } 
         }
      }
      return json_encode($result);                                // Pasamos el array a json, el motivo es para picar menos codigo.
   }
}