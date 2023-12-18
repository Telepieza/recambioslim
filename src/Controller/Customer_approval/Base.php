<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_approval
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\Customer_approval;

use App\Controller\BaseController;
use App\Service\Customer_approval\Create;
use App\Service\Customer_approval\Delete;
use App\Service\Customer_approval\Find;
use App\Service\Customer_approval\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_approvalTable() : string 
    {
        return 'customer_approval';
    }

    protected function getCustomer_approvalFindService(): Find
    {
        return $this->container->get('Customer_approval_find_service');
    }
    protected function getCustomer_approvalCreateService(): Create
    {
        return $this->container->get('Customer_approval_create_service');
    }
    protected function getCustomer_approvalUpdateService(): Update
    {
        return $this->container->get('Customer_approval_update_service');
    }
    protected function getCustomer_approvalDeleteService(): Delete
    {
        return $this->container->get('Customer_approval_delete_service');
    }
}
