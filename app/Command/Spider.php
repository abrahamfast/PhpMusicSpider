<?php

namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class Spider extends Command
{
    protected static $defaultName = 'spider:get ';
    protected function configure()
    {
      $this->setDescription('grep new url.')
           ->setHelp('This command allows you grep new url...');
      $this->addArgument('url', InputArgument::REQUIRED, 'The url of the site list.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $url = $input->getArgument('url');

        return 0;
    }
}
