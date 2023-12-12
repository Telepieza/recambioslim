<?php
 /**
  * Base.php
  * Description: Controller and router service ProductDescription
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\ProductDescription;

use App\Controller\BaseController;
use App\Service\ProductDescription\Create;
use App\Service\ProductDescription\Delete;
use App\Service\ProductDescription\Find;
use App\Service\ProductDescription\Update;

abstract class Base extends BaseController
{
    protected function getProductDescriptionTable() : string
    {
        return 'product_description';
    }

    protected function getProductDescriptionFindService(): Find
    {
        return $this->container->get('ProductDescription_find_service');
    }
    protected function getProductDescriptionCreateService(): Create
    {
        return $this->container->get('ProductDescription_create_service');
    }
    protected function getProductDescriptionUpdateService(): Update
    {
        return $this->container->get('ProductDescription_update_service');
    }
    protected function getProductDescriptionDeleteService(): Delete
    {
        return $this->container->get('ProductDescription_delete_service');
    }
}