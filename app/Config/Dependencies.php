<?php
/** 
  * Dependencies.php
  * Description: Container PDO
  * @Author : M.V.M.
  * @Version 1.0.0
**/
declare(strict_types=1);

use Psr\Container\ContainerInterface;
use App\Application\Settings\SettingsInterface;

$container->set('db',function(ContainerInterface $ci){
    $settings = $ci->get(SettingsInterface::class);
    $database = $settings->get("dbConfig");
    $dsn = sprintf(
      'mysql:host=%s;dbname=%s;port=%s;charset=%s',
      $database['host'],
      $database['name'],
      $database['port'],
      $database['char'],
    );

    $pdo = new PDO($dsn, $database['user'], $database['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $pdo;
   
});
