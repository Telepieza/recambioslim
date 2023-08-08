<?php

declare(strict_types=1);

namespace App\Application\Help;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\BasePayLoad;
 
final class Helper  
{
    public function __invoke(Request $request, Response $response,$args) 
    {
		$result     = [];
        $rx_http = '/\AHTTP_/';
        foreach ($_SERVER as $key => $val) 
        {
            if (preg_match($rx_http, $key)) 
            {
               $result_key    = preg_replace($rx_http, '', $key);
               $rx_matches = [];
               $rx_matches = explode('_', $result_key);
               if (count($rx_matches) > 0 and strlen($result_key) > 2) 
               {
                   foreach ($rx_matches as $ak_key => $ak_val) 
                   {
                     $rx_matches[$ak_key] = ucfirst($ak_val);
                   }
                   $result_key = implode('-', $rx_matches);
               } 
             $result[$result_key] = $val;
            }
        }

        $data            = [];
        $data['code']    = 200;  
        $data['status']  = "Helper";  
        $data['message'] = $result;  
        $payload         = new BasePayLoad($data);
        $json            = json_encode($payload,JSON_PRETTY_PRINT);
        $json            = str_replace(Chr(92),'',$json);
        $response->getBody()->write($json);
        return $response
                  ->withHeader('Content-Type', 'application/json')
                  ->withStatus($payload->getCode());
    
    }    

}
