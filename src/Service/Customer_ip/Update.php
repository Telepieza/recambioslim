<?php
/**
  * Update.php
  * Description: Service Customer_ip
  * @Author : M.V.M.
  * @Version 1.0.9
**/
declare(strict_types=1);

namespace App\Service\Customer_ip;                                               // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\Customer_ip;                                                      // (1) Modify in the new class the use, if the class is copied.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseUpdate;

/*
  Observations :
    ROUTE : $group->put('/{$this->tableClass->toTable()}/update/{id}','App\Controller\{$this->tableClass->toTable()}\Update:update');
    ROUTE : $group->post('/{$this->tableClass->toTable()}/update/{id}','App\Controller\{$this->tableClass->toTable()}\Update:update');
*/

final class Update
{
  public function update(Request $request, array $args, BaseParameters $parameters)
  {
    $body          = (array) $request->getParsedBody();
    $tableClass    = new Customer_ip($parameters->getPrefix(),$body);               // (1) Modify in the new class the tableClass, if the class is copied  
    $modify        = new BaseUpdate($tableClass,$parameters);
    $result        = (array) $modify->update($body,$args);
    return $result;
   }

}
 