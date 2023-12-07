<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_transaction
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_transaction;

use App\Controller\BaseController;
use App\Service\Customer_transaction\Create;
use App\Service\Customer_transaction\Delete;
use App\Service\Customer_transaction\Find;
use App\Service\Customer_transaction\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_transactionTable() : string 
    {
        $tableName  = 'customer_transaction';
        return $tableName;
    }

    protected function getCustomer_transactionFindService(): Find
    {
        return $this->container->get('Customer_transaction_find_service');
    }
    protected function getCustomer_transactionCreateService(): Create
    {
        return $this->container->get('Customer_transaction_create_service');
    }
    protected function getCustomer_transactionUpdateService(): Update
    {
        return $this->container->get('Customer_transaction_update_service');
    }
    protected function getCustomer_transactionDeleteService(): Delete
    {
        return $this->container->get('Customer_transaction_delete_service');
    }
}
