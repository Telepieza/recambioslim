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
use App\Service\Tax_class;
use App\Service\Tax_rate;
use App\Service\Tax_rule;

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
  // Tax_class
  $container['Tax_class_find_service']   = static fn (): Tax_class\Find  =>new Tax_class\Find();
  $container['Tax_class_create_service'] = static fn (): Tax_class\Create=>new Tax_class\Create();
  $container['Tax_class_update_service'] = static fn (): Tax_class\Update=>new Tax_class\Update();
  $container['Tax_class_delete_service'] = static fn (): Tax_class\Delete=>new Tax_class\Delete();
  //Tax_rate
  $container['Tax_rate_find_service']   = static fn (): Tax_rate\Find  =>new Tax_rate\Find();
  $container['Tax_rate_create_service'] = static fn (): Tax_rate\Create=>new Tax_rate\Create();
  $container['Tax_rate_update_service'] = static fn (): Tax_rate\Update=>new Tax_rate\Update();
  $container['Tax_rate_delete_service'] = static fn (): Tax_rate\Delete=>new Tax_rate\Delete();
  // Tax_rule
  $container['Tax_rule_find_service']   = static fn (): Tax_rule\Find  =>new Tax_rule\Find();
  $container['Tax_rule_create_service'] = static fn (): Tax_rule\Create=>new Tax_rule\Create();
  $container['Tax_rule_update_service'] = static fn (): Tax_rule\Update=>new Tax_rule\Update();
  $container['Tax_rule_delete_service'] = static fn (): Tax_rule\Delete=>new Tax_rule\Delete();

  // User
  // $container['user_find_service'] = static fn (): User\Find=>new User\Find();
  $container['user_login_service'] = static fn (): User\Login=>new User\Login();

  $containerBuilder->addDefinitions($container);

};