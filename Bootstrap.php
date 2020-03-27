<?php


require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection([
  'driver'    => getenv('DB_DRIVER'),
  'host'      => getenv('DB_HOST'),
  'database'  => getenv('DB_DATABASE'),
  'username'  => getenv('DB_USERNAME'),
  'password'  => getenv('DB_PASSWORD'),
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


$commands = [
  new App\Command\Spider,
  new App\Command\Generator,
];

$application = new Application();
$application->addCommands($commands);
