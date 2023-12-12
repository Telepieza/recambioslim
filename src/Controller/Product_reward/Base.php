<?php
 /**
  * Base.php
  * Description: Controller and router service Product_reward
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_reward;

use App\Controller\BaseController;
use App\Service\Product_reward\Create;
use App\Service\Product_reward\Delete;
use App\Service\Product_reward\Find;
use App\Service\Product_reward\Update;

abstract class Base extends BaseController
{
    protected function getProduct_rewardTable() : string
    {
        return 'product_reward';
    }

    protected function getProduct_rewardFindService(): Find
    {
        return $this->container->get('Product_reward_find_service');
    }
    protected function getProduct_rewardCreateService(): Create
    {
        return $this->container->get('Product_reward_create_service');
    }
    protected function getProduct_rewardUpdateService(): Update
    {
        return $this->container->get('Product_reward_update_service');
    }
    protected function getProduct_rewardDeleteService(): Delete
    {
        return $this->container->get('Product_reward_delete_service');
    }
}