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

        return ResponseFormatter::make(
            'pdf',
            basename($file),
            [
                'characters' => strlen($text)
            ],
            [
                'content' => trim($text)
            ]
        );
    }
}