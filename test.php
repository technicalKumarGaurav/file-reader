<?php

require 'vendor/autoload.php';

use Kumar\FileReader\Reader;

$reader = new Reader();

// echo $reader->toHtml(
//     'samples/sample.xls',
//     [
//         'toolbar'   => true,
//         'csv_url'   => '/export/csv',
//         'excel_url' => '/export/excel',
//         'print'     => true
//     ]
// );

echo $reader->toHtml(
    'samples/sample.xls',
    [
        'framework' => 'bootstrap',

        'toolbar' => true,

        'csv_url' => '/export/csv',

        'excel_url' => '/export/excel',

        'show_csv' => true,

        'show_excel' => true,

        'show_print' => true,

        'new_tab' => true
    ]
);


