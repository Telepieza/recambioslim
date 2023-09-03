<?php
/**
* Base.php
* Description: Geo_zone Services route path delete for id with token verification
*  * @Author : M.V.M.
* @Version: 1.0.5
*/

declare(strict_types=1);

namespace App\Controller\Geo_zone;

use App\Controller\BaseController;
use App\Service\Geo_zone\Create;
use App\Service\Geo_zone\Delete;
use App\Service\Geo_zone\Find;
use App\Service\Geo_zone\Update;

abstract class Base extends BaseController
{
    protected function getGeo_zoneTable() : string
    {
        $tableName  = 'geo_zone';
        return $tableName;
    }

    protected function getGeo_zoneFindService(): Find
    {
        return $this->container->get('Geo_zone_find_service');
    }
    protected function getGeo_zoneCreateService(): Create
    {
        return $this->container->get('Geo_zone_create_service');
    }
    protected function getGeo_zoneUpdateService(): Update
    {
        return $this->container->get('Geo_zone_update_service');
    }
    protected function getGeo_zoneDeleteService(): Delete
    {
        return $this->container->get('Geo_zone_delete_service');
    }
}
