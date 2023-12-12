<?php
 /**
  * Base.php
  * Description: Controller and router service Product_layout
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_layout;

use App\Controller\BaseController;
use App\Service\Product_layout\Create;
use App\Service\Product_layout\Delete;
use App\Service\Product_layout\Find;
use App\Service\Product_layout\Update;

abstract class Base extends BaseController
{
    protected function getProduct_layoutTable() : string
    {
        return 'product_to_layout';
    }

    protected function getProduct_layoutFindService(): Find
    {
        return $this->container->get('Product_layout_find_service');
    }
    protected function getProduct_layoutCreateService(): Create
    {
        return $this->container->get('Product_layout_create_service');
    }
    protected function getProduct_layoutUpdateService(): Update
    {
        return $this->container->get('Product_layout_update_service');
    }
    protected function getProduct_layoutDeleteService(): Delete
    {
        return $this->container->get('Product_layout_delete_service');
    }
}