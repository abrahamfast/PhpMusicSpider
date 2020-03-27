<?php

namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Core\Queue as QueueAlias;


class Queue extends Command
{
    protected static $defaultName = 'queue:work ';
    protected function configure()
    {
      $this->setDescription('Queue work.')
           ->setHelp('This command allows you run job...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

      $queue = new QueueAlias;
      $data = $queue->work();

      var_dump($data);


      return 0;
    }
}
