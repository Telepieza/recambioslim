<?php
/**
  * Create.php
  * Description: Service Geo_zone
  * @Author : M.V.M.
  * @Version 1.0.5
**/
declare(strict_types=1);

namespace App\Service\Geo_zone;                                                 // (1) Modify in the new class the namespace, if the class is copied.
use App\Entity\Geo_zone ;                                                       // (1) Modificar en la clase nueva el valor, si se copia la clase.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Service\BaseCreate;
use App\Controller\BaseParameters;

/*
  Observaciones :
   ROUTE : $group->post('/{$tableName}/new','App\Controller\{$tableName}\Create:create');
*/
final class Create
{
   public function create(Request $request, BaseParameters $parameters) {
      $body           = (array) $request->getParsedBody();
      $tableClass     = new Geo_zone($parameters->getPrefix(),$body);             // (1) Modify in the new class the tableClass, if the class is copied
      $create         = new BaseCreate($tableClass,$parameters);
      $result         = (array) $create->new($body);
      return $result;
   }
}
 