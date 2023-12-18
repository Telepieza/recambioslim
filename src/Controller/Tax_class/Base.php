<?php
 /**
  * Base.php
  * Description: Controller and router service Tax_class
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\Tax_class;

use App\Controller\BaseController;
use App\Service\Tax_class\Create;
use App\Service\Tax_class\Delete;
use App\Service\Tax_class\Find;
use App\Service\Tax_class\Update;

abstract class Base extends BaseController
{
    protected function getTax_classTable() : string
    {
        return 'tax_class';
    }

    protected function getTax_classFindService(): Find
    {
        return $this->container->get('Tax_class_find_service');
    }
    protected function getTax_classCreateService(): Create
    {
        return $this->container->get('Tax_class_create_service');
    }
    protected function getTax_classUpdateService(): Update
    {
        return $this->container->get('Tax_class_update_service');
    }
    protected function getTax_classDeleteService(): Delete
    {
        return $this->container->get('Tax_class_delete_service');
    }
}
