<?php

declare(strict_types=1);

namespace App\Controller\Language;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response) 
    {
        $this->baseParameters->setTableController($this->getLanguageTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getLanguageCreateService()->create($request, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result)); 
    }
}

