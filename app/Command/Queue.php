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
      $this->addArgument('limit', InputArgument::OPTIONAL, 'The limit task.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $type = $input->getArgument('type');
      $limit = $input->getArgument('limit') ?? null;

      if($limit){
        for ($i=0; $i < $limit; $i++) {
          $this->runTask($type);
        }
      } else {
        $this->runTask($type);
      }

      return 0;
    }

    public function runTask($type)
    {
      $queue = new QueueAlias;
      $data = $queue->work($type);

      if($data){
        $task = new Task;
        $run = $task->run($type, $data);
        if(isset($run->id)){
          $queue->done();
          return 0;
        }
        // $queue->faild();
      }

    }
}
