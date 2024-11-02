<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\SettingResource;
use MoonShine\Laravel\Layouts\CompactLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Block,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use MoonShine\Laravel\Resources\MoonShineUserResource;
use MoonShine\Laravel\Resources\MoonShineUserRoleResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;

final class MoonShineLayout extends CompactLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

/*
             MenuGroup::make('System', [
                MenuItem::make('Settings', new SettingResource(), 'heroicons.outline.adjustments-vertical'),
                MenuItem::make('Admins', new MoonShineUserResource(), 'heroicons.outline.users'),
                MenuItem::make('Roles', new MoonShineUserRoleResource(), 'heroicons.outline.shield-exclamation'),
            ], 'heroicons.outline.user-group')->canSee(static function () {
                return auth('moonshine')->user()->moonshine_user_role_id === 1;
            }),

            MenuGroup::make('Blog', [
                MenuItem::make('Categories', new CategoryResource(), 'heroicons.outline.document'),
                MenuItem::make('Articles', new ArticleResource(), 'heroicons.outline.newspaper'),
                MenuItem::make('Comments', new CommentResource(), 'heroicons.outline.chat-bubble-left')
                    ->badge(fn () => (string) Comment::query()->count()),
            ], 'heroicons.outline.newspaper'),

            MenuItem::make('Users', new UserResource(), 'heroicons.outline.users'),

            MenuItem::make('Dictionary', new DictionaryResource(), 'heroicons.outline.document-duplicate'),

            MenuItem::make(
                'Documentation',
                'https://moonshine-laravel.com/docs/resource/appearance/appearance-index#minimalistic',
                'heroicons.outline.document-duplicate',
                true
            )->badge(static fn () => 'New design'),
        ];
 */

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn () => __('moonshine::ui.resource.system'), [
                MenuItem::make('Settings', SettingResource::class)->icon('adjustments-vertical'),
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.admins_title'),
                    MoonShineUserResource::class
                ),
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.role_title'),
                    MoonShineUserRoleResource::class
                ),
            ]),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
