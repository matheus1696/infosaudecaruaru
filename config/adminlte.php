<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'InfoSaúde Caruaru',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>InfoSaúde</b> Caruaru',
    'logo_img' => 'assets/img/logo.png',
    'logo_img_class' => 'brand-image img-circle',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'InfoSaúde Caruaru',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-success',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => false,
    'layout_boxed' => false,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => false,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-success elevation-2',
    'classes_auth_header' => 'text-muted text-sm',
    'classes_auth_body' => 'text-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'text-success',
    'classes_auth_btn' => 'btn btn-block btn-success elevation-1',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-success elevation-5',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light text-sm',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => '1',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 500,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
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
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    |  Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type'    => 'sidebar-menu-search',
            'text'    => 'Buscar Menu',
        ], 
        
        //Lista Telefônica
        [
            'text'    => 'Lista Telefônica',
            'classes' => 'btn-sm',
            'route'   => 'contacts.index',
            'icon'    => 'fas fa-phone-volume pr-2',
        ],

        //Perfil do Usuário
        [
            'text'    => 'Perfil',
            'classes' => 'btn-sm',
            'route'   => 'profiles.index',
            'icon'    => 'fas fa-user pr-2',
            'can'     => 'user'
        ],        

        //Configurações de Perfil
        [
            'text'    => 'Configurações de Perfis',
            'classes' => 'btn-sm',
            'icon'    => 'fas fa-users-cog pr-2',
            'can'     => ['sysadmin','admin'],
            'submenu' => [

                //Dados dos Usuários e Permissões dos Módulos
                [
                    'text'    => 'Dados dos Usuários',
                    'classes' => 'btn-sm',
                    'route'   => 'users.index',
                    'icon'    => 'fas fa-users pr-2',
                    'icon_color' => 'teal',
                    'can'     => ['sysadmin','admin'],
                ],
            ]
        ], 

        //Configurações de Sistema
        [
            'text'    => 'Configurações do Sistema',
            'classes' => 'btn-sm',
            'icon'    => 'fas fa-cogs pr-2',
            'can'     => ['sysadmin','admin'],
            'submenu' => [

                //Configurações de Empresas
                [
                    'text'    => 'Empresa',
                    'classes' => 'btn-sm',
                    'icon'    => 'fas fa-building pr-2',
                    'icon_color' => 'info',
                    'can'     => ['sysadmin','admin'],
                    'submenu' => [
                        [
                            'text'    => 'Estabelecimentos',
                            'classes' => 'btn-sm',
                            'route'   => 'establishments.index',
                            'icon'    => 'fas fa-clinic-medical pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],
                        [
                            'text'    => 'Tipo de Estabelecimentos',
                            'classes' => 'btn-sm',
                            'route'   => 'type_establishments.index',
                            'icon'    => 'fas fa-grip-horizontal pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],
                        [
                            'text'    => 'Blocos Financeiros',
                            'classes' => 'btn-sm',
                            'route'   => 'financial_blocks.index',
                            'icon'    => 'fas fa-grip-lines-vertical pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],
                        [
                            'text'    => 'Organograma',
                            'classes' => 'btn-sm',
                            'route'   => 'organizations.organize',
                            'icon'    => 'fas fa-bezier-curve pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],
                        [
                            'text'    => 'Ocupações (CBO)',
                            'classes' => 'btn-sm',
                            'route'   => 'occupations.index',
                            'icon'    => 'fas fa-id-badge pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],

                    ]
                ],

                //Configurações de Regiões
                [
                    'text'    => 'Regiões',
                    'classes' => 'btn-sm',
                    'icon'    => 'fas fa-globe-americas pr-2',
                    'icon_color' => 'info',
                    'can'     => ['sysadmin','admin'],
                    'submenu' => [
                        [
                            'text'    => 'Paises',
                            'classes' => 'btn-sm',
                            'route'   => 'countries.index',
                            'icon'    => 'fas fa-map-marked-alt pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],
                        [
                            'text'    => 'Estados',
                            'classes' => 'btn-sm',
                            'route'   => 'states.index',
                            'icon'    => 'fas fa-map-marked-alt pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],
                        [
                            'text'    => 'Cidades',
                            'classes' => 'btn-sm',
                            'route'   => 'cities.index',
                            'icon'    => 'fas fa-map-marked-alt pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                        ],
                    ]
                ],                

                //Configuração de Estoque
                [
                    'text'    => 'Configuração dos Itens',
                    'classes' => 'btn-sm',
                    'icon'    => 'fas fa-boxes pr-2',
                    'icon_color' => 'info',
                    'can'     => ['sysadmin','admin'],
                    'submenu' => [

                        //Configurações de Produtos
                        [
                            'text'    => 'Suprimentos',
                            'classes' => 'btn-sm',
                            'icon'    => 'fas fa-screwdriver pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                            'submenu' => [
                                [
                                    'text'    => 'Lista de Suprimentos',
                                    'classes' => 'btn-sm',
                                    'route'   => 'consumables.index',
                                    'icon'    => 'fas fa-screwdriver pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                                [
                                    'text'    => 'Tipos de Suprimentos',
                                    'classes' => 'btn-sm',
                                    'route'   => 'consumable_types.index',
                                    'icon'    => 'fas fa-list-ol pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                                [
                                    'text'    => 'Classificações de Suprimentos',
                                    'classes' => 'btn-sm',
                                    'route'   => 'consumable_classifications.index',
                                    'icon'    => 'fas fa-stream pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                                [
                                    'text'    => 'Apresentações',
                                    'classes' => 'btn-sm',
                                    'route'   => 'consumable_units.index',
                                    'icon'    => 'fas fa-ruler pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                            ]
                        ],

                        //Configurações de Medicamentos
                        [
                            'text'    => 'Medicamentos',
                            'classes' => 'btn-sm',
                            'icon'    => 'fas fa-tablets pr-2',
                            'icon_color' => 'teal',
                            'can'     => ['sysadmin','admin'],
                            'submenu' => [
                                [
                                    'text'    => 'Lista de Medicamentos',
                                    'classes' => 'btn-sm',
                                    'route'   => 'medications.index',
                                    'icon'    => 'fas fa-pills pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                                [
                                    'text'    => 'Tipos de Medicamentos',
                                    'classes' => 'btn-sm',
                                    'route'   => 'medication_types.index',
                                    'icon'    => 'fas fa-list-ol pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                                [
                                    'text'    => 'Classificações de Medicamentos',
                                    'classes' => 'btn-sm',
                                    'route'   => 'medication_classifications.index',
                                    'icon'    => 'fas fa-stream pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                                [
                                    'text'    => 'Apresentações',
                                    'classes' => 'btn-sm',
                                    'route'   => 'medication_units.index',
                                    'icon'    => 'fas fa-ruler pr-2',
                                    'can'     => ['sysadmin','admin'],
                                ],
                            ]
                        ],
                    ]
                ],
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
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
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2/css/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
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
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
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
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
