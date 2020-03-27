<?php

namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Core\Generator as Make;


class Generator extends Command
{
    protected static $defaultName = 'spider:make ';
    protected function configure()
    {
      $this->setDescription('make new spider.')
           ->setHelp('This command allows you create new skeleton...');

      $this->addArgument('provider', InputArgument::REQUIRED, 'The provider of the spider.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $providerName = $input->getArgument('provider');

        $generator = new Make($providerName);
        $generator->writeTmp();

        return 0;
    }
}
