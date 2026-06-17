<?php

namespace Kumar\FileReader;

use Kumar\FileReader\Drivers\CsvReader;
use Kumar\FileReader\Drivers\ExcelReader;
use Kumar\FileReader\Drivers\PdfReader;
use Kumar\FileReader\Exceptions\UnsupportedFileException;
use Kumar\FileReader\Helpers\PreviewGenerator;
use Kumar\FileReader\Helpers\HtmlGenerator;

class Reader
{
    public function read(string $file): array
    {
        if (!file_exists($file)) {
            throw new \InvalidArgumentException(
                "File not found: {$file}"
            );
        }

        $extension = strtolower(
            pathinfo($file, PATHINFO_EXTENSION)
        );

        return match ($extension) {

            'csv' => (new CsvReader())->read($file),

            'xlsx', 'xls' => (new ExcelReader())->read($file),

            'pdf' => (new PdfReader())->read($file),

            default => throw new UnsupportedFileException(
                "Unsupported file type: {$extension}"
            )
        };
    }

    public function preview(string $file): array
    {
        $result = $this->read($file);

        return PreviewGenerator::generate($result);
    }

    public function toHtml(
        string $file,
        array $options = []
    ): string {

        $preview = $this->preview($file);

        return HtmlGenerator::generate(
            $preview,
            $options
        );
    }
}
