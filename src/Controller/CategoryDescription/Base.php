<?php
 /** 
  * Base.php
  * Description: Controller and router service CategoryDescription
  * @Author : M.V.M.
  * @Version: 1.0.5
**/
declare(strict_types=1);

namespace App\Controller\CategoryDescription;

use App\Controller\BaseController;
use App\Service\CategoryDescription\Create;
use App\Service\CategoryDescription\Delete;
use App\Service\CategoryDescription\Find;
use App\Service\CategoryDescription\Update;

abstract class Base extends BaseController
{
    protected function getCategoryDescriptionTable() : string 
    {
        $tableName  = 'category_description';
        return $tableName;
    }

    protected function getCategoryDescriptionFindService(): Find
    {
        return $this->container->get('CategoryDescription_find_service');
    }
    protected function getCategoryDescriptionCreateService(): Create
    {
        return $this->container->get('CategoryDescription_create_service');
    }
    protected function getCategoryDescriptionUpdateService(): Update
    {
        return $this->container->get('CategoryDescription_update_service');
    }
    protected function getCategoryDescriptionDeleteService(): Delete
    {
        return $this->container->get('CategoryDescription_delete_service');
    }
}
