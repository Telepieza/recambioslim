<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_ip
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_ip;

use App\Controller\BaseController;
use App\Service\Customer_ip\Create;
use App\Service\Customer_ip\Delete;
use App\Service\Customer_ip\Find;
use App\Service\Customer_ip\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_ipTable() : string 
    {
        $tableName  = 'customer_ip';
        return $tableName;
    }

    protected function getCustomer_ipFindService(): Find
    {
        return $this->container->get('Customer_ip_find_service');
    }
    protected function getCustomer_ipCreateService(): Create
    {
        return $this->container->get('Customer_ip_create_service');
    }
    protected function getCustomer_ipUpdateService(): Update
    {
        return $this->container->get('Customer_ip_update_service');
    }
    protected function getCustomer_ipDeleteService(): Delete
    {
        return $this->container->get('Customer_ip_delete_service');
    }
}
