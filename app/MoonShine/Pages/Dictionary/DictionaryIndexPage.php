<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Dictionary;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\UI\Components\Heading;

class DictionaryIndexPage extends IndexPage
{
    protected function mainLayer(): array
    {
        return [
            Heading::make('Title'),

            ...parent::mainLayer()
        ];
    }
}
