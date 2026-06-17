<?php

namespace Kumar\FileReader\Helpers;

class HtmlGenerator
{
    public static function generate(
        array $preview,
        array $options = []
    ): string {

        $class = $options['class'] ?? '';

        $id = $options['id'] ?? '';

        $framework = $options['framework'] ?? '';

        $responsive = $options['responsive'] ?? false;

        $limit = $options['limit'] ?? null;

        if ($framework === 'bootstrap') {

            $bootstrapClass =
                'table table-bordered table-striped';

            $class = trim(
                $bootstrapClass . ' ' . $class
            );
        }

        if (isset($preview['headers'])) {

            $rows = $preview['rows'];

            if ($limit !== null) {

                $rows = array_slice(
                    $rows,
                    0,
                    (int) $limit
                );
            }

            $tableAttributes = '';

            if (!empty($class)) {

                $tableAttributes .=
                    ' class="' .
                    htmlspecialchars($class) .
                    '"';
            }

            if (!empty($id)) {

                $tableAttributes .=
                    ' id="' .
                    htmlspecialchars($id) .
                    '"';
            }

            $html = '<table' .
                $tableAttributes .
                '>';

            $html .= '<thead><tr>';

            foreach ($preview['headers'] as $header) {

                $html .= '<th>' .
                    htmlspecialchars(
                        (string) $header
                    ) .
                    '</th>';
            }

            $html .= '</tr></thead>';

            $html .= '<tbody>';

            foreach ($rows as $row) {

                $html .= '<tr>';

                foreach ($row as $cell) {

                    $html .= '<td>' .
                        htmlspecialchars(
                            (string) $cell
                        ) .
                        '</td>';
                }

                $html .= '</tr>';
            }

            $html .= '</tbody>';

            $html .= '</table>';

            if ($responsive) {

                $html =
                    '<div class="table-responsive">' .
                    $html .
                    '</div>';
            }

            return $html;
        }

        if (isset($preview['content'])) {

            return sprintf(
                '<div class="file-reader-pdf">%s</div>',
                nl2br(
                    htmlspecialchars(
                        $preview['content']
                    )
                )
            );
        }

        return '';
    }
}
