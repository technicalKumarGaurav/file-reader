<?php

namespace Kumar\FileReader\Drivers;

use Smalot\PdfParser\Parser;
use Kumar\FileReader\Helpers\ResponseFormatter;

class PdfReader
{
    public function read(string $file): array
    {
        $parser = new Parser();

        $pdf = $parser->parseFile($file);

        $text = $pdf->getText();

        $text = preg_replace('/\s+/', ' ', $text);

        $text = trim($text);

        $isScanned = strlen($text) < 50;

        return ResponseFormatter::make(
            'pdf',
            basename($file),
            [
                'characters' => strlen($text),
                'is_scanned' => $isScanned
            ],
            [
                'content' => $text
            ]
        );
    }
}
