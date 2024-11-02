<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\SettingResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use MoonShine\Laravel\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Contracts\Core\ResourceContract;
use MoonShine\Contracts\Core\PageContract;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return array<class-string<ResourceContract>>
     */
    protected function resources(): array
    {
        return [
            MoonShineUserResource::class,
            MoonShineUserRoleResource::class,
            SettingResource::class,
            UserResource::class
        ];
    }

    /**
     * @return array<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ...moonshineConfig()->getPages(),
        ];
    }

    protected function configure(MoonShineConfigurator $config): MoonShineConfigurator
    {
        return $config;
    }
}
