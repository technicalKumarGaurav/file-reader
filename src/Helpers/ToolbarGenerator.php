<?php

namespace Kumar\FileReader\Helpers;

class ToolbarGenerator
{
    public static function generate(
        array $options = []
    ): string {

        $framework = $options['framework'] ?? '';

        $csvUrl = $options['csv_url'] ?? '';

        $excelUrl = $options['excel_url'] ?? '';

        $print = $options['print'] ?? true;

        $newTab = $options['new_tab'] ?? false;

        $showCsv = $options['show_csv'] ?? true;

        $showExcel = $options['show_excel'] ?? true;

        $showPrint = $options['show_print'] ?? true;

        $target = $newTab
            ? ' target="_blank"'
            : '';

        $html = '';

        if ($framework === 'bootstrap') {

            $html .= '
            <div class="mb-3 file-reader-toolbar">';

            if ($showCsv && !empty($csvUrl)) {

                $html .= '
                <a
                    href="' . htmlspecialchars($csvUrl) . '"
                    class="btn btn-success me-2"
                    ' . $target . '>
                    Export CSV
                </a>';
            }

            if ($showExcel && !empty($excelUrl)) {

                $html .= '
                <a
                    href="' . htmlspecialchars($excelUrl) . '"
                    class="btn btn-primary me-2"
                    ' . $target . '>
                    Export Excel
                </a>';
            }

            if ($print) {

                $html .= '
                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="window.print()">
                    Print
                </button>';
            }

            $html .= '</div>';

            return $html;
        }

        $html .= '<div class="file-reader-toolbar">';

        if ($showCsv && !empty($csvUrl)) {

            $html .= '
            <a
                href="' . htmlspecialchars($csvUrl) . '"
                ' . $target . '>
                Export CSV
            </a> ';
        }

        if ($showExcel && !!empty($excelUrl)) {

            $html .= '
            <a
                href="' . htmlspecialchars($excelUrl) . '"
                ' . $target . '>
                Export Excel
            </a> ';
        }

        if ( $print && $showPrint) {

            $html .= '
            <button
                type="button"
                onclick="window.print()">
                Print
            </button>';
        }

        $html .= '</div>';

        return $html;
    }
}