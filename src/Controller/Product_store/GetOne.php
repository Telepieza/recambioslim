<?php
/** 
  * GetOne.php
  * Description: Product_store Services route path read id with token verification
  * @Author : M.V.M.
  * @Version 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_store;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetOne extends Base
{
    public function __invoke(Request $request,Response $response,array $args)
    {
        $this->baseParameters->setTableController($this->getProduct_storeTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getProduct_storeFindService()->getOne($request, $args, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    } 
}
