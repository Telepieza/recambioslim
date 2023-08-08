<?php 

declare(strict_types=1);

namespace App\Service\Category;                                    // (1) Modificar en la clase nueva el valor, si se copia la clase.                       
use App\Entity\Category ;                                          // (1) Modificar en la clase nueva el valor, si se copia la clase.

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseDelete;

/*
  Observaciones :
   ROUTE : $group->delete('/{$tableName}/delete/{id}','App\Controller\{$tableName}\Delete:delete');
*/
final class Delete
{
  public function delete(Request $request, array $args, BaseParameters $parameters) 
  {
     $body          = (array) $request->getParsedBody();                            // Asignar los datos del Body del request y pasarlos a un array.  
     $tableClass    = new Category($parameters->getPrefix(),$body);                 // (1) Modificar si se copia la clase. (Nombre de la clase) 
     $erase         = new BaseDelete($tableClass,$parameters);
     $result        = (array) $erase->delete($args);
     return $result;

     }
}

