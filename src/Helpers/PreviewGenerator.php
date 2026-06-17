<?php

namespace Kumar\FileReader\Helpers;

class PreviewGenerator
{
    public static function generate(array $result): array
    {
        $type = $result['type'];

        if (in_array($type, ['csv', 'excel'])) {

            $rows = $result['data'];

            if (empty($rows)) {
                return [
                    'headers' => [],
                    'rows'    => []
                ];
            }

            return [
                'headers' => $rows[0],
                'rows'    => array_slice($rows, 1)
            ];
        }

        if ($type === 'pdf') {

            return [
                'content'    => $result['data']['content'],
                'characters' => $result['meta']['characters']
            ];
        }

        return [];
    }
}