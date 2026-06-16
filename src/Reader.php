<?php

namespace Kumar\FileReader;

use Kumar\FileReader\Drivers\CsvReader;
use Kumar\FileReader\Drivers\ExcelReader;
use Kumar\FileReader\Drivers\PdfReader;
use Kumar\FileReader\Exceptions\UnsupportedFileException;

class Reader
{
    public function read(string $file)
    {
        $extension = strtolower(
            pathinfo($file, PATHINFO_EXTENSION)
        );

        return match ($extension) {

            'csv' => (new CsvReader())->read($file),

            'xlsx', 'xls' => (new ExcelReader())->read($file),

            'pdf' => (new PdfReader())->read($file),

            default =>
            throw new UnsupportedFileException(
                "Unsupported file type: {$extension}"
            )
        };
    }
}
