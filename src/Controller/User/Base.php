<?php

declare(strict_types=1);

namespace App\Controller\User;

use App\Controller\BaseController;
use App\Service\User\Login;

abstract class Base extends BaseController
{
    protected function getUserTable() : string 
    {
        $tableName  = 'user';
        return $tableName;
    }
    protected function getUserLoginService(): Login
    {
        return $this->container->get('user_login_service');
    }
 

}
