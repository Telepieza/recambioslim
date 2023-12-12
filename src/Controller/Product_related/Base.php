<?php
 /**
  * Base.php
  * Description: Controller and router service Product_related
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_related;

use App\Controller\BaseController;
use App\Service\Product_related\Create;
use App\Service\Product_related\Delete;
use App\Service\Product_related\Find;
use App\Service\Product_related\Update;

abstract class Base extends BaseController
{
    protected function getProduct_relatedTable() : string
    {
        return 'product_related';
    }

    protected function getProduct_relatedFindService(): Find
    {
        return $this->container->get('Product_related_find_service');
    }
    protected function getProduct_relatedCreateService(): Create
    {
        return $this->container->get('Product_related_create_service');
    }
    protected function getProduct_relatedUpdateService(): Update
    {
        return $this->container->get('Product_related_update_service');
    }
    protected function getProduct_relatedDeleteService(): Delete
    {
        return $this->container->get('Product_related_delete_service');
    }
}