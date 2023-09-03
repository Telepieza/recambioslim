<?php
 /**
  * Delete.php
  * Description: category Services route path delete with token verification
  * @Author : M.V.M.
  * @Version: 1.0.5
**/
declare(strict_types=1);

namespace App\Controller\Category;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Delete extends Base
{
    public function __invoke(Request $request, Response $response,array $args)
    {
        $this->baseParameters->setTableController($this->getCategoryTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getCategoryDeleteService()->delete($request, $args, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}

