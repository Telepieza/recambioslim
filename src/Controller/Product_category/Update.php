<?php
/**
* Update.php
* Description: Product_category Services route path delete for id with token verification
* @Author : M.V.M.
* @Version 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_category;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Update extends Base
{
    public function __invoke(Request $request,Response $response,array $args)
    {
        $this->baseParameters->setTableController($this->getProduct_categoryTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getProduct_categoryUpdateService()->update($request, $args, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}