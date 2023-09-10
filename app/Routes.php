<?php
/** 
  * Routes.php
  * Description: APP Routes
  * @Author : M.V.M.
  * @Version 1.0.5
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
use App\Controller\Language;
use App\Controller\Manufacturer;
use App\Controller\User;
use App\Controller\Geo_zone;
use App\Controller\CategoryDescription;
use App\Controller\Country;
use App\Controller\Location;
use App\Controller\Zone;
use App\Controller\Tax_class;
use App\Controller\Tax_rate;
use App\Controller\Tax_rule;

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

      $group->group('/category_description', function (Group $group)
      {
        $group->get('/',CategoryDescription\GetScheme::class);
        $group->get('/read',CategoryDescription\GetAll::class);
        $group->get('/read/{category_id:[0-9]+}',CategoryDescription\GetOne::class);
        $group->post('/new',category_description\Create::class);
        $group->post('/delete/{category_id:[0-9]+}',CategoryDescription\Delete::class);
        $group->post('/update/{category_id:[0-9]+}',CategoryDescription\Update::class);
        $group->put('/update/{category_id:[0-9]+}',CategoryDescription\Update::class);     // servidor (admite put y delete)
        $group->delete('/delete/{category_id:[0-9]+}',CategoryDescription\Delete::class);  // servidor (admite put y delete)
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
     $group->get('/',tax_class\GetScheme::class);
     $group->get('/read',tax_class\GetAll::class);
     $group->get('/read/{tax_class_id:[0-9]+}',tax_class\GetOne::class);
     $group->post('/new',tax_class\Create::class);
     $group->post('/delete/{tax_class_id:[0-9]+}',tax_class\Delete::class);
     $group->post('/update/{tax_class_id:[0-9]+}',tax_class\Update::class);
     $group->put('/update/{tax_class_id:[0-9]+}',tax_class\Update::class);     // servidor (admite put y delete)
     $group->delete('/delete/{tax_class_id:[0-9]+}',tax_class\Delete::class);  // servidor (admite put y delete)
  });

  $group->group('/tax_rate', function (Group $group)
   {
     $group->get('/',tax_rate\GetScheme::class);
     $group->get('/read',tax_rate\GetAll::class);
     $group->get('/read/{tax_rate_id:[0-9]+}',tax_rate\GetOne::class);
     $group->post('/new',tax_rate\Create::class);
     $group->post('/delete/{tax_rate_id:[0-9]+}',tax_rate\Delete::class);
     $group->post('/update/{tax_rate_id:[0-9]+}',tax_rate\Update::class);
     $group->put('/update/{tax_rate_id:[0-9]+}',tax_rate\Update::class);     // servidor (admite put y delete)
     $group->delete('/delete/{tax_rate_id:[0-9]+}',tax_rate\Delete::class);  // servidor (admite put y delete)
  });

  $group->group('/tax_rule', function (Group $group)
   {
     $group->get('/',tax_rule\GetScheme::class);
     $group->get('/read',tax_rule\GetAll::class);
     $group->get('/read/{tax_rule_id:[0-9]+}',tax_rule\GetOne::class);
     $group->post('/new',tax_rule\Create::class);
     $group->post('/delete/{tax_rule_id:[0-9]+}',tax_rule\Delete::class);
     $group->post('/update/{tax_rule_id:[0-9]+}',tax_rule\Update::class);
     $group->put('/update/{tax_rule_id:[0-9]+}',tax_rule\Update::class);     // servidor (admite put y delete)
     $group->delete('/delete/{tax_rule_id:[0-9]+}',tax_rule\Delete::class);  // servidor (admite put y delete)
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
