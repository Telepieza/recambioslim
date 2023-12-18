<?php
 /**
  * Base.php
  * Description: Controller and router service Customer_login
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\Customer_login;

use App\Controller\BaseController;
use App\Service\Customer_login\Create;
use App\Service\Customer_login\Delete;
use App\Service\Customer_login\Find;
use App\Service\Customer_login\Update;

abstract class Base extends BaseController
{
    protected function getCustomer_loginTable() : string 
    {
        return 'customer_login';
    }

    protected function getCustomer_loginFindService(): Find
    {
        return $this->container->get('Customer_login_find_service');
    }
    protected function getCustomer_loginCreateService(): Create
    {
        return $this->container->get('Customer_login_create_service');
    }
    protected function getCustomer_loginUpdateService(): Update
    {
        return $this->container->get('Customer_login_update_service');
    }
    protected function getCustomer_loginDeleteService(): Delete
    {
        return $this->container->get('Customer_login_delete_service');
    }
}
