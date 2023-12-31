<?php
 /**
  * Base.php
  * Description: Controller and router service user
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\User;

use App\Controller\BaseController;
use App\Service\User\Login;

abstract class Base extends BaseController
{
    protected function getUserTable() : string
    {
        return 'user';
    }
    protected function getUserLoginService(): Login
    {
        return $this->container->get('user_login_service');
    }
 

}
