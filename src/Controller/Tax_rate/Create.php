<?php
 /**
  * Create.php
  * Description: Tax_rate Services route path create with token verification
  * @Author : M.V.M.
  * @Version: 1.0.7
**/
declare(strict_types=1);

namespace App\Controller\Tax_rate;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response)
    {
        $this->baseParameters->setTableController($this->getTax_rateTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getTax_rateCreateService()->create($request, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}

