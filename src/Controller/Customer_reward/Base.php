<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_reward
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_reward;

use App\Controller\BaseController;
use App\Service\Customer_reward\Create;
use App\Service\Customer_reward\Delete;
use App\Service\Customer_reward\Find;
use App\Service\Customer_reward\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_rewardTable() : string 
    {
        $tableName  = 'customer_reward';
        return $tableName;
    }

    protected function getCustomer_rewardFindService(): Find
    {
        return $this->container->get('Customer_reward_find_service');
    }
    protected function getCustomer_rewardCreateService(): Create
    {
        return $this->container->get('Customer_reward_create_service');
    }
    protected function getCustomer_rewardUpdateService(): Update
    {
        return $this->container->get('Customer_reward_update_service');
    }
    protected function getCustomer_rewardDeleteService(): Delete
    {
        return $this->container->get('Customer_reward_delete_service');
    }
}
