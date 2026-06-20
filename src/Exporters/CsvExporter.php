<?php

namespace Kumar\FileReader\Exporters;

class CsvExporter
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
                'CSV export supports only CSV and Excel data.'
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

        $handle = fopen(
            $outputFile,
            'w'
        );

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

            fputcsv(
                $handle,
                $row
            );
        }

        fclose($handle);

        return true;
    }
}
