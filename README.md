## Features

* Read CSV files
* Read Excel files (`.xls`, `.xlsx`)
* Read PDF files
* Export data to CSV
* Export data to Excel
* Unified response format
* Preview extracted data
* Generate HTML tables
* Toolbar support
* Export links support
* Print support
* Bootstrap table support
* Responsive table support
* Framework independent
* PSR-4 autoloading
* Compatible with Core PHP, Laravel, and CodeIgniter

---

## Toolbar Support

Generate a toolbar above the table.

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'toolbar' => true
    ]
);
```

---

## Export Links

Provide your own application routes for downloads.

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'toolbar'   => true,
        'csv_url'   => '/export/csv',
        'excel_url' => '/export/excel'
    ]
);
```

This keeps the package framework independent and allows integration with:

* Core PHP
* Laravel
* CodeIgniter

---

## Print Button

Enable a print button in the toolbar.

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'toolbar' => true,
        'print'   => true
    ]
);
```

---

## Open Export Links In New Tab

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'toolbar'   => true,
        'csv_url'   => '/export/csv',
        'excel_url' => '/export/excel',
        'new_tab'   => true
    ]
);
```

---

## Show / Hide Toolbar Buttons

Show only the buttons you need.

```php
echo $reader->toHtml(
    'sample.xlsx',
    [
        'toolbar'    => true,
        'csv_url'    => '/export/csv',
        'excel_url'  => '/export/excel',

        'show_csv'   => true,
        'show_excel' => false,
        'show_print' => true
    ]
);
```

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
│   ├── HtmlGenerator.php
│   └── ToolbarGenerator.php
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

### v1.2.0

* Preview Data Support
* HTML Table Rendering
* Bootstrap Integration
* Responsive Tables
* Row Limiting

### v1.3.0

* CSV Export Support
* Excel Export Support
* Skip First Column Option
* Export Validation

### v1.4.0

* Toolbar Support
* CSV Download Links
* Excel Download Links
* Print Button
* New Tab Support
* Show / Hide Toolbar Buttons

### Future

* OCR Support for Scanned PDFs
* DOCX Reader
* Client-side Export
* DataTables Integration
* Advanced PDF Preview

```
```
