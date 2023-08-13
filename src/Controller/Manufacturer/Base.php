<?php
 /** 
  * Base.php
  * Description: Controller and router service manufacturer
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Controller\Manufacturer;

use App\Controller\BaseController;
use App\Service\Manufacturer\Create;
use App\Service\Manufacturer\Delete;
use App\Service\Manufacturer\Find;
use App\Service\Manufacturer\Update;

abstract class Base extends BaseController
{

    protected function getManufacturerTable() : string 
    {
        $tableName  = 'manufacturer';
        return $tableName;
    }
    
    protected function getManufacturerFindService(): Find
    {
        return $this->container->get('Manufacturer_find_service');
    }
    protected function getManufacturerCreateService(): Create
    {
        return $this->container->get('Manufacturer_create_service');
    }
    protected function getManufacturerUpdateService(): Update
    {
        return $this->container->get('Manufacturer_update_service');
    }
    protected function getManufacturerDeleteService(): Delete
    {
        return $this->container->get('Manufacturer_delete_service');
    }
}
