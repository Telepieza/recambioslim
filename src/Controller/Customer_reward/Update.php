<?php
/**
* Update.php
* Description: Customer_reward Services route path delete for id with token verification
* @Author : M.V.M.
* @Version 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_reward;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Update extends Base
{
    public function __invoke(Request $request,Response $response,array $args) 
    {
        $this->baseParameters->setTableController($this->getCustomer_rewardTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getCustomer_rewardUpdateService()->update($request, $args, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}
