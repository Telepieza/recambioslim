<?php

declare(strict_types=1);

use App\Service\Citas;
use App\Service\User;

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
  $container = [];
  $container['citas_find_service']   = static fn (): Citas\Find  =>new Citas\Find();
  $container['citas_create_service'] = static fn (): Citas\Create=>new Citas\Create();
  $container['citas_update_service'] = static fn (): Citas\Update=>new Citas\Update();
  $container['citas_delete_service'] = static fn (): Citas\Delete=>new Citas\Delete();

  // $container['user_find_service'] = static fn (): User\Find=>new User\Find();
  $container['user_login_service'] = static fn (): User\Login=>new User\Login();

  $containerBuilder->addDefinitions($container);

};