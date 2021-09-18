<?php

// 获取程序部署目录：根目录？子目录？
if (dirname($_SERVER['PHP_SELF']) == DIRECTORY_SEPARATOR){
    $web_path = '/.';
} else {
    $web_path = dirname($_SERVER['PHP_SELF']);
}
define('WEB_PATH', $web_path);

require "login.php";
require "pageview.php";

use App\Bootstrap\AppManager;
use App\Bootstrap\BootManager;
use Dotenv\Dotenv;

require __DIR__ . '/app/vendor/autoload.php';

// Set file access restrictions
ini_set('open_basedir', __DIR__);

// Initialize environment variable handler
Dotenv::createUnsafeImmutable(__DIR__)->safeLoad();

// Initialize the container
$container = BootManager::createContainer(
    __DIR__ . '/app/config',
    __DIR__ . '/app/cache'
);

// Initialize the application
$app = $container->call(AppManager::class);

// Engage!
$app->run();
