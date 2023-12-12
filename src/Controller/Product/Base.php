<?php
 /**
  * Base.php
  * Description: Controller and router service Product
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product;

use App\Controller\BaseController;
use App\Service\Product\Create;
use App\Service\Product\Delete;
use App\Service\Product\Find;
use App\Service\Product\Update;

abstract class Base extends BaseController
{
    protected function getProductTable() : string
    {
        return  'product';
    }

    protected function getProductFindService(): Find
    {
        return $this->container->get('Product_find_service');
    }
    protected function getProductCreateService(): Create
    {
        return $this->container->get('Product_create_service');
    }
    protected function getProductUpdateService(): Update
    {
        return $this->container->get('Product_update_service');
    }
    protected function getProductDeleteService(): Delete
    {
        return $this->container->get('Product_delete_service');
    }
}