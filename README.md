# Kumar File Reader

A lightweight PHP library for reading and extracting data from PDF, Excel, and CSV files through a single unified API.

## Features

- Read CSV files
- Read Excel files (`.xls`, `.xlsx`)
- Read PDF files
- Export data to CSV
- Export data to Excel
- Unified response format
- Preview extracted data
- Generate HTML tables
- Bootstrap table support
- Responsive table support
- Framework independent
- PSR-4 autoloading
- Compatible with Core PHP, Laravel, and CodeIgniter

---

## Requirements

- PHP 8.1+
- Composer

---

## Installation

```bash
composer require technicalkumargaurav/file-reader
```

---

## Basic Usage

```php
require 'vendor/autoload.php';

use Kumar\FileReader\Reader;

$reader = new Reader();

$result = $reader->read('sample.xlsx');

print_r($result);
```

---

## CSV Example

```php
$result = $reader->read('sample.csv');
```

Response:

```php
[
    'success' => true,
    'type' => 'csv',
    'filename' => 'sample.csv',
    'meta' => [
        'rows' => 3,
        'columns' => 3
    ],
    'data' => [...]
]
```

---

## Excel Example

```php
$result = $reader->read('sample.xlsx');
```

Response:

```php
[
    'success' => true,
    'type' => 'excel',
    'filename' => 'sample.xlsx',
    'meta' => [
        'rows' => 100,
        'columns' => 8,
        'sheet' => 'Sheet1'
    ],
    'data' => [...]
]
```

---

## PDF Example

```php
$result = $reader->read('sample.pdf');
```

Response:

```php
[
    'success' => true,
    'type' => 'pdf',
    'filename' => 'sample.pdf',
    'meta' => [
        'characters' => 6225
    ],
    'data' => [
        'content' => 'PDF content...'
    ]
]
```

---

## Export CSV

```php
$result = $reader->read('sample.xlsx');

$reader->exportCsv(
    $result,
    'exports/output.csv'
);
```

---

## Export Excel

```php
$result = $reader->read('sample.csv');

$reader->exportExcel(
    $result,
    'exports/output.xlsx'
);
```

---

## Skip First Column

```php
$reader->exportCsv(
    $result,
    'exports/output.csv',
    [
        'skip_first_column' => true
    ]
);
```

---

## Preview Data

Generate a UI-friendly structure with headers and rows.

```php
$preview = $reader->preview('sample.xlsx');

print_r($preview);
```

Response:

```php
[
    'headers' => [
        'ID',
        'Name',
        'Email'
    ],
    'rows' => [
        [1, 'John', 'john@example.com'],
        [2, 'Jane', 'jane@example.com']
    ]
]
```

---

## HTML Table Rendering

Generate an HTML table directly from a CSV or Excel file.

```php
echo $reader->toHtml('sample.xlsx');
```

---

## Bootstrap Table

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'framework' => 'bootstrap'
    ]
);
```

---

## Responsive Table

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'framework' => 'bootstrap',
        'responsive' => true
    ]
);
```

---

## Custom Table ID

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'id' => 'employeeTable'
    ]
);
```

Useful for DataTables integration:

```javascript
$("#employeeTable").DataTable();
```

---

## Limit Rows

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'limit' => 10
    ]
);
```

---

## Error Handling

```php
try {

    $result = $reader->read('sample.xlsx');

    print_r($result);

} catch (\Exception $e) {

    echo $e->getMessage();
}
```

---

## Supported File Types

| Extension | Supported |
| --------- | --------- |
| csv       | Yes       |
| xls       | Yes       |
| xlsx      | Yes       |
| pdf       | Yes       |

---

## Project Structure

```text
src/
├── Drivers/
│   ├── CsvReader.php
│   ├── ExcelReader.php
│   └── PdfReader.php
│
├── Exporters/
│   ├── CsvExporter.php
│   └── ExcelExporter.php
│
├── Exceptions/
│   └── UnsupportedFileException.php
│
├── Helpers/
│   ├── ResponseFormatter.php
│   ├── PreviewGenerator.php
│   └── HtmlGenerator.php
│
└── Reader.php
```

---

## Roadmap

### v1.0.0

- CSV Reader
- Excel Reader
- PDF Reader
- Unified Response Format

### v1.1.0

- Improved PDF Metadata
- File Existence Validation
- Better Error Handling

### v1.2.0

- Preview Data Support
- HTML Table Rendering
- Bootstrap Integration
- Responsive Tables
- Row Limiting

### v1.3.0

- CSV Export Support
- Excel Export Support
- Skip First Column Option
- Export Validation

### Future

- OCR Support for Scanned PDFs
- DOCX Reader
- Export Toolbar
- Print Support
- DataTables Integration

---

## License

MIT License

---

## Author

**Kumar Gaurav**

GitHub: https://github.com/technicalKumarGaurav
