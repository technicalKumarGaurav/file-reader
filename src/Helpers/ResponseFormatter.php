<?php

namespace Kumar\FileReader\Helpers;

class ResponseFormatter
{
    public static function make(
        string $type,
        string $filename,
        array $meta,
        mixed $data
    ): array {
        return [
            'success' => true,
            'type' => $type,
            'filename' => $filename,
            'meta' => $meta,
            'data' => $data
        ];
    }
}