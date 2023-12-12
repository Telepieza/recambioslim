<?php
 /**
  * Base.php
  * Description: Controller and router service Product_description
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_description;

use App\Controller\BaseController;
use App\Service\Product_description\Create;
use App\Service\Product_description\Delete;
use App\Service\Product_description\Find;
use App\Service\Product_description\Update;

abstract class Base extends BaseController
{
    protected function getProduct_descriptionTable() : string
    {
        return 'product_description';
    }

    protected function getProduct_descriptionFindService(): Find
    {
        return $this->container->get('Product_description_find_service');
    }
    protected function getProduct_descriptionCreateService(): Create
    {
        return $this->container->get('Product_description_create_service');
    }
    protected function getProduct_descriptionUpdateService(): Update
    {
        return $this->container->get('Product_description_update_service');
    }
    protected function getProduct_descriptionDeleteService(): Delete
    {
        return $this->container->get('Product_description_delete_service');
    }
}