<?php
 /**
  * Create.php
  * Description: Tax_class Services route path create with token verification
  * @Author : M.V.M.
  * @Version: 1.0.7
**/
declare(strict_types=1);

namespace App\Controller\Tax_class;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response)
    {
        $this->baseParameters->setTableController($this->getTax_classTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getTax_classCreateService()->create($request, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}

