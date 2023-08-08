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
        $this->baseParameters->setTableController($this->getUserTable());
        $result = $this->getUserLoginService()->login($request, $this->baseParameters);
        $payload = new BasePayLoad($result);
        if ($payload->getStatus() === 'error') {
            $this->baseParameters->getLogger()->error($this->baseParameters->getTableController() . ' ' . $payload->getCode() . ' ' . $payload->getMessage());
        }
        return $this->jsonWithData($response, $payload); 
    } 
}
