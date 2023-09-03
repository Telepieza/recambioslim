<?php
/** 
  * Services.php
  * Description: Container Services by templates and table
  * @Author : M.V.M.
  * @Version 1.0.5
**/
declare(strict_types=1);

use App\Service\Category;
use App\Service\Language;
use App\Service\Manufacturer;
use App\Service\Geo_zone;
use App\Service\CategoryDescription;
use App\Service\Country;
use App\Service\Location;
use App\Service\Zone;

use App\Service\User;

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
  $container = [];

  // Category
  $container['Category_find_service']   = static fn (): Category\Find  =>new Category\Find();
  $container['Category_create_service'] = static fn (): Category\Create=>new Category\Create();
  $container['Category_update_service'] = static fn (): Category\Update=>new Category\Update();
  $container['Category_delete_service'] = static fn (): Category\Delete=>new Category\Delete();
  // CategoryDescription
  $container['CategoryDescription_find_service']   = static fn (): CategoryDescription\Find  =>new CategoryDescription\Find();
  $container['CategoryDescription_create_service'] = static fn (): CategoryDescription\Create=>new CategoryDescription\Create();
  $container['CategoryDescription_update_service'] = static fn (): CategoryDescription\Update=>new CategoryDescription\Update();
  $container['CategoryDescription_delete_service'] = static fn (): CategoryDescription\Delete=>new CategoryDescription\Delete();
  // Country
  $container['Country_find_service']   = static fn (): Country\Find  =>new Country\Find();
  $container['Country_create_service'] = static fn (): Country\Create=>new Country\Create();
  $container['Country_update_service'] = static fn (): Country\Update=>new Country\Update();
  $container['Country_delete_service'] = static fn (): Country\Delete=>new Country\Delete();
  // Geo_zone
  $container['Geo_zone_find_service']   = static fn (): Geo_zone\Find  =>new Geo_zone\Find();
  $container['Geo_zone_create_service'] = static fn (): Geo_zone\Create=>new Geo_zone\Create();
  $container['Geo_zone_update_service'] = static fn (): Geo_zone\Update=>new Geo_zone\Update();
  $container['Geo_zone_delete_service'] = static fn (): Geo_zone\Delete=>new Geo_zone\Delete();
  //Language
  $container['Language_find_service']   = static fn (): Language\Find  =>new Language\Find();
  $container['Language_create_service'] = static fn (): Language\Create=>new Language\Create();
  $container['Language_update_service'] = static fn (): Language\Update=>new Language\Update();
  $container['Language_delete_service'] = static fn (): Language\Delete=>new Language\Delete();
  // Location
  $container['Location_find_service']   = static fn (): Location\Find  =>new Location\Find();
  $container['Location_create_service'] = static fn (): Location\Create=>new Location\Create();
  $container['Location_update_service'] = static fn (): Location\Update=>new Location\Update();
  $container['Location_delete_service'] = static fn (): Location\Delete=>new Location\Delete();
  // Manufacturer
  $container['Manufacturer_find_service']   = static fn (): Manufacturer\Find  =>new Manufacturer\Find();
  $container['Manufacturer_create_service'] = static fn (): Manufacturer\Create=>new Manufacturer\Create();
  $container['Manufacturer_update_service'] = static fn (): Manufacturer\Update=>new Manufacturer\Update();
  $container['Manufacturer_delete_service'] = static fn (): Manufacturer\Delete=>new Manufacturer\Delete();
  // Zone
  $container['Zone_find_service']   = static fn (): Zone\Find  =>new Zone\Find();
  $container['Zone_create_service'] = static fn (): Zone\Create=>new Zone\Create();
  $container['Zone_update_service'] = static fn (): Zone\Update=>new Zone\Update();
  $container['Zone_delete_service'] = static fn (): Zone\Delete=>new Zone\Delete();

  // User
  // $container['user_find_service'] = static fn (): User\Find=>new User\Find();
  $container['user_login_service'] = static fn (): User\Login=>new User\Login();

  $containerBuilder->addDefinitions($container);

};