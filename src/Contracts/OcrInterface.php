<?php

namespace Kumar\FileReader\Contracts;

interface OcrInterface
{
    public function extractText(string $file): string;
}