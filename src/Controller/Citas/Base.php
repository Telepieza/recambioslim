<?php

declare(strict_types=1);

namespace App\Controller\Citas;

use App\Controller\BaseController;
use App\Service\Citas\Create;
use App\Service\Citas\Delete;
use App\Service\Citas\Find;
use App\Service\Citas\Update;

abstract class Base extends BaseController
{
    
    protected function getCitasFindService(): Find
    {
        return $this->container->get('citas_find_service');
    }
    protected function getCitasCreateService(): Create
    {
        return $this->container->get('citas_create_service');
    }
    protected function getCitasUpdateService(): Update
    {
        return $this->container->get('citas_update_service');
    }
    protected function getCitasDeleteService(): Delete
    {
        return $this->container->get('citas_delete_service');
    }
}
