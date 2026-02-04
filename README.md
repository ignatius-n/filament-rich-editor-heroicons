# Filament Rich Editor Heroicons

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oliwol/filament-rich-editor-heroicons.svg?style=flat-square)](https://packagist.org/packages/oliwol/filament-rich-editor-heroicons)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/oliwol/filament-rich-editor-heroicons/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/oliwol/filament-rich-editor-heroicons/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oliwol/filament-rich-editor-heroicons.svg?style=flat-square)](https://packagist.org/packages/oliwol/filament-rich-editor-heroicons)

A Filament v4/v5 plugin that adds a Heroicon picker to the RichEditor (TipTap). Users can search and insert any outline Heroicon as an inline SVG directly into the editor content.

## Installation

```bash
composer require oliwol/filament-rich-editor-heroicons
```

## Usage

Add the plugin to your `RichEditor` component and include `addHeroicon` in the toolbar:

```php
use Filament\Forms\Components\RichEditor;
use Oliwol\FilamentRichEditorHeroicons\FilamentRichEditorHeroicons;

RichEditor::make('content')
    ->toolbarButtons([
        'bold',
        'italic',
        'link',
        'addHeroicon',
        // ... other buttons
    ])
    ->plugins([
        FilamentRichEditorHeroicons::make(),
    ])
```

When rendering stored content (e.g. in a model), register the TipTap PHP extension:

```php
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Oliwol\FilamentRichEditorHeroicons\FilamentRichEditorHeroicons;

RichContentRenderer::make($this->html)
    ->plugins([
        FilamentRichEditorHeroicons::make(),
    ])
```

## How it works

Clicking the toolbar button opens a modal with a searchable dropdown of all outline Heroicons. After selecting an icon, it is rendered as an inline SVG element and inserted into the editor content. The icon name is stored as a `data-icon` attribute, and the rendered SVG is stored as `data-svg` for display.

## Translations

The package ships with English and German translations. You can publish them to customize:

```bash
php artisan vendor:publish --tag="filament-rich-editor-heroicons-translations"
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oliver Wolschke](https://github.com/oliwol)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
