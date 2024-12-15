<?php

namespace App\MoonShine\Resources;

use App\Models\Category;
use App\MoonShine\Pages\Category\CategoryIndexPage;
use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;

class CategoryResource extends TreeResource
{
    protected string $model = Category::class;

    protected string $title = 'Category';

    protected string $column = 'title';

    protected bool $withPolicy = true;

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected array $with = ['category'];

    protected string $sortColumn = 'sorting';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    protected function pages(): array
    {
        return [
            CategoryIndexPage::class,
            FormPage::class,
            DetailPage::class,
        ];
    }

    public function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Category')
                ->nullable(),
            Text::make('Title')->required(),
        ];
    }

    public function formFields(): iterable
	{
		return [
            Box::make([
                ...$this->indexFields()
            ])
        ];
	}

    public function detailFields(): iterable
    {
        return [
            ...$this->indexFields()
        ];
    }

	public function rules(mixed $item): array
	{
	    return [
            'title' => ['required', 'string', 'min:5'],
        ];
    }

    public function search(): array
    {
        return ['id', 'title'];
    }

    public function treeKey(): ?string
    {
        return 'category_id';
    }

    public function sortKey(): string
    {
        return $this->getSortColumn();
    }
}
