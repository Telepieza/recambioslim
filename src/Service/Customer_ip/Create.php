<?php
/**
  * Create.php
  * Description: Service Customer_ip
  * @Author : M.V.M.
  * @Version 1.0.9
**/
declare(strict_types=1);

namespace App\Service\Customer_ip;                                                 // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\Customer_ip ;                                                       // (1) Modify in the new class the use, if the class is copied.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Service\BaseCreate;
use App\Controller\BaseParameters;

/*
  Observations :
   ROUTE : $group->post('/{$tableName}/new','App\Controller\{$tableName}\Create:create');
*/
final class Create
{
   public function create(Request $request, BaseParameters $parameters) {
      $body           = (array) $request->getParsedBody();
      $tableClass     = new Customer_ip($parameters->getPrefix(),$body);            // (1) Modify in the new class the tableClass, if the class is copied 
      $create         = new BaseCreate($tableClass,$parameters);
      $result         = (array) $create->new($body);
      return $result;
   }
}
 