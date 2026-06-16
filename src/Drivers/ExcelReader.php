<?php

namespace Kumar\FileReader\Drivers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Kumar\FileReader\Helpers\ResponseFormatter;

class ExcelReader
{
    public function read(string $file): array
    {
        $spreadsheet = IOFactory::load($file);

        $sheet = $spreadsheet->getActiveSheet();

        $highestRow = $sheet->getHighestDataRow();
        $highestColumn = $sheet->getHighestDataColumn();

        $rows = $sheet->rangeToArray(
            "A1:{$highestColumn}{$highestRow}"
        );

        return ResponseFormatter::make(
            'excel',
            basename($file),
            [
                'rows' => count($rows),
                'columns' => count($rows[0] ?? []),
                'sheet' => $sheet->getTitle()
            ],
            $rows
        );
    }
}
