<?php
/** 
  * Routes.php
  * Description: APP Routes
  * @Author : M.V.M.
  * @Version 1.0.11
**/
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

use App\Application\Help\Home;
use App\Application\Help\Hello;
use App\Application\Help\Helper;

use App\Controller\Category;
use App\Controller\Category_description;
use App\Controller\Language;
use App\Controller\Manufacturer;
use App\Controller\User;
use App\Controller\Geo_zone;
use App\Controller\Country;
use App\Controller\Location;
use App\Controller\Zone;

use App\Controller\Tax_class;
use App\Controller\Tax_rate;
use App\Controller\Tax_rule;

use App\Controller\Customer;
use App\Controller\Customer_activity;
use App\Controller\Customer_approval;
use App\Controller\Customer_group;
use App\Controller\Customer_history;
use App\Controller\Customer_ip;
use App\Controller\Customer_login;
use App\Controller\Customer_reward;
use App\Controller\Customer_transaction;

use App\Controller\Product;
use App\Controller\Product_attribute;
use App\Controller\Product_related;
use App\Controller\Product_description;
use App\Controller\Product_layout;
use App\Controller\Product_reward;
use App\Controller\Product_category;
use App\Controller\Product_store;

use App\Controller\Custom_field;

return function (App $app)
{

    $app->group('/opencard/api',function(Group $group)                                    // adaptar a la ruta del BackEnd
    {

      $group->get('/', function (Request $request, Response $response)
        {
            $result = ["hello" => 'Telepieza'];
            $response->getBody()->write((string)json_encode($result,JSON_PRETTY_PRINT));
            $response->withHeader('Content-Type', 'application/json');
            return $response;
        });

        $group->group('/hello', function (Group $group)
        {
          $group->get('', Hello::class)->setName('hello');
          $group->get('/{name}', Hello::class)->setName('hello');
        });

        $group->group('/home', function (Group $group)
        {
            $group->get('',Home::class);
        });

        $group->group('/helper', function (Group $group)
        {
           $group->get('',Helper::class);
        });

        $group->group('/users', function (Group $group)
        {
            $group->post('/login',User\GetLogin::class);
        });
        
        $group->group('/category', function (Group $group)
        {
           $group->get('/',Category\GetScheme::class);
           $group->get('/read',Category\GetAll::class);
           $group->get('/read/{category_id:[0-9]+}',Category\GetOne::class);
           $group->post('/new',Category\Create::class);
           $group->post('/delete/{category_id:[0-9]+}',Category\Delete::class);     // servidor (No admite put y delete -error 405)
           $group->post('/update/{category_id:[0-9]+}',Category\Update::class);     // servidor (No admite put y delete -error 405)
           $group->put('/update/{category_id:[0-9]+}',Category\Update::class);      // servidor (admite put y delete)
           $group->delete('/delete/{category_id:[0-9]+}',Category\Delete::class);   // servidor (admite put y delete)
        });

        $group->group('/category_description', function (Group $group)
        {
          $group->get('/',Category_description\GetScheme::class);
          $group->get('/read',Category_description\GetAll::class);
          $group->get('/read/{category_id:[0-9]+}',Category_description\GetOne::class);
          $group->post('/new',category_description\Create::class);
          $group->post('/delete/{category_id:[0-9]+}',Category_description\Delete::class);
          $group->post('/update/{category_id:[0-9]+}',Category_description\Update::class);
          $group->put('/update/{category_id:[0-9]+}',Category_description\Update::class);     // servidor (admite put y delete)
          $group->delete('/delete/{category_id:[0-9]+}',Category_description\Delete::class);  // servidor (admite put y delete)
       });

        $group->group('/language', function (Group $group)
        {
          $group->get('/',Language\GetScheme::class);
          $group->get('/read',Language\GetAll::class);
          $group->get('/read/{language_id:[0-9]+}',Language\GetOne::class);
          $group->post('/new',Language\Create::class);
          $group->post('/delete/{language_id:[0-9]+}',Language\Delete::class);       // servidor (No admite put y delete -error 405)
          $group->post('/update/{language_id:[0-9]+}',Language\Update::class);       // servidor (No admite put y delete -error 405)
          $group->put('/update/{language_id:[0-9]+}',Language\Update::class);        // servidor (admite put y delete)
          $group->delete('/delete/{language_id:[0-9]+}',Language\Delete::class);     // servidor (admite put y delete)
        });

        $group->group('/manufacturer', function (Group $group)
        {
          $group->get('/',Manufacturer\GetScheme::class);
          $group->get('/read',Manufacturer\GetAll::class);
          $group->get('/read/{manufacturer_id:[0-9]+}',Manufacturer\GetOne::class);
          $group->post('/new',Manufacturer\Create::class);
          $group->post('/delete/{manufacturer_id:[0-9]+}',Manufacturer\Delete::class);    // servidor (No admite put y delete -error 405)
          $group->post('/update/{manufacturer_id:[0-9]+}',Manufacturer\Update::class);    // servidor (No admite put y delete -error 405)
          $group->put('/update/{manufacturer_id:[0-9]+}',Manufacturer\Update::class);     // servidor (admite put y delete)
          $group->delete('/delete/{manufacturer_id:[0-9]+}',Manufacturer\Delete::class);  // servidor (admite put y delete)
       });

       $group->group('/geo_zone', function (Group $group)
       {
         $group->get('/',Geo_zone\GetScheme::class);
         $group->get('/read',Geo_zone\GetAll::class);
         $group->get('/read/{geo_zone_id:[0-9]+}',Geo_zone\GetOne::class);
         $group->post('/new',geo_zone\Create::class);
         $group->post('/delete/{geo_zone_id:[0-9]+}',Geo_zone\Delete::class);
         $group->post('/update/{geo_zone_id:[0-9]+}',Geo_zone\Update::class);
         $group->put('/update/{geo_zone_id:[0-9]+}',Geo_zone\Update::class);     // servidor (admite put y delete)
         $group->delete('/delete/{geo_zone_id:[0-9]+}',Geo_zone\Delete::class);  // servidor (admite put y delete)
      });

     $group->group('/country', function (Group $group)
     {
       $group->get('/',Country\GetScheme::class);
       $group->get('/read',Country\GetAll::class);
       $group->get('/read/{country_id:[0-9]+}',Country\GetOne::class);
       $group->post('/new',Country\Create::class);
       $group->post('/delete/{country_id:[0-9]+}',Country\Delete::class);
       $group->post('/update/{country_id:[0-9]+}',Country\Update::class);
       $group->put('/update/{country_id:[0-9]+}',Country\Update::class);     // servidor (admite put y delete)
       $group->delete('/delete/{country_id:[0-9]+}',Country\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/location', function (Group $group)
    {
      $group->get('/',Location\GetScheme::class);
      $group->get('/read',Location\GetAll::class);
      $group->get('/read/{location_id:[0-9]+}',Location\GetOne::class);
      $group->post('/new',Location\Create::class);
      $group->post('/delete/{location_id:[0-9]+}',Location\Delete::class);
      $group->post('/update/{location_id:[0-9]+}',Location\Update::class);
      $group->put('/update/{location_id:[0-9]+}',Location\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{location_id:[0-9]+}',Location\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/zone', function (Group $group)
    {
      $group->get('/',Zone\GetScheme::class);
      $group->get('/read',Zone\GetAll::class);
      $group->get('/read/{zone_id:[0-9]+}',Zone\GetOne::class);
      $group->post('/new',Zone\Create::class);
      $group->post('/delete/{zone_id:[0-9]+}',Zone\Delete::class);
      $group->post('/update/{zone_id:[0-9]+}',Zone\Update::class);
      $group->put('/update/{zone_id:[0-9]+}',Zone\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{zone_id:[0-9]+}',Zone\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/tax_class', function (Group $group)
    {
       $group->get('/',Tax_class\GetScheme::class);
       $group->get('/read',Tax_class\GetAll::class);
       $group->get('/read/{tax_class_id:[0-9]+}',Tax_class\GetOne::class);
       $group->post('/new',Tax_class\Create::class);
       $group->post('/delete/{tax_class_id:[0-9]+}',Tax_class\Delete::class);
       $group->post('/update/{tax_class_id:[0-9]+}',Tax_class\Update::class);
       $group->put('/update/{tax_class_id:[0-9]+}',Tax_class\Update::class);     // servidor (admite put y delete)
       $group->delete('/delete/{tax_class_id:[0-9]+}',Tax_class\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/tax_rate', function (Group $group)
    {
       $group->get('/',Tax_rate\GetScheme::class);
       $group->get('/read',Tax_rate\GetAll::class);
       $group->get('/read/{tax_rate_id:[0-9]+}',Tax_rate\GetOne::class);
       $group->post('/new',Tax_rate\Create::class);
       $group->post('/delete/{tax_rate_id:[0-9]+}',Tax_rate\Delete::class);
       $group->post('/update/{tax_rate_id:[0-9]+}',Tax_rate\Update::class);
       $group->put('/update/{tax_rate_id:[0-9]+}',Tax_rate\Update::class);     // servidor (admite put y delete)
       $group->delete('/delete/{tax_rate_id:[0-9]+}',Tax_rate\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/tax_rule', function (Group $group)
    {
       $group->get('/',Tax_rule\GetScheme::class);
       $group->get('/read',Tax_rule\GetAll::class);
       $group->get('/read/{tax_rule_id:[0-9]+}',Tax_rule\GetOne::class);
       $group->post('/new',Tax_rule\Create::class);
       $group->post('/delete/{tax_rule_id:[0-9]+}',Tax_rule\Delete::class);
       $group->post('/update/{tax_rule_id:[0-9]+}',Tax_rule\Update::class);
       $group->put('/update/{tax_rule_id:[0-9]+}',Tax_rule\Update::class);     // servidor (admite put y delete)
       $group->delete('/delete/{tax_rule_id:[0-9]+}',Tax_rule\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer', function (Group $group)
    {
      $group->get('/',Customer\GetScheme::class);
      $group->get('/read',Customer\GetAll::class);
      $group->get('/read/{customer_id:[0-9]+}',Customer\GetOne::class);
      $group->post('/new',Customer\Create::class);
      $group->post('/delete/{customer_id:[0-9]+}',Customer\Delete::class);
      $group->post('/update/{customer_id:[0-9]+}',Customer\Update::class);
      $group->put('/update/{customer_id:[0-9]+}',Customer\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_id:[0-9]+}',Customer\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_activity', function (Group $group)
    {
      $group->get('/',Customer_activity\GetScheme::class);
      $group->get('/read',Customer_activity\GetAll::class);
      $group->get('/read/{customer_activity_id:[0-9]+}',Customer_activity\GetOne::class);
      $group->post('/new',Customer_activity\Create::class);
      $group->post('/delete/{customer_activity_id:[0-9]+}',Customer_activity\Delete::class);
      $group->post('/update/{customer_activity_id:[0-9]+}',Customer_activity\Update::class);
      $group->put('/update/{customer_activity_id:[0-9]+}',Customer_activity\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_activity_id:[0-9]+}',Customer_activity\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_approval', function (Group $group)
    {
      $group->get('/',Customer_approval\GetScheme::class);
      $group->get('/read',Customer_approval\GetAll::class);
      $group->get('/read/{customer_approval_id:[0-9]+}',Customer_approval\GetOne::class);
      $group->post('/new',Customer_approval\Create::class);
      $group->post('/delete/{customer_approval_id:[0-9]+}',Customer_approval\Delete::class);
      $group->post('/update/{customer_approval_id:[0-9]+}',Customer_approval\Update::class);
      $group->put('/update/{customer_approval_id:[0-9]+}',Customer_approval\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_approval_id:[0-9]+}',Customer_approval\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_group', function (Group $group)
    {
      $group->get('/',Customer_group\GetScheme::class);
      $group->get('/read',Customer_group\GetAll::class);
      $group->get('/read/{customer_group_id:[0-9]+}',Customer_group\GetOne::class);
      $group->post('/new',Customer_group\Create::class);
      $group->post('/delete/{customer_group_id:[0-9]+}',Customer_group\Delete::class);
      $group->post('/update/{customer_group_id:[0-9]+}',Customer_group\Update::class);
      $group->put('/update/{customer_group_id:[0-9]+}',Customer_group\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_group_id:[0-9]+}',Customer_group\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_history', function (Group $group)
    {
      $group->get('/',Customer_history\GetScheme::class);
      $group->get('/read',Customer_history\GetAll::class);
      $group->get('/read/{customer_history_id:[0-9]+}',Customer_history\GetOne::class);
      $group->post('/new',Customer_history\Create::class);
      $group->post('/delete/{customer_history_id:[0-9]+}',Customer_history\Delete::class);
      $group->post('/update/{customer_history_id:[0-9]+}',Customer_history\Update::class);
      $group->put('/update/{customer_history_id:[0-9]+}',Customer_history\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_history_id:[0-9]+}',Customer_history\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_ip', function (Group $group)
    {
      $group->get('/',Customer_ip\GetScheme::class);
      $group->get('/read',Customer_ip\GetAll::class);
      $group->get('/read/{customer_ip_id:[0-9]+}',Customer_ip\GetOne::class);
      $group->post('/new',Customer_ip\Create::class);
      $group->post('/delete/{customer_ip_id:[0-9]+}',Customer_ip\Delete::class);
      $group->post('/update/{customer_ip_id:[0-9]+}',Customer_ip\Update::class);
      $group->put('/update/{customer_ip_id:[0-9]+}',Customer_ip\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_ip_id:[0-9]+}',Customer_ip\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_login', function (Group $group)
    {
      $group->get('/',Customer_login\GetScheme::class);
      $group->get('/read',Customer_login\GetAll::class);
      $group->get('/read/{customer_login_id:[0-9]+}',Customer_login\GetOne::class);
      $group->post('/new',Customer_login\Create::class);
      $group->post('/delete/{customer_login_id:[0-9]+}',Customer_login\Delete::class);
      $group->post('/update/{customer_login_id:[0-9]+}',Customer_login\Update::class);
      $group->put('/update/{customer_login_id:[0-9]+}',Customer_login\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_login_id:[0-9]+}',Customer_login\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_reward', function (Group $group)
    {
      $group->get('/',Customer_reward\GetScheme::class);
      $group->get('/read',Customer_reward\GetAll::class);
      $group->get('/read/{customer_reward_id:[0-9]+}',Customer_reward\GetOne::class);
      $group->post('/new',Customer_reward\Create::class);
      $group->post('/delete/{customer_reward_id:[0-9]+}',Customer_reward\Delete::class);
      $group->post('/update/{customer_reward_id:[0-9]+}',Customer_reward\Update::class);
      $group->put('/update/{customer_reward_id:[0-9]+}',Customer_reward\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_reward_id:[0-9]+}',Customer_reward\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/customer_transaction', function (Group $group)
    {
      $group->get('/',Customer_transaction\GetScheme::class);
      $group->get('/read',Customer_transaction\GetAll::class);
      $group->get('/read/{customer_transaction_id:[0-9]+}',Customer_transaction\GetOne::class);
      $group->post('/new',Customer_transaction\Create::class);
      $group->post('/delete/{customer_transaction_id:[0-9]+}',Customer_transaction\Delete::class);
      $group->post('/update/{customer_transaction_id:[0-9]+}',Customer_transaction\Update::class);
      $group->put('/update/{customer_transaction_id:[0-9]+}',Customer_transaction\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{customer_transaction_id:[0-9]+}',Customer_transaction\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product', function (Group $group)
    {
      $group->get('/',Product\GetScheme::class);
      $group->get('/read',Product\GetAll::class);
      $group->get('/read/{product_id:[0-9]+}',Product\GetOne::class);
      $group->post('/new',Product\Create::class);
      $group->post('/delete/{product_id:[0-9]+}',Product\Delete::class);
      $group->post('/update/{product_id:[0-9]+}',Product\Update::class);
      $group->put('/update/{product_id:[0-9]+}',Product\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_id:[0-9]+}',Product\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product_description', function (Group $group)
    {
      $group->get('/',Product_description\GetScheme::class);
      $group->get('/read',Product_description\GetAll::class);
      $group->get('/read/{product_id:[0-9]+}',Product_description\GetOne::class);
      $group->post('/new',Product_description\Create::class);
      $group->post('/delete/{product_id:[0-9]+}',Product_description\Delete::class);
      $group->post('/update/{product_id:[0-9]+}',Product_description\Update::class);
      $group->put('/update/{product_id:[0-9]+}',Product_description\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_id:[0-9]+}',Product_description\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product_attribute', function (Group $group)
    {
      $group->get('/',Product_attribute\GetScheme::class);
      $group->get('/read',Product_attribute\GetAll::class);
      $group->get('/read/{product_id:[0-9]+}',Product_attribute\GetOne::class);
      $group->post('/new',Product_attribute\Create::class);
      $group->post('/delete/{product_id:[0-9]+}',Product_attribute\Delete::class);
      $group->post('/update/{product_id:[0-9]+}',Product_attribute\Update::class);
      $group->put('/update/{product_id:[0-9]+}',Product_attribute\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_id:[0-9]+}',Product_attribute\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product_related', function (Group $group)
    {
      $group->get('/',Product_related\GetScheme::class);
      $group->get('/read',Product_related\GetAll::class);
      $group->get('/read/{product_id:[0-9]+}',Product_related\GetOne::class);
      $group->post('/new',Product_related\Create::class);
      $group->post('/delete/{product_id:[0-9]+}',Product_related\Delete::class);
      $group->post('/update/{product_id:[0-9]+}',Product_related\Update::class);
      $group->put('/update/{product_id:[0-9]+}',Product_related\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_id:[0-9]+}',Product_related\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product_layout', function (Group $group)
    {
      $group->get('/',Product_layout\GetScheme::class);
      $group->get('/read',Product_layout\GetAll::class);
      $group->get('/read/{product_id:[0-9]+}',Product_layout\GetOne::class);
      $group->post('/new',Product_layout\Create::class);
      $group->post('/delete/{product_id:[0-9]+}',Product_layout\Delete::class);
      $group->post('/update/{product_id:[0-9]+}',Product_layout\Update::class);
      $group->put('/update/{product_id:[0-9]+}',Product_layout\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_id:[0-9]+}',Product_layout\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product_category', function (Group $group)
    {
      $group->get('/',Product_category\GetScheme::class);
      $group->get('/read',Product_category\GetAll::class);
      $group->get('/read/{product_id:[0-9]+}',Product_category\GetOne::class);
      $group->post('/new',Product_category\Create::class);
      $group->post('/delete/{product_id:[0-9]+}',Product_category\Delete::class);
      $group->post('/update/{product_id:[0-9]+}',Product_category\Update::class);
      $group->put('/update/{product_id:[0-9]+}',Product_category\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_id:[0-9]+}',Product_category\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product_store', function (Group $group)
    {
      $group->get('/',Product_store\GetScheme::class);
      $group->get('/read',Product_store\GetAll::class);
      $group->get('/read/{product_id:[0-9]+}',Product_store\GetOne::class);
      $group->post('/new',Product_store\Create::class);
      $group->post('/delete/{product_id:[0-9]+}',Product_store\Delete::class);
      $group->post('/update/{product_id:[0-9]+}',Product_store\Update::class);
      $group->put('/update/{product_id:[0-9]+}',Product_store\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_id:[0-9]+}',Product_store\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/product_reward', function (Group $group)
    {
      $group->get('/',Product_reward\GetScheme::class);
      $group->get('/read',Product_reward\GetAll::class);
      $group->get('/read/{product_reward_id:[0-9]+}',Product_reward\GetOne::class);
      $group->post('/new',Product_reward\Create::class);
      $group->post('/delete/{product_reward_id:[0-9]+}',Product_reward\Delete::class);
      $group->post('/update/{product_reward_id:[0-9]+}',Product_reward\Update::class);
      $group->put('/update/{product_reward_id:[0-9]+}',Product_reward\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{product_reward_id:[0-9]+}',Product_reward\Delete::class);  // servidor (admite put y delete)
    });

    $group->group('/custom_field', function (Group $group)
    {
      $group->get('/',Custom_field\GetScheme::class);
      $group->get('/read',Custom_field\GetAll::class);
      $group->get('/read/{custom_field_id:[0-9]+}',Custom_field\GetOne::class);
      $group->post('/new',Custom_field\Create::class);
      $group->post('/delete/{custom_field_id:[0-9]+}',Custom_field\Delete::class);
      $group->post('/update/{custom_field_id:[0-9]+}',Custom_field\Update::class);
      $group->put('/update/{custom_field_id:[0-9]+}',Custom_field\Update::class);     // servidor (admite put y delete)
      $group->delete('/delete/{custom_field_id:[0-9]+}',Custom_field\Delete::class);  // servidor (admite put y delete)
    });

});

    /*
     * Catch-all route to serve a 404 Not Found page if none of the routes match
     * NOTE: make sure this route is defined last
     */
     $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response): void {
        throw new Slim\Exception\HttpNotFoundException($request);
    });

};
