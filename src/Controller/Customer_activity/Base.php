<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_activity
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\Customer_activity;

use App\Controller\BaseController;
use App\Service\Customer_activity\Create;
use App\Service\Customer_activity\Delete;
use App\Service\Customer_activity\Find;
use App\Service\Customer_activity\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_activityTable() : string
    {
        return 'customer_activity';
    }

    protected function getCustomer_activityFindService(): Find
    {
        return $this->container->get('Customer_activity_find_service');
    }
    protected function getCustomer_activityCreateService(): Create
    {
        return $this->container->get('Customer_activity_create_service');
    }
    protected function getCustomer_activityUpdateService(): Update
    {
        return $this->container->get('Customer_activity_update_service');
    }
    protected function getCustomer_activityDeleteService(): Delete
    {
        return $this->container->get('Customer_activity_delete_service');
    }
}
