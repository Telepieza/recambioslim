<?php

declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => filter_var($_ENV['DISPLAY_ERROR_DETAILS'],FILTER_VALIDATE_BOOLEAN),
                    'logError'        => filter_var($_ENV['LOG_ERROR'],FILTER_VALIDATE_BOOLEAN),
                    'logErrorDetails' => filter_var($_ENV['LOG_ERROR_DETAILS'],FILTER_VALIDATE_BOOLEAN),
                    'logger' => [
                        'name'  => $_ENV['LOG_NAME'],
                        'path'  => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../../'.$_ENV['LOG_FILE'],
                        'level' => Logger::DEBUG,
                    ],
                    'app' => [
                        'name'    => $_ENV['APP_NAME'],
                        'env'     => $_ENV['ENV'],
                        'locale'  => $_ENV['LOCALE'],
                        'perpage' => filter_var($_ENV['PER_PAGE'],FILTER_VALIDATE_INT),
                        'debug'   => filter_var($_ENV['DEBUG'],FILTER_VALIDATE_BOOLEAN),
                        'domain'  => $_ENV['APP_DOMAIN'] ?? '',
                        'secret'  => $_ENV['SECRET_KEY'],
                    ],
                    'dbConfig' => [
                        'conn' => $_ENV['DB_CONN'],
                        'host' => $_ENV['DB_HOST'],
                        'name' => $_ENV['DB_NAME'],
                        'user' => $_ENV['DB_USER'],
                        'pass' => $_ENV['DB_PASS'],
                        'port' => $_ENV['DB_PORT'],
                        'char' => $_ENV['DB_CHAR'],
                    ],
                    'email' => [
                        'type'      =>  $_ENV['EMAIL_TYPE'],
                        'host'      =>  $_ENV['EMAIL_HOST'],
                        'port'      =>  $_ENV['EMAIL_PORT'],
                        'secure'    =>  $_ENV['EMAIL_SECURE'],
                        'from'      =>  $_ENV['EMAIL_FROM'],
                        'from_name' =>  $_ENV['EMAIL_FROM_NAME'],
                        'to'        =>  $_ENV['EMAIL_TO']
                    ],
            ]);
        }
    ]);
};
