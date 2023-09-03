<?php
/**
  * Create.php
  * Description: Service CategoryDescription
  * @Author : M.V.M.
  * @Version 1.0.5
**/
declare(strict_types=1);

namespace App\Service\CategoryDescription;                                                 // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\CategoryDescription ;                                                       // (1) Modify in the new class the use, if the class is copied.

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
      $tableClass     = new CategoryDescription($parameters->getPrefix(),$body);            // (1) Modify in the new class the tableClass, if the class is copied 
      $create         = new BaseCreate($tableClass,$parameters);
      $result         = (array) $create->new($body);
      return $result;
   }
}
 