<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_field
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_field;

use App\Controller\BaseController;
use App\Service\Customer_field\Create;
use App\Service\Customer_field\Delete;
use App\Service\Customer_field\Find;
use App\Service\Customer_field\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_fieldTable() : string 
    {
        $tableName  = 'customer_field';
        return $tableName;
    }

    protected function getCustomer_fieldFindService(): Find
    {
        return $this->container->get('Customer_field_find_service');
    }
    protected function getCustomer_fieldCreateService(): Create
    {
        return $this->container->get('Customer_field_create_service');
    }
    protected function getCustomer_fieldUpdateService(): Update
    {
        return $this->container->get('Customer_field_update_service');
    }
    protected function getCustomer_fieldDeleteService(): Delete
    {
        return $this->container->get('Customer_field_delete_service');
    }
}
