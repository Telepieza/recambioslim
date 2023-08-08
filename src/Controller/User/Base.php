<?php

declare(strict_types=1);

namespace App\Controller\User;

use App\Controller\BaseController;

use App\Service\user\Find;
use App\Service\User\Login;

abstract class Base extends BaseController
{
    protected function getUserLoginService(): Login
    {
        return $this->container->get('user_login_service');
    }
 

}
