<?php

namespace Kumar\FileReader\Drivers;

use Kumar\FileReader\Contracts\OcrInterface;

class OcrPdfReader implements OcrInterface
{
    public function extractText(string $file): string
    {
        return 'OCR NOT IMPLEMENTED';
    }
}