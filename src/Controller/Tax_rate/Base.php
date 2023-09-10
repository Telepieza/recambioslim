<?php
 /**
  * Base.php
  * Description: Controller and router service Tax_rate
  * @Author : M.V.M.
  * @Version: 1.0.7
**/
declare(strict_types=1);

namespace App\Controller\Tax_rate;

use App\Controller\BaseController;
use App\Service\Tax_rate\Create;
use App\Service\Tax_rate\Delete;
use App\Service\Tax_rate\Find;
use App\Service\Tax_rate\Update;

abstract class Base extends BaseController
{
    protected function getTax_rateTable() : string 
    {
        $tableName  = 'Tax_rate';
        return $tableName;
    }

    protected function getTax_rateFindService(): Find
    {
        return $this->container->get('Tax_rate_find_service');
    }
    protected function getTax_rateCreateService(): Create
    {
        return $this->container->get('Tax_rate_create_service');
    }
    protected function getTax_rateUpdateService(): Update
    {
        return $this->container->get('Tax_rate_update_service');
    }
    protected function getTax_rateDeleteService(): Delete
    {
        return $this->container->get('Tax_rate_delete_service');
    }
}
