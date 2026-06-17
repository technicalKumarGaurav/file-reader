# Kumar File Reader

A lightweight PHP library for reading PDF, Excel, and CSV files through a single unified API.

## Features

* Read CSV files
* Read Excel files (`.xls`, `.xlsx`)
* Read PDF files
* Unified response format
* File metadata support
* Framework independent
* PSR-4 autoloading
* Compatible with any Composer-based PHP application, including Laravel and CodeIgniter

---

## Requirements

* PHP 8.1+
* Composer

---

## Installation

```bash
composer require technicalkumargaurav/file-reader
```

---

## Usage

```php
require 'vendor/autoload.php';

use Kumar\FileReader\Reader;

$reader = new Reader();

$result = $reader->read('sample.csv');

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
    'data' => [
        ['id', 'name', 'email'],
        ['1', 'Gaurav', 'test@test.com'],
        ['2', 'Ram', 'ram@test.com']
    ]
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

## Error Handling

```php
try {
    $result = $reader->read('sample.pdf');

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
├── Exceptions/
│   └── UnsupportedFileException.php
│
├── Helpers/
│   └── ResponseFormatter.php
│
└── Reader.php
```

---

## Roadmap

### v1.0.0

* CSV Reader
* Excel Reader
* PDF Reader
* Unified Response Format

### v1.1.0

* Improved PDF Metadata
* File Existence Validation
* Better Error Handling

### Future

* OCR Support for Scanned PDFs
* DOCX Reader
* JSON Export
* Streaming Support

---

## License

MIT License

---

## Author

**Kumar Gaurav**

GitHub: https://github.com/technicalKumarGaurav
