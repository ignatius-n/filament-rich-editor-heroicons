<?php

declare(strict_types=1);

namespace Oliwol\FilamentRichEditorHeroicons;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class FilamentRichEditorHeroiconsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-rich-editor-heroicons';

    public function configurePackage(Package $package): void
    {
        $package->name(self::$name);
        $package->shortName();

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }
    }

    public function packageBooted(): void
    {
        FilamentAsset::register(
            [
                Js::make('filament-rich-editor-heroicons-scripts', __DIR__.'/../resources/dist/filament-rich-editor-heroicons.js'),
            ],
            'oliwol/filament-rich-editor-heroicons'
        );
    }
}