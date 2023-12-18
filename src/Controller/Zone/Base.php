<?php
 /**
  * Base.php
  * Description: Controller and router service Zone
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\Zone;

use App\Controller\BaseController;
use App\Service\Zone\Create;
use App\Service\Zone\Delete;
use App\Service\Zone\Find;
use App\Service\Zone\Update;

abstract class Base extends BaseController
{
    protected function getZoneTable() : string
    {
        return 'zone';
    }

    protected function getZoneFindService(): Find
    {
        return $this->container->get('Zone_find_service');
    }
    protected function getZoneCreateService(): Create
    {
        return $this->container->get('Zone_create_service');
    }
    protected function getZoneUpdateService(): Update
    {
        return $this->container->get('Zone_update_service');
    }
    protected function getZoneDeleteService(): Delete
    {
        return $this->container->get('Zone_delete_service');
    }
}
