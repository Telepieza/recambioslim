<?php
 /**
  * Base.php
  * Description: Controller and router service Product_store
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_store;

use App\Controller\BaseController;
use App\Service\Product_store\Create;
use App\Service\Product_store\Delete;
use App\Service\Product_store\Find;
use App\Service\Product_store\Update;

abstract class Base extends BaseController
{
    protected function getProduct_storeTable() : string
    {
        return 'product_to_store';
    }

    protected function getProduct_storeFindService(): Find
    {
        return $this->container->get('Product_store_find_service');
    }
    protected function getProduct_storeCreateService(): Create
    {
        return $this->container->get('Product_store_create_service');
    }
    protected function getProduct_storeUpdateService(): Update
    {
        return $this->container->get('Product_store_update_service');
    }
    protected function getProduct_storeDeleteService(): Delete
    {
        return $this->container->get('Product_store_delete_service');
    }
}