<?php

require 'vendor/autoload.php';

use Kumar\FileReader\Reader;

$reader = new Reader();

// echo json_encode(
//     $reader->read('samples/sample.csv'),
//     JSON_PRETTY_PRINT
// );

// echo json_encode(
//     $reader->read('samples/sample.xls'),
//     JSON_PRETTY_PRINT
// );

echo json_encode(
    $reader->read('samples/sample_scane.pdf'),
    JSON_PRETTY_PRINT
);