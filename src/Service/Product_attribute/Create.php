<?php
/**
  * Create.php
  * Description: Service Product_attribute
  * @Author : M.V.M.
  * @Version 1.0.11
**/
declare(strict_types=1);

namespace App\Service\Product_attribute;                                                 // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\Product_attribute ;                                                       // (1) Modify in the new class the use, if the class is copied.

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
      $tableClass     = new Product_attribute($parameters->getPrefix(),$body);            // (1) Modify in the new class the tableClass, if the class is copied
      $create         = new BaseCreate($tableClass,$parameters);
      return (array) $create->new($body);
   }
}