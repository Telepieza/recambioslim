<?php
 /**
  * Base.php
  * Description: Controller and router service custom_field
  * @Author : M.V.M.
  * @Version: 1.0.10
**/
declare(strict_types=1);

namespace App\Controller\Custom_field;

use App\Controller\BaseController;
use App\Service\Custom_field\Create;
use App\Service\Custom_field\Delete;
use App\Service\Custom_field\Find;
use App\Service\Custom_field\Update;

abstract class Base extends BaseController
{
    protected function getcustom_fieldTable() : string
    {
        $tableName  = 'custom_field';
        return $tableName;
    }

    protected function getcustom_fieldFindService(): Find
    {
        return $this->container->get('custom_field_find_service');
    }
    protected function getcustom_fieldCreateService(): Create
    {
        return $this->container->get('custom_field_create_service');
    }
    protected function getcustom_fieldUpdateService(): Update
    {
        return $this->container->get('custom_field_update_service');
    }
    protected function getcustom_fieldDeleteService(): Delete
    {
        return $this->container->get('custom_field_delete_service');
    }
}
