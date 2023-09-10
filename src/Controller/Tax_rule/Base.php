<?php
 /**
  * Base.php
  * Description: Controller and router service Tax_rule
  * @Author : M.V.M.
  * @Version: 1.0.7
**/
declare(strict_types=1);

namespace App\Controller\Tax_rule;

use App\Controller\BaseController;
use App\Service\Tax_rule\Create;
use App\Service\Tax_rule\Delete;
use App\Service\Tax_rule\Find;
use App\Service\Tax_rule\Update;

abstract class Base extends BaseController
{
    protected function getTax_ruleTable() : string 
    {
        $tableName  = 'Tax_rule';
        return $tableName;
    }

    protected function getTax_ruleFindService(): Find
    {
        return $this->container->get('Tax_rule_find_service');
    }
    protected function getTax_ruleCreateService(): Create
    {
        return $this->container->get('Tax_rule_create_service');
    }
    protected function getTax_ruleUpdateService(): Update
    {
        return $this->container->get('Tax_rule_update_service');
    }
    protected function getTax_ruleDeleteService(): Delete
    {
        return $this->container->get('Tax_rule_delete_service');
    }
}
