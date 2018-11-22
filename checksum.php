#!/usr/bin/php
<?php

if (PHP_SAPI !== 'cli') {
    throw new RuntimeException('This is a script meant to run in a CLI');
}

if ($argc < 3) {
    throw new InvalidArgumentException('Invalid Arguments: Please include file path as the first argument and the checksum as the second argument');
}

if (hash_file('sha256', $argv[1]) === $argv[2]) {
    echo "OK\n";
} else {
    echo "FAIL\n";
}
