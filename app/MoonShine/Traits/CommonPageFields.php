<?php

namespace App\MoonShine\Traits;

trait CommonPageFields
{
    abstract public function indexFields();

    public function formFields(): iterable
    {
        return [
            ...$this->indexFields()
        ];
    }

    public function detailFields(): iterable
    {
        return [
            ...$this->indexFields()
        ];
    }
}