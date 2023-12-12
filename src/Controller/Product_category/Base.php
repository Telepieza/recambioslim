<?php
 /**
  * Base.php
  * Description: Controller and router service Product_category
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_category;

use App\Controller\BaseController;
use App\Service\Product_category\Create;
use App\Service\Product_category\Delete;
use App\Service\Product_category\Find;
use App\Service\Product_category\Update;

abstract class Base extends BaseController
{
    protected function getProduct_categoryTable() : string
    {
        return 'product_to_category';
    }

    protected function getProduct_categoryFindService(): Find
    {
        return $this->container->get('Product_category_find_service');
    }
    protected function getProduct_categoryCreateService(): Create
    {
        return $this->container->get('Product_category_create_service');
    }
    protected function getProduct_categoryUpdateService(): Update
    {
        return $this->container->get('Product_category_update_service');
    }
    protected function getProduct_categoryDeleteService(): Delete
    {
        return $this->container->get('Product_category_delete_service');
    }
}