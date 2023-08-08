<?php

declare(strict_types=1);

namespace App\Controller\Category;

use App\Controller\BaseController;
use App\Service\Category\Create;
use App\Service\Category\Delete;
use App\Service\Category\Find;
use App\Service\Category\Update;

abstract class Base extends BaseController
{
    protected function getCategoryTable() : string 
    {
        $tableName  = 'category';
        return $tableName;
    }

    protected function getCategoryFindService(): Find
    {
        return $this->container->get('Category_find_service');
    }
    protected function getCategoryCreateService(): Create
    {
        return $this->container->get('Category_create_service');
    }
    protected function getCategoryUpdateService(): Update
    {
        return $this->container->get('Category_update_service');
    }
    protected function getCategoryDeleteService(): Delete
    {
        return $this->container->get('Category_delete_service');
    }
}
