<?php
 /**
  * Base.php
  * Description: Controller and router service Customer
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer;

use App\Controller\BaseController;
use App\Service\Customer\Create;
use App\Service\Customer\Delete;
use App\Service\Customer\Find;
use App\Service\Customer\Update;

abstract class Base extends BaseController
{
    protected function getCustomerTable() : string 
    {
        $tableName  = 'customer';
        return $tableName;
    }

    protected function getCustomerFindService(): Find
    {
        return $this->container->get('Customer_find_service');
    }
    protected function getCustomerCreateService(): Create
    {
        return $this->container->get('Customer_create_service');
    }
    protected function getCustomerUpdateService(): Update
    {
        return $this->container->get('Customer_update_service');
    }
    protected function getCustomerDeleteService(): Delete
    {
        return $this->container->get('Customer_delete_service');
    }
}
