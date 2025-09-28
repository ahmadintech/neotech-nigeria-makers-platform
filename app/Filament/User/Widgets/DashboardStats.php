<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Profile Views', '1,204')
                ->description('15% this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
                
            Stat::make('Innovation Views', '8,345')
                ->description('22% this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Connection Requests', '42')
                ->description('5 pending')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning'),
                
            Stat::make('Application Statuses', '3')
                ->description('1 under review')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
        ];
    }
}