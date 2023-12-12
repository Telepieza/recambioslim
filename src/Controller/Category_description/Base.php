<?php
 /** 
  * Base.php
  * Description: Controller and router service Category_description
  * @Author : M.V.M.
  * @Version: 1.0.5
**/
declare(strict_types=1);

namespace App\Controller\Category_description;

use App\Controller\BaseController;
use App\Service\Category_description\Create;
use App\Service\Category_description\Delete;
use App\Service\Category_description\Find;
use App\Service\Category_description\Update;

abstract class Base extends BaseController
{
    protected function getCategory_descriptionTable() : string 
    {
        return 'category_description';
    }

    protected function getCategory_descriptionFindService(): Find
    {
        return $this->container->get('Category_description_find_service');
    }
    protected function getCategory_descriptionCreateService(): Create
    {
        return $this->container->get('Category_description_create_service');
    }
    protected function getCategory_descriptionUpdateService(): Update
    {
        return $this->container->get('Category_description_update_service');
    }
    protected function getCategory_descriptionDeleteService(): Delete
    {
        return $this->container->get('Category_description_delete_service');
    }
}
