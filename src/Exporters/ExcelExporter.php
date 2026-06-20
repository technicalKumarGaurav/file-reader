<?php

namespace Kumar\FileReader\Exporters;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExporter
{
    public static function export(
        array $result,
        string $outputFile,
        array $options = []
    ): bool {
        if (
            !isset($result['type']) ||
            !in_array(
                $result['type'],
                ['csv', 'excel']
            )
        ) {
            throw new \InvalidArgumentException(
                'Excel export supports only CSV and Excel data.'
            );
        }

        if (
            !isset($result['data']) ||
            !is_array($result['data'])
        ) {
            throw new \InvalidArgumentException(
                'Invalid data supplied.'
            );
        }

        $directory = dirname(
            $outputFile
        );

        if (!is_dir($directory)) {

            throw new \InvalidArgumentException(
                'Output directory does not exist.'
            );
        }

        $skipFirstColumn =
            $options['skip_first_column']
            ?? false;

        $spreadsheet =
            new Spreadsheet();

        $sheet =
            $spreadsheet->getActiveSheet();

        $rowNumber = 1;

        foreach (
            $result['data']
            as $row
        ) {

            if (!is_array($row)) {
                continue;
            }

            if ($skipFirstColumn) {

                $row = array_slice(
                    $row,
                    1
                );
            }

            $column = 'A';

            foreach (
                $row
                as $value
            ) {

                $sheet->setCellValue(
                    $column . $rowNumber,
                    $value
                );

                $column++;
            }

            $rowNumber++;
        }

        $writer =
            new Xlsx(
                $spreadsheet
            );

        $writer->save(
            $outputFile
        );

        return true;
    }
}
