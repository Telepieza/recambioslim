<?php
 /** 
  * Base.php
  * Description: Controller and router service Location
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\Location;

use App\Controller\BaseController;
use App\Service\Location\Create;
use App\Service\Location\Delete;
use App\Service\Location\Find;
use App\Service\Location\Update;

abstract class Base extends BaseController
{
    protected function getLocationTable() : string
    {
        return 'location';
    }

    protected function getLocationFindService(): Find
    {
        return $this->container->get('Location_find_service');
    }
    protected function getLocationCreateService(): Create
    {
        return $this->container->get('Location_create_service');
    }
    protected function getLocationUpdateService(): Update
    {
        return $this->container->get('Location_update_service');
    }
    protected function getLocationDeleteService(): Delete
    {
        return $this->container->get('Location_delete_service');
    }
}
