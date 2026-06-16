<?php

namespace Kumar\FileReader\Drivers;

use Kumar\FileReader\Helpers\ResponseFormatter;

class CsvReader
{
    public function read(string $file): array
    {
        $rows = [];

        if (($handle = fopen($file, 'r')) !== false) {

            while (($row = fgetcsv($handle)) !== false) {
                $rows[] = $row;
            }

            fclose($handle);
        }

        return ResponseFormatter::make(
            'csv',
            basename($file),
            [
                'rows' => count($rows),
                'columns' => count($rows[0] ?? [])
            ],
            $rows
        );
    }
}
