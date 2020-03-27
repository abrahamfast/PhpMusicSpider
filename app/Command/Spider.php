<?php

namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Core\SpiderProvider;


class Spider extends Command
{
    protected static $defaultName = 'spider:run ';
    protected function configure()
    {
      $this->setDescription('grep new url.')
           ->setHelp('This command allows you grep new url...');

      $this->addArgument('provider', InputArgument::REQUIRED, 'The provider of the spider.');
      $this->addArgument('type', InputArgument::REQUIRED, 'The type of the spider.');
      $this->addArgument('url', InputArgument::REQUIRED, 'The url of the site list.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $type = $input->getArgument('type');
        $providerName = $input->getArgument('provider');

        $provider = new SpiderProvider($url, $type, $providerName);
        $provider->process();

        return 0;
    }
}
