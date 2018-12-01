<?php

namespace Codayblue\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ChecksumCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:checksum:check')
            ->setDescription('This command takes the file path and checksum hash and checks if they match')
            ->setHelp('First argument is file path. Second argument is checksum hash')
            ->addArgument('filepath', InputArgument::REQUIRED)
            ->addArgument('checksum', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $hash = hash_file('sha256', $input->getArgument('filepath'));

        if ($hash === $input->getArgument('checksum')) {
            $io->success('OK');
            return;
        }

        $io->error('FAIL');
    }
}
