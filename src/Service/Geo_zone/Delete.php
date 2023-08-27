<?php 
/** 
  * Delete.php
  * Description: Service Category
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Service\Geo_zone;                                    // (1) Modify in the new class the namespace, if the class is copied.                            
use App\Entity\Geo_zone ;                                          // (1) Modify in the new class the use, if the class is copied.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseDelete;

/*
  Observations :
   ROUTE : $group->delete('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
   ROUTE : $group->post('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
*/
final class Delete
{
  public function delete(Request $request, array $args, BaseParameters $parameters) 
  {
     $body          = (array) $request->getParsedBody();                            
     $tableClass    = new Geo_zone($parameters->getPrefix(),$body);                  // (1) Modify in the new class the tableClass, if the class is copied 
     $erase         = new BaseDelete($tableClass,$parameters);
     $result        = (array) $erase->delete($args);
     return $result;

     }
}
