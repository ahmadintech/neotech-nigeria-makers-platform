<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('user')
            ->path('user')
            ->login()
            ->registration()
            ->passwordReset()
            ->colors([
                'primary' => [
                    50  => '#e6f4ec',
                    100 => '#cce9d9',
                    200 => '#99d3b3',
                    300 => '#66bd8d',
                    400 => '#33a867',
                    500 => '#008751', // Nigeria Green
                    600 => '#006b41',
                    700 => '#005031',
                    800 => '#003521',
                    900 => '#001a10',
                ],

                'success' => [
                    500 => '#008751',
                ],

                'warning' => [
                    500 => '#ffb300',
                ],

                'info' => [
                    500 => '#1565c0',
                ],
                'accent' => [
                    500 => '#fbc02d',
                ],
                'gray' => Color::Slate,

                'danger' => Color::Red,
            ])

            // ->font('Poppins');
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('2rem')
            ->brandName('Federal Government of Nigeria')
            ->discoverResources(in: app_path('Filament/User/Resources'), for: 'App\Filament\User\Resources')
            ->discoverPages(in: app_path('Filament/User/Pages'), for: 'App\Filament\User\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/User/Widgets'), for: 'App\Filament\User\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
