<?php 

declare(strict_types=1);

namespace App\Service\Manufacturer;                                                  // (1) Modificar en la clase nueva el valor, si se copia la clase.
use App\Entity\Manufacturer ;                                                       // (1) Modificar en la clase nueva el valor, si se copia la clase.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseCreate;
/*
  Observaciones :
   ROUTE : $group->post('/{$tableName}/new','App\Controller\{$tableName}\Create:create');
*/

final class Create
{
    public function create(Request $request, BaseParameters $parameters) { 
        $body           = (array) $request->getParsedBody();                       // Asignar los datos del Body del request y pasarlos a un array inputs
        $tableClass     = new Manufacturer($parameters->getPrefix(),$body);        // (1) Modificar si se copia la clase. (Nombre de la clase) 
        $create         = new BaseCreate($tableClass,$parameters);
        $result         = (array) $create->new($body);
        return $result;
    }
}
 