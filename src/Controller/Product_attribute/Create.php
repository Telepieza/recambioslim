<?php
 /**
  * Create.php
  * Description: Product_attribute Services route path create with token verification
  * @Author : M.V.M.
  * @Version: 1.0.11
**/
declare(strict_types=1);

namespace App\Controller\Product_attribute;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response)
    {
        $this->baseParameters->setTableController($this->getProduct_attributeTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getProduct_attributeCreateService()->create($request, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}