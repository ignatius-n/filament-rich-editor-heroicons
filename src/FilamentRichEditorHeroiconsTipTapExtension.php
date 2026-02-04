<?php

declare(strict_types=1);

namespace Oliwol\FilamentRichEditorHeroicons;

use Filament\Support\Enums\IconSize;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Blade;
use Tiptap\Core\Node;

final class FilamentRichEditorHeroiconsTipTapExtension extends Node
{
    public static $name = 'heroicon';

    public function addAttributes(): array
    {
        return [
            'icon' => ['default' => null],
        ];
    }

    public function renderHTML($node): array
    {
        $icon = Heroicon::tryFrom('o-'.($node->attrs->icon ?? ''));

        if (! $icon) {
            return ['span', ['class' => 'inline-block'], ''];
        }

        $svg = Blade::render('<x-filament::icon icon="'.$icon->getIconForSize(IconSize::Medium).'" class="inline-block size-6 align-middle" />');

        return ['content' => htmlspecialchars($svg)];
    }
}
