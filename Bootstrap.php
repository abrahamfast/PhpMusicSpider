<?php


require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$commands = [
  new App\Command\Spider,
  new App\Command\Generator,
];

$application->addCommands($commands);
