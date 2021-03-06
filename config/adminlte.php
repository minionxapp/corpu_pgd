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

    'title' => 'Corpu Digital',
    'title_prefix' => '',
    'title_postfix' => '',
    

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>Corpu</b>Digital',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
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
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
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
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => true,
            'topnav' => true,
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
            'can'     => ['dev','admin'],
        ],
        ['header' => 'Menu'],
        [
            'text' => 'Home',
            'url'  => '/home',
            'icon' => 'fas fa-fw fa-user',
            
        ],
        [
            'text'    => 'ADMIN',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['dev','admin'],
            'submenu' => [
                [
                    'text' => 'User Management',
                    'url'  => '/user',
                ], 
                [
                    'text' => 'Divisi',
                    'url'  => '/divisi',
                ],              
                [
                    'text' => 'Departement',
                    'url'  => '/departement',
                ],
                [
                    'text' => 'Role',
                    'url'  => '/role',
                ],
                [
                    'text' => 'Permission',
                    'url'  => '/permission',
                ],
                [
                    'text' => 'User Role',
                    'url'  => '/userrole',
                ],
                [
                    'text' => 'Role Permission',
                    'url'  => '/rolepermission',
                ],
                [
                    'text' => 'Job Family',
                    'url'  => '/jobfamily',
                ], 
                
                
            ],
        ],

       
        [
            'text'    => 'TRAINING',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['dev','admin','user'],
            'submenu' => [
                [
                    'text' => 'Kalendar',
                    'url'  => '/calendar',
                    'can'     => ['dev','admin','user'],
                ],
                [
                    'text' => 'Event',
                    'url'  => '/event',
                    'can'     => ['dev','admin','user'],
                ],
                [
                    'text' => 'Jenis Training',
                    'url'  => '/jenistraining',
                    'can'     => ['dev','admin'],
                ], 
                [
                    'text' => 'Usulan Training',
                    'url'  => '/usulan',
                    'can'     => ['dev','admin','user'],
                ], 
                [
                    'text' => 'Desain',
                    'url'  => '/desaintraining',
                    'can'     => ['dev','admin'],
                ],              
                // [
                //     'text' => 'Master Training',
                //     'url'  => '/gleadsmodul',
                //     'can'     => ['dev','admin'],
                // ],
                [
                    'text' => 'Buka Blokir',
                    'url'  => '/#',
                    'can'     => ['dev','admin','user'],
                ],

            ],
        ],

       
        [
            'text'    => 'Monitoring',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['dev','admin','user'],
            'submenu' => [
                [
                    'text' => 'G-leads',
                    // 'url'  => '/rep01',
                    'icon'    => 'fas fa-fw fa-share',
                    'can'     => ['dev','admin'],
                    'submenu' => [
                        [
                            'text' => 'Program',
                            'url'  => '/transgleadsprogram',
                            'can'     => ['dev','admin'],
                        ], 
                        [
                            'text' => 'Skill',
                            'url'  => '/transgleadsskill',
                            'can'     => ['dev','admin'],
                        ], 
                        [
                            'text' => 'Modul',
                            'url'  => '/gleadsmodul',
                            'can'     => ['dev','admin'],
                        ], 
                        
                        [
                            'text' => 'Training Report',
                            'url'  => '/rep01',
                            'can'     => ['dev','admin'],
                        ], 
                        [
                            'text' => 'Daftar User Training',
                            'url'  => '/repUserTraining',
                            'can'     => ['dev','admin'],
                        ],              
                       
                      
                        [
                            'text' => 'Usulan',
                            'url'  => '/usulan',
                            'can'     => ['dev','admin'],
                        ], 
                    ],
                ], 
                
               
            ],
        ],

        [
            'text'    => 'Helpdesk',
            'icon'    => 'fas fa-fw fa-share',
            // 'can'     => ['dev','admin','guest','user'],
            'submenu' => [
                [
                    'text' => 'Ticket',
                    'url'  => '/ticket',
                ], 
                [
                    'text' => 'Ticket Proses',
                    'url'  => '/tickethandle',
                    'can'     => ['dev','admin'],
                ], 
            ]
            ],

        [
            'text'    => 'Administrasi',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['dev','admin','user'],
            'submenu' => [
                [
                    'text' => 'Project',
                    'url'  => '/project',
                    'can'     => ['dev','admin','user'],
                ], 
                [
                    'text' => 'Project Activity',
                    'url'  => '/projectactivity',
                    'can'     => ['dev','admin'],
                ],              
                [
                    'text' => 'Dokumen Link',
                    'url'  => '/dokumenlink',
                    'can'     => ['dev','admin','user'],
                ],
            ],
        ],

        ['header' => 'account_settings',
        'can'     => ['dev','admin'],
        ],
        [
            'text' => 'Profile',
            'url'  => 'profile',
            'icon' => 'fas fa-fw fa-user',
            'can'     => ['dev','admin'],
        ],
        [
            'text' => 'change_password',
            'url'  => '/changepassword',
            'icon' => 'fas fa-fw fa-lock',
            'can'     => ['dev','admin','user'],
        ],
        [
            'text'    => 'Dev',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['dev','admin'],
            'submenu' => [                
                [
                    'text' => 'Kamera',
                    'url'  => '/kamera',
                    'can'     => ['dev','admin'],
                ],
                [
                    'text' => 'autocomplete',
                    'url'  => '/autocomplete',
                    'can'     => ['dev','admin'],
                ],
                [
                    'text' => 'uploadfile',
                    'url'  => '/uploadfile',
                    'can'     => ['dev','admin'],
                ],
                [
                    'text' => 'Kirim Email',
                    'url'  => '/email',
                    'can'     => ['dev','admin'],
                ],

                

                
                [
                    'text' => 'repUsulan',
                    'url'  => '/repUsulan',
                    'can'     => ['dev','admin'],
                ],
                [
                    'text'    => 'level_onex',
                    'url'     => '#',
                    'can'     => ['dev','admin'],
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                    'can'     => ['dev','admin'],
                ],
            ],
        ],
        ['header' => 'labels',
        'can'     => ['dev','admin'],
        ],
        [
            'text'       => 'maketable',
            'icon_color' => 'cyan',
            'url'        => '/maketable',
            'can'     => ['dev','admin'],
        ],
        [
            'text'       => 'Script',
            'icon_color' => 'red',
            'url'        => '/script',
            'can'     => ['dev','admin'],
        ],
        [
            'text'       => 'testscrip',
            'icon_color' => 'yellow',
            'url'        => '/testscrip',
            'can'     => ['dev','admin'],
            //'can'       => ['admin'],
        ],
        [
            'text'       => 'My Item',
            'icon_color' => 'cyan',
            'url'        => '/item',
            'can'     => ['dev','admin',],
        ],
        [
            'text'       => 'Item Action',
            'icon_color' => 'cyan',
            'url'        => '/itemsaction',
            'can'     => ['dev','admin',],
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
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
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
        'Select2' => [
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
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
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

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
