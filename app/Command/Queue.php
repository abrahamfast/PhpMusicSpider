<?php

namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Core\Queue as QueueAlias;
use App\Tasks\Task;


class Queue extends Command
{
    protected static $defaultName = 'queue:work ';
    protected function configure()
    {
      $this->setDescription('Queue work.')
           ->setHelp('This command allows you run job...');
      $this->addArgument('type', InputArgument::REQUIRED, 'The url of the site list.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $type = $input->getArgument('type');

      $queue = new QueueAlias;
      $data = $queue->work($type);

      $task = new Task;

      $run = $task->run($type, $data);

      // if($run){
      //   $queue->done();
      //
      //   return 0;
      // }
      //
      // $queue->faild();


      return 0;
    }
}
