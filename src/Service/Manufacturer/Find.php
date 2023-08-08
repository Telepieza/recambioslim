<?php 

declare(strict_types=1);

namespace App\Service\Manufacturer;                                      // (1) Modificar en la clase nueva el valor, si se copia la clase.
use App\Entity\Manufacturer ;                                           // (1) Modificar en la clase nueva el valor, si se copia la clase.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseFind;

/*
  Observaciones :
    ROUTE : $group->get('/{$tableName}','App\Controller\{$tableName}\Find:getAll');
    ROUTE : $group->get('/{$tableName}/{id}','App\Controller\{$tableName}\Find:getOne');
*/
final class Find 
 {
    public function getAll(Request $request,BaseParameters $parameters) 
    {                                           
        $body          = (array) $request->getParsedBody();                            // Asignar los datos del Body del request y pasarlos a un array.  
        $query         = (array) $request->getQueryParams();    
        $tableClass    = new Manufacturer($parameters->getPrefix(),$body);                // (1) Modificar si se copia la clase. (Nombre de la clase) 
        $find          = new BaseFind($tableClass,$parameters);
        $result        = (array) $find->getAll($query);
        return $result;
    }
  
    public function getOne(Request $request,array $args, BaseParameters $parameters)
    {                                     
        $body         = (array) $request->getParsedBody();                          // Asignar los datos del Body del request y pasarlos a un array.
        $tableClass   = new Manufacturer($parameters->getPrefix(),$body);               // (1) Modificar si se copia la clase. (Nombre de la clase) 
        $find         = new BaseFind($tableClass,$parameters);
        $result       = (array) $find->getOne($args);
        return $result;
    }
}