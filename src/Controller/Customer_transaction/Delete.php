<?php
 /**
  * Delete.php
  * Description: Customer_transaction Services route path delete with token verification
  * @Author : M.V.M.
  * @Version: 1.0.9
**/
declare(strict_types=1);

namespace App\Controller\Customer_transaction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Delete extends Base
{
    public function __invoke(Request $request, Response $response,array $args)
    {
        $this->baseParameters->setTableController($this->getCustomer_transactionTable());
        $result = $this->getAuthUser($request);
        if ($result['code'] === 200) {
            $result = $this->getCustomer_transactionDeleteService()->delete($request, $args, $this->baseParameters);
        }
        return $this->jsonWithData($response, $this->getPayload($result));
    }
}

