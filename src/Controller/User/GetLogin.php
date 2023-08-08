<?php

declare(strict_types=1);

namespace App\Controller\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BasePayLoad;


final class GetLogin extends Base
{

public function __invoke(Request $request,Response $response)
    {
        $this->setTableController('User');
        $result = $this->getUserLoginService()->login($this->getDb() , $request, $this->getKeyToken(), $this->getLogger(), $this->getDebug());
        $payload = new BasePayload($result);
        if ($payload->getStatus() === 'Error') {
            $this->logger->error($this->getTableController() . ' ' . $payload->getCode() . ' ' . $payload->getMessage());
        }
        return $this->jsonWithData($response, $payload); 
    } 
}
