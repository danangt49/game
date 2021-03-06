<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'HIU.BIZ',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-logo
    |
    */

    'logo' => 'HIU BIZ',
    'logo_img' => 'public/asset/img/logo.png',
    'logo_img_class' => 'brand-image-xl',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => '',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-classes
    |
    */

    'classes_body' => 'sidebar-mini layout-fixed control-sidebar-slide-open text-sm',
    'classes_brand' => 'brand-link navbar-dark',
    'classes_brand_text' => '',
    'classes_content_header' => 'container-fluid',
    'classes_content' => 'container-fluid',
    'classes_sidebar' => 'main-sidebar elevation-4 sidebar-dark-success',
    'classes_sidebar_nav' => 'nav nav-pills nav-sidebar flex-column nav-legacy',
    'classes_topnav' => 'navbar-dark navbar-dark',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'admin/home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-menu
    |
    */

    'menu' => [
        [
            'text' => 'Home',
            'url'  => 'admin/home',
            'icon' => '',
            'icon' => 'fas fa-home',
        ],
        [
            'text' => 'Members',
            'url'  => 'admin/member',
            'icon' => '',
            'icon' => 'fas fa-users',
        ],
        [
            'text' => 'Game Category',
            'url'  => 'admin/category',
            'icon' => '',
            'icon' => 'fas fa-list-alt',
        ],
        [
            'text' => 'Game',
            'url'  => 'admin/games',
            'icon' => '',
            'icon' => 'fas fa-gamepad',
        ],
        [
            'text' => 'Match',
            'url'  => 'admin/matches',
            'icon' => '',
            'icon' => 'fas fa-dice-d6',
        ],
        
        // [
        //     'text' => 'Tournament',
        //     'url'  => 'tournament',
        //     'icon' => '',
        //     // 'icon' => 'fas fa-book-open',
        // ],
        [
            'text' => 'Banner',
            'url'  => 'admin/banner',
            'icon' => '',
            'icon' => 'fas fa-images',
        ],
        [
            'text' => 'Province',
            'url'  => 'admin/province',
            'icon' => '',
            'icon' => 'fas fa-city',
        ],

        [
            'text' => 'Announcement',
            'url'  => 'admin/announcement',
            'icon' => '',
            'icon' => 'fas fa-bullhorn',
        ],

        [
            'text' => 'One Single Notification',
            'url'  => 'admin/notification',
            'icon' => '',
            'icon' => 'fas fa-bell',
        ],

        [
            'text' => 'Reports',
            'url'  => 'admin/report',
            'icon' => '',
            'icon' => 'fas fa-trophy',
        ],
        [
            'text'    => 'Payment',
            'icon'    => '',
            'icon'    => 'fas fa-credit-card',
            'submenu' => [
                [
                    'text' => 'Bank',
                    'url'  => 'admin/bank',
                    'icon' => '',
    
                    // 'icon' => 'fas fa-question',
                ],
                // [
                //     'text' => 'Voucher nominal',
                //     'url'  => 'admin/nominal',
                //     'icon' => '',
    
                //     // 'icon' => 'fas fa-comment-dots',
                // ],
                [
                    'text' => 'Transfer confirmation',
                    'url'  => 'admin/confirmation',
                    'icon' => '',
    
                    // 'icon' => 'fas fa-ticket-alt',
                ]
               
            ],
        ],
        [
            'text' => 'Voucher',
            'icon' => '',
            'icon'    => 'fas fa-tags',
            'submenu' => [
                [
                    'text' => 'Setting Voucher',
                    'url'  => 'admin/setting-voucher',
                    'icon' => '',
                    // 'icon' => 'fas fa-question',
                ],
                [
                    'text' => 'Voucher',
                    'url'  => 'admin/voucher',
                    'icon' => '',
                    // 'icon' => 'fas fa-comment-dots',
                ],
            ],
        ],
        [
            'text'    => 'Website Settings',
            'icon' => '',
            'icon'    => 'fas fa-cog',
            'submenu' =>[
                [
                    'text' => 'Menu',
                    'url'  => 'admin/menu',
                    'icon' => '',
                    // 'icon' => 'fas fa-users',
                ],
                [
                    'text' => 'Categoy  Blog',
                    'url'  => 'admin/categorymenu',
                    'icon' => '',
                    // 'icon' => 'fas fa-users',
                ],
                [
                    'text' => 'Modul',
                    'url'  => 'admin/modul',
                    'icon' => '',
                    // 'icon' => 'fas fa-users',
                ],
                [
                    'text' => 'Page',
                    'url'  => 'admin/page',
                    'icon' => '',
                    // 'icon' => 'fas fa-users',
                ],
                [
                    'text' => 'Blog',
                    'url'  => 'admin/blog',
                    'icon' => '',
                    // 'icon' => 'fas fa-users',
                ],
                [
                    'text' => 'Password',
                    'url'  => 'admin/password',
                    'icon' => '',
                    // 'icon' => 'fas fa-lock',
                ],
                [
                    'text' => 'FAQ',
                    'url'  => 'admin/faq',
                    'icon' => '',
                    // 'icon' => 'fas fa-ticket-alt',
                ],
                
               
            ],
        ],
        [
            'text' => 'Setting',
            'url'  => 'admin/setting',
            'icon' => '',
            'icon' => 'fas fa-tools',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
