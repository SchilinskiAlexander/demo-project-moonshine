<?php

namespace App\MoonShine\Resources;

use App\Models\Setting;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Traits\CommonPageFields;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Phone;
use MoonShine\UI\Fields\Text;

class SettingResource extends ModelResource
{
    protected string $model = Setting::class;

    protected string $title = 'Setting';

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Email::make('Email'),
            Phone::make('Phone'),
            Text::make('Copyright')
        ];
    }

    public function formFields(): array
    {
        return [
            ...$this->indexFields()
        ];
    }

    public function detailFields(): array
    {
        return [
            ...$this->indexFields()
        ];
    }

    protected function pages(): array
    {
        return [
            SettingPage::class
        ];
    }

    public function getItemID(): int|string|null
    {
        return 1;
    }

    public function rules(mixed $item): array
    {
        return [];
    }

    public function search(): array
    {
        return [];
    }
}
