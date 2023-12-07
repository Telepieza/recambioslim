<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_group
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_group;

use App\Controller\BaseController;
use App\Service\Customer_group\Create;
use App\Service\Customer_group\Delete;
use App\Service\Customer_group\Find;
use App\Service\Customer_group\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_groupTable() : string 
    {
        $tableName  = 'customer_group';
        return $tableName;
    }

    protected function getCustomer_groupFindService(): Find
    {
        return $this->container->get('Customer_group_find_service');
    }
    protected function getCustomer_groupCreateService(): Create
    {
        return $this->container->get('Customer_group_create_service');
    }
    protected function getCustomer_groupUpdateService(): Update
    {
        return $this->container->get('Customer_group_update_service');
    }
    protected function getCustomer_groupDeleteService(): Delete
    {
        return $this->container->get('Customer_group_delete_service');
    }
}
