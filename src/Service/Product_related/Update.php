<?php
/**
  * Update.php
  * Description: Service Product_related
  * @Author : M.V.M.
  * @Version 1.0.11
**/
declare(strict_types=1);

namespace App\Service\Product_related;                                               // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\Product_related;                                                      // (1) Modify in the new class the use, if the class is copied.

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
    $tableClass    = new Product_related($parameters->getPrefix(),$body);               // (1) Modify in the new class the tableClass, if the class is copied
    $modify        = new BaseUpdate($tableClass,$parameters);
    return (array) $modify->update($body,$args);
  }
}
 