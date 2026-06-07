<?php

use App\Models\setting;
use Illuminate\Support\Facades\DB;

function getOtherLang(): string
{
    return app()->getLocale() == 'ar' ? 'en' : 'ar';
}

function ADMIN_URL()
{
    return url(app()->getLocale()).'/admin';
}

function EDITOR_URL()
{
    return url(app()->getLocale()).'/editor';
}

function FILE_PATH()
{
    return 'img/';
}

function ADMIN_DATES($record): string
{
    return \Carbon\Carbon::parse($record)->translatedFormat('Y-m-d g:i A');
}

function GET_SVG_ICONS()
{
    return DB::table('svg')->select('name', 'svg_content')->get();
}

function ADMIN_MENU(): array
{
    $icons = GET_SVG_ICONS();

    $menu = [
        ['name' => 'Dashboard', 'icon' => 'dashboard.svg'],
        ['name' => 'Account', 'icon' => 'account.svg', 'children' => ['Overview', 'Settings']],
        ['name' => 'User management', 'icon' => 'User management.svg', 'children' => ['Merchants', 'Users']],
        ['name' => 'update_to_merchant', 'icon' => 'Payment_Methods.svg'],
        ['name' => 'Intros', 'icon' => 'Intros.svg'],
        ['name' => 'Categories', 'icon' => 'Categories.svg'],
        ['name' => 'FeaturedWorks', 'icon' => 'FeaturedWorks.svg'],
        ['name' => 'Stores', 'icon' => 'Stores.svg'],
        ['name' => 'Subscription', 'icon' => 'Subscription.svg'],
        ['name' => 'Contact', 'icon' => 'Contact.svg'],
        ['name' => 'Ads', 'icon' => 'Ads.svg'],
        ['name' => 'Statistics', 'icon' => 'Statistics.svg'],
        ['name' => 'Features', 'icon' => 'Features.svg'],
        ['name' => 'Notification', 'icon' => 'Notification.svg'],
        ['name' => 'Payment_Methods', 'icon' => 'Payment_Methods.svg'],
    ];

    return $menu;
}

function MERCHANT_MENU(): array
{
    $icons = GET_SVG_ICONS();

    $menu = [
        ['name' => 'Dashboard', 'icon' => 'dashboard.svg'],
        ['name' => 'Account', 'icon' => 'account.svg', 'children' => ['Overview', 'Settings']],
        ['name' => 'Products', 'icon' => 'Products.svg'],
        ['name' => 'Sizes', 'icon' => 'Sizes.svg'],
        ['name' => 'Colors', 'icon' => 'Colors.svg'],
        ['name' => 'Engravings', 'icon' => 'Engravings.svg'],
        ['name' => 'Copons', 'icon' => 'Engravings.svg'],
    ];

    return $menu;
}

function setting($key): string
{
    return Setting::where('key', $key)->first()->value ?? '';
}

if (! function_exists('toArabicNumber')) {
    function toArabicNumber($value)
    {
        $western = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

        return str_replace($western, $arabic, (string) $value);
    }
}
