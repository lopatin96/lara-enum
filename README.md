# lara-enum

## Installation

You can install this package via composer:

```bash
composer require lopatin96/lara-enum
```

# How to use
Publish config and local files:

```php
php artisan vendor:publish --tag="lara-enum-config"
```

```php
php artisan vendor:publish --tag="lara-enum-lang"
```

### Config
Add key-value to lara-enum config file:
```php
return [

    'document-status' => [
        'color' => [
            'pending' => 'amber',
            'in_progress' => 'blue',
            'in_progress_pending' => 'blue',
            'finished' => 'green',
            'error' => 'red',
        ],
    ],

];
```

and call `$document->status->getColorProperty()`.

### Local
Add key-value to lara-enum local file:
```php
return [

    'document-status' => [
        'label' => [
            'pending' => 'Pending',
            'in_progress' => 'In progress',
            'in_progress_pending' => 'In progress',
            'finished' => 'Finished',
            'error' => 'Error',
        ],
    ],

];
```

and call `$document->status->getLabelLocal()`.
