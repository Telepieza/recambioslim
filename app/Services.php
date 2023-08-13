<?php
/** 
  * Services.php
  * Description: Container Services by templates and table
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

use App\Service\Category;
use App\Service\Language;
use App\Service\Manufacturer;

use App\Service\User;

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
  $container = [];

  // Category
  $container['Category_find_service']   = static fn (): Category\Find  =>new Category\Find();
  $container['Category_create_service'] = static fn (): Category\Create=>new Category\Create();
  $container['Category_update_service'] = static fn (): Category\Update=>new Category\Update();
  $container['Category_delete_service'] = static fn (): Category\Delete=>new Category\Delete();
  //Language
  $container['Language_find_service']   = static fn (): Language\Find  =>new Language\Find();
  $container['Language_create_service'] = static fn (): Language\Create=>new Language\Create();
  $container['Language_update_service'] = static fn (): Language\Update=>new Language\Update();
  $container['Language_delete_service'] = static fn (): Language\Delete=>new Language\Delete();
  // Manufacturer
  $container['Manufacturer_find_service']   = static fn (): Manufacturer\Find  =>new Manufacturer\Find();
  $container['Manufacturer_create_service'] = static fn (): Manufacturer\Create=>new Manufacturer\Create();
  $container['Manufacturer_update_service'] = static fn (): Manufacturer\Update=>new Manufacturer\Update();
  $container['Manufacturer_delete_service'] = static fn (): Manufacturer\Delete=>new Manufacturer\Delete();

  // User
  // $container['user_find_service'] = static fn (): User\Find=>new User\Find();
  $container['user_login_service'] = static fn (): User\Login=>new User\Login();

  $containerBuilder->addDefinitions($container);

};