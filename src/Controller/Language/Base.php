<?php
 /**
  * Base.php
  * Description: Controller and router service language
  * @Author : M.V.M.
  * @Version: 1.0.16
**/
declare(strict_types=1);

namespace App\Controller\Language;

use App\Controller\BaseController;
use App\Service\Language\Create;
use App\Service\Language\Delete;
use App\Service\Language\Find;
use App\Service\Language\Update;

abstract class Base extends BaseController
{

    protected function getLanguageTable() : string
    {
        return 'language';
    }
    
    protected function getLanguageFindService(): Find
    {
        return $this->container->get('Language_find_service');
    }
    protected function getLanguageCreateService(): Create
    {
        return $this->container->get('Language_create_service');
    }
    protected function getLanguageUpdateService(): Update
    {
        return $this->container->get('Language_update_service');
    }
    protected function getLanguageDeleteService(): Delete
    {
        return $this->container->get('Language_delete_service');
    }
}
