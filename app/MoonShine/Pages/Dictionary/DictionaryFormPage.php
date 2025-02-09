<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Dictionary;

use App\MoonShine\Resources\MoonShineUserResource;
use MoonShine\ChangeLog\Components\ChangeLog;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\UI\Components\Heading;


class DictionaryFormPage extends FormPage
{
    public function topLayer(): array
    {
        return [
            Heading::make('Custom top'),

            ...parent::topLayer()
        ];
    }

    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer(),
            ChangeLog::make(
                'Changelog',
                $this->getResource(),
                userResource: MoonShineUserResource::class
            )
        ];
    }
}
