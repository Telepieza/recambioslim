<?php
 /**
  * Base.php
  * Description: Controller and router service Product_attribute
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_attribute;

use App\Controller\BaseController;
use App\Service\Product_attribute\Create;
use App\Service\Product_attribute\Delete;
use App\Service\Product_attribute\Find;
use App\Service\Product_attribute\Update;

abstract class Base extends BaseController
{
    protected function getProduct_attributeTable() : string
    {
        return 'product_attribute';
    }

    protected function getProduct_attributeFindService(): Find
    {
        return $this->container->get('Product_attribute_find_service');
    }
    protected function getProduct_attributeCreateService(): Create
    {
        return $this->container->get('Product_attribute_create_service');
    }
    protected function getProduct_attributeUpdateService(): Update
    {
        return $this->container->get('Product_attribute_update_service');
    }
    protected function getProduct_attributeDeleteService(): Delete
    {
        return $this->container->get('Product_attribute_delete_service');
    }
}