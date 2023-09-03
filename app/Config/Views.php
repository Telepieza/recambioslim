<?php
/** 
  * Views.php
  * Description: Twing configuration container
  * @Author : M.V.M.
  * @Version 1.0.0
**/
declare(strict_types=1);

use DI\ContainerBuilder;
use App\Application\Settings\SettingsInterface;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Twig\Extension\DebugExtension;

return function (ContainerBuilder $containerBuilder) 
{
    $containerBuilder->addDefinitions([
        Twig::class => function (ContainerInterface $c)
        {
          $settings = $c->get(SettingsInterface::class);
          $view     = $settings->get('view');
          $path     = $view['path_templates'];
          $options  = $view['twig'];
          $twig     = Twig::create($path, $options);
          $twig->addExtension(new DebugExtension());
          return $twig;
        }
    ]);
};
