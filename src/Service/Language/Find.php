<?php 
/** 
  * Find.php
  * Description: Service Language
  * @Author : M.V.M
  * @Version 1.0.0
*/
declare(strict_types=1);

namespace App\Service\Language;                                              // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\Language;                                                     // (1) Modify in the new class the use, if the class is copied.

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
        $tableClass    = new Language($parameters->getPrefix(),$body);                // (1) Modify in the new class the tableClass, if the class is copied  
        $find          = new BaseFind($tableClass,$parameters);
        $result        = (array) $find->getAll($query);
        return $result;
    }

    public function getOne(Request $request,array $args, BaseParameters $parameters)
    {                                     
        $body         = (array) $request->getParsedBody();                          
        $tableClass   = new Language($parameters->getPrefix(),$body);               // (1) Modify in the new class the tableClass, if the class is copied  
        $find         = new BaseFind($tableClass,$parameters);
        $result       = (array) $find->getOne($args);
        return $result;
    }
}
