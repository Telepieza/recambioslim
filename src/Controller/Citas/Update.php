<?php

declare(strict_types=1);

namespace App\Controller\Citas;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Update extends Base
{
    public function __invoke(Request $request,Response $response,array $args) 
    {   
        $this->setTableController('Citas');
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getCitasUpdateService()->update($this->getDb() , $request, $args, $this->getLogger(), $this->getDebug());
        }
        return $this->jsonWithData($response, $this->getPayload($result)); 
    }
}
