<?php

require 'vendor/autoload.php';

use Kumar\FileReader\Reader;

$reader = new Reader();

$result = $reader->read(
    'samples/sample.csv'
);

$status = $reader->exportExcel(
    $result,
    'exports/output.xlsx',
    [
        'skip_first_column' => true
    ]
);

var_dump($status);
