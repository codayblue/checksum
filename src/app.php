#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \Symfony\Component\Console\Application();

$command = new \Codayblue\Command\ChecksumCommand();

$application->add($command);

$application->setDefaultCommand($command->getName(), true);

$application->run();
