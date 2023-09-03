<?php
 /**
  * Base.php
  * Description: Controller and router service Country
  * @Author : M.V.M.
  * @Version: 1.0.5
**/
declare(strict_types=1);

namespace App\Controller\Country;

use App\Controller\BaseController;
use App\Service\Country\Create;
use App\Service\Country\Delete;
use App\Service\Country\Find;
use App\Service\Country\Update;

abstract class Base extends BaseController
{
    protected function getCountryTable() : string
    {
        $tableName  = 'country';
        return $tableName;
    }

    protected function getCountryFindService(): Find
    {
        return $this->container->get('Country_find_service');
    }
    protected function getCountryCreateService(): Create
    {
        return $this->container->get('Country_create_service');
    }
    protected function getCountryUpdateService(): Update
    {
        return $this->container->get('Country_update_service');
    }
    protected function getCountryDeleteService(): Delete
    {
        return $this->container->get('Country_delete_service');
    }
}
