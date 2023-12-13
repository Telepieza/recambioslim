<?php
/**
  * Delete.php
  * Description: Service Customer_reward
  * @Author : M.V.M.
  * @Version 1.0.12
**/
declare(strict_types=1);

namespace App\Service\Customer_reward;                                    // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\Customer_reward ;                                          // (1) Modify in the new class the use, if the class is copied.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseUserAgent;
use App\Service\BaseDelete;

/*
  Observations :
   ROUTE : $group->delete('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
   ROUTE : $group->post('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
*/
final class Delete extends BaseUserAgent
{
  public function delete(Request $request, array $args, BaseParameters $parameters)
  {
     $body          = (array) $request->getParsedBody();
     $tableClass    = new Customer_reward($parameters->getPrefix(),$body);                 // (1) Modify in the new class the tableClass, if the class is copied
     $this->getUserAgent($request);
     $erase  = new BaseDelete($tableClass,$parameters);
     return  (array) $erase->delete($this->getUserAgentURI(),$args);
  }
}