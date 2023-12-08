<?php
 /**
  * Create.php
  * Description: custom_field Services route path create with token verification
  * @Author : M.V.M.
  * @Version: 1.0.10
**/
declare(strict_types=1);

namespace App\Controller\Custom_field;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response)
    {
        $this->baseParameters->setTableController($this->getcustom_fieldTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getcustom_fieldCreateService()->create($request, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}

