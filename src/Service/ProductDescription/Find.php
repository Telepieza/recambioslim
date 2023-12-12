<?php
/**
  * Find.php
  * Description: Service ProductDescription
  * @Author : M.V.M.
  * @Version 1.0.11
**/
declare(strict_types=1);

namespace App\Service\ProductDescription;                                      // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\ProductDescription ;                                            // (1) Modify in the new class the use, if the class is copied.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseFind;

/*
  Observations :
    ROUTE : $group->get('/{$tableName}','App\Controller\{$tableName}\Find:getAll');
    ROUTE : $group->get('/{$tableName}/{id}','App\Controller\{$tableName}\Find:getOne');
*/
 final class Find
 {
    public function getAll(Request $request,BaseParameters $parameters)
    {
      $body          = (array) $request->getParsedBody();
      $query         = (array) $request->getQueryParams();
      $tableClass    = new ProductDescription($parameters->getPrefix(),$body);                 // (1) Modify in the new class the tableClass, if the class is copied
      $find          = new BaseFind($tableClass,$parameters);
      return (array) $find->getAll($query);
    }

    public function getOne(Request $request,array $args, BaseParameters $parameters)
    {
      $body         = (array) $request->getParsedBody();
      $tableClass   = new ProductDescription($parameters->getPrefix(),$body);                // (1) Modify in the new class the tableClass, if the class is copied
      $find         = new BaseFind($tableClass,$parameters);
      return (array) $find->getOne($args);
    }
}