<?php
/**
* Update.php
* Description: Country Services route path delete for id with token verification
* @Author : M.V.M.
* @Version: 1.0.5
**/
declare(strict_types=1);

namespace App\Controller\Country;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Update extends Base
{
    public function __invoke(Request $request,Response $response,array $args)
    {   
        $this->baseParameters->setTableController($this->getCountryTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getCountryUpdateService()->update($request, $args, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}
