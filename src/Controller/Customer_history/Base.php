<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_history
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_history;

use App\Controller\BaseController;
use App\Service\Customer_history\Create;
use App\Service\Customer_history\Delete;
use App\Service\Customer_history\Find;
use App\Service\Customer_history\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_historyTable() : string 
    {
        $tableName  = 'customer_history';
        return $tableName;
    }

    protected function getCustomer_historyFindService(): Find
    {
        return $this->container->get('Customer_history_find_service');
    }
    protected function getCustomer_historyCreateService(): Create
    {
        return $this->container->get('Customer_history_create_service');
    }
    protected function getCustomer_historyUpdateService(): Update
    {
        return $this->container->get('Customer_history_update_service');
    }
    protected function getCustomer_historyDeleteService(): Delete
    {
        return $this->container->get('Customer_history_delete_service');
    }
}
