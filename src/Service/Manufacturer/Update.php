<?php 

declare(strict_types=1);

namespace App\Service\Manufacturer;                                               // (1) Modificar en la clase nueva el valor, si se copia la clase.
use App\Entity\Manufacturer;                                                            // (1) Modificar en la clase nueva el valor, si se copia la clase.
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BaseParameters;
use App\Service\BaseUpdate;

/*
  Observaciones :
    ROUTE : $group->put('/{$this->tableClass->toTable()}/update/{id}','App\Controller\{$this->tableClass->toTable()}\Update:update');
*/

final class Update  
{
  public function update(Request $request, array $args, BaseParameters $parameters) 
  {
      $body          = (array) $request->getParsedBody();                             // Asignar los datos del Body del request y pasarlos a un array.  
      $tableClass    = new Manufacturer($parameters->getPrefix(),$body);              // (1) Modificar si se copia la clase a otra clase. (Nombre de la clase) 
      $modify        = new BaseUpdate($tableClass,$parameters);
      $result        = (array) $modify->update($body,$args);
      return $result;
  }
}
 