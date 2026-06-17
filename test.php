<?php

require 'vendor/autoload.php';

use Kumar\FileReader\Reader;

$reader = new Reader();

echo $reader->toHtml(
    'samples/sample.csv',
    [
        'framework' => 'bootstrap',
        'responsive' => true,
        'id' => 'myTable'
    ]
);