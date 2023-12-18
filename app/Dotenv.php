<?php
/**
  * Dotenv.php
  * Description: Read file .env and control variables
  * @Author : M.V.M.
  * @Version 1.0.16
**/
declare(strict_types=1);

/* Variables $_SERVER */
$baseDir = __DIR__ . '/../';
$dotenv = Dotenv\Dotenv::createImmutable($baseDir);
$envFile = $baseDir . '.env';
if (file_exists($envFile)) {
    $dotenv->load();
}
$dotenv->required(['DB_CONN','DB_HOST','DB_NAME','DB_USER','DB_PASS','DB_PORT','DB_CHAR']);