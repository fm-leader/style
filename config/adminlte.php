<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.

      --------------------------------------------------------------

     Le titre par d�faut de votre panneau d'administration, cela va dans la balise de titre de votre page.
     Vous pouvez le remplacer par page avec la section titre.
     Vous pouvez �galement sp�cifier un pr�fixe de titre et / ou postfix.
    |
    */

    'title' => 'Admin AP',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so


    -----------------------------------------------------------------------------
      Ce logo s'affiche dans le coin sup�rieur gauche de votre panneau d'administration.
      Vous pouvez utiliser le code HTML de base ici si vous le souhaitez.
      Le logo a �galement une mini variante, utilis�e pour la mini barre lat�rale. Faites-en 3 lettres ou plus
    |
    */

    'logo' => '<b>Admin</b>AP',

    'logo_mini' => '<b>A</b>P',


    'logo_img_xl' => '<img src="storage/image/LOGO.jpg">',

    'logo_img' =>'<img src="storage/image/LOGO.jpg">',

    'logo_img_alt'=>'<img src="storage/image/LOGO.jpg">',
    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | light variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'purple-light',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar.

    -------------------------------------------------------------------------
      Choisissez une disposition pour votre panneau d'administration. Les options de disposition disponibles:
      'null', 'boxed', 'fixed', 'top-nav'. 'null' est la valeur par d�faut,
      'top-nav' supprime la barre lat�rale et place votre menu dans la barre de navigation sup�rieure
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option.

    ----------------------------------------------------------------------
    Ici, nous choisissons et l'option pour pouvoir commencer avec une barre lat�rale r�duite.
    Pour ajuster la disposition de votre barre lat�rale,
    d�finissez-la simplement soit vrai, c'est compatible avec les dispositions sauf
    l'option de pr�sentation ''top-nav''.
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we have the option to enable a right sidebar.
    | When active, you can use "@section('right-sidebar')"
    | The icon you configured will be displayed at the end of the top menu,
    | and will show/hide de sidebar.
    | The slide option will slide the sidebar over the content, while false
    | will push the content, and have no animation.
    | You can also choose the sidebar theme (dark or light).
    | The right Sidebar can only be used if layout is not top-nav.

    -----------------------------------------------------------------
    Ici, nous avons la possibilit� d'activer une barre lat�rale droite.
    Lorsque cette option est activ�e, vous pouvez utiliser "@section ('barre lat�rale droite')".
     L�ic�ne que vous avez configur�e s�affiche � la fin du menu principal et affiche / masque la barre lat�rale.
     L�option de la diapositive permet de faire glisser la barre lat�rale sur le contenu, false poussera le contenu
     et n'aura aucune animation.
     Vous pouvez �galement choisir le th�me de la barre lat�rale (sombre ou claire).
     La barre lat�rale droite ne peut �tre utilis�e que si la pr�sentation n'est pas 'top-nav'.
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs.
    | This was automatically set on install, only change if you really need.
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | Set register_url to null if you don't want a register link.

    -----------------------------------------------------------
    Enregistrez ici votre tableau de bord, d�connectez-vous, connectez-vous et enregistrez les URL.
    Cette option a �t� d�finie automatiquement lors de l'installation.
     Elle ne change que si vous avez r�ellement besoin de.logout URL envoie automatiquement une demande
    POST dans Laravel 5.3 ou une version ult�rieure. D�finissez register_url sur null si vous ne souhaitez
    pas de lien d'enregistrement.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and a URL. You can also specify an icon from Font
    | Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.

    --------------------------------------------------------------------------
     Sp�cifiez les �l�ments de menu � afficher dans la barre lat�rale gauche.
     Chaque �l�ment de menu doit avoir un texte et une URL.
     Vous pouvez �galement sp�cifier une ic�ne � partir de la police Impressionnant.
     Une cha�ne au lieu d'un tableau repr�sente une en-t�te dans la barre lat�rale
     disposition. Le � can � est un filtre sur la fonctionnalit� de porte int�gr�e de Laravel.

    */

    'menu' => [
        [
            'text' => 'Recherche',
            'search' => true,
            'href' => '#',  //form action
            'method' => 'POST', //form method
            'input_name' => 'numero_cli', //input name
        ],
        ['header' => 'main_navigation'],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
       //****************Menu de gestion de l'application*****************************

           //Menu Commande
        [
            'text'    => 'Commandes',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Toutes les Commandes',
                    'url'  => 'admin/commandes',
                ],
                [
                    'text'    => 'Nouvelle Commande',
                    'url'     => 'admin/commandes/create',

                ],
                [
                    'text' => 'Commandes Livrees',
                    'url'  => '#',
                ],
            ],
        ],

        //Menu Modele
        [
            'text'    => 'Models',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Tous les Models',
                    'url'  => 'admin/modeles',
                ],
                [
                    'text'    => 'Models Categories',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Models Hommes',
                            'url'  => '#',
                        ],
                        [
                            'text' => 'Models Dames',
                            'url'  => '#',
                        ],

                    ],
                ],
                [
                    'text' => 'Ajouter un Model',
                    'url'  => 'admin/modeles/create',
                ],
            ],
        ],


        //Menu Client
        [
            'text'    => 'Clients',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Tous les Clients',
                    'url'  => 'admin/clients',
                ],
                [
                    'text'    => 'Ajouter un Client',
                    'url'     => 'admin/clients/create',
                ],
                [
                    'text' => 'Clients',
                    'url'  => 'admin/clients/create',
                ],
            ],
        ],

        //Menu progressions
        [
            'text'    => 'progressions',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Les progressions',
                    'url'  => 'admin/progressions',
                ],
                [
                    'text'    => 'Ajouter une Progressions',
                    'url'     => 'admin/progressions/create',
                ],
                [
                    'text' => 'progressions',
                    'url'  => 'admin/progressions/create',
                ],
            ],
        ],

        //Menu Livraison
        [
            'text'    => 'Livraison',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text'    => 'Tous les Livraisons',
                    'url'     => 'admin/livraisons',
                ],
                [
                    'text'    => 'Livraison',
                    'url'     => 'admin/livraisons',
                ],
                [
                    'text'    => 'Livraison',
                    'url'     => 'admin/livraisons',
                ],
            ],
        ],

        //Menu Payements
        [
            'text'    => 'Payements',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text'    => 'Payements',
                    'url'     => 'admin/payements',
                ],
                [
                    'text' => 'Effectuer Un Payement',
                    'url'  => 'admin/payements/create',
                ],
            ],
        ],


        //Menu Employes
        [
            'text'    => 'Employes',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Tous les Employes',
                    'url'  => 'admin/employes',
                ],
                [
                    'text'    => 'Ajouter un Nouvel Employe',
                    'url'     => 'admin/employes/create',

                ],
                [
                    'text' => 'Employes Supprimees',
                    'url'  => '#',
                ],
            ],
        ],


//*********************************************************

    /*
        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-file',
            'label'       => 4,
            'label_color' => 'success',
        ],
    */
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],

        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
        ],
        [
            'text'       => 'Alerte',
            'icon_color' => 'yellow',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'aqua',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality

    --------------------------------------------------------------
     Choisissez les filtres que vous souhaitez inclure pour le rendu du menu.
     Vous pouvez ajouter vos propres filtres � ce tableau apr�s les avoir cr��s.
     Vous pouvez commenter le GateFilter si vous ne voulez pas utiliser celui de Laravel
     fonctionnalit� de porte int�gr�e
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
    | Configure which JavaScript plugins should be included. At this moment,
    | DataTables, Select2, Chartjs and SweetAlert are added out-of-the-box,
    | including the Javascript and CSS files from a CDN via script and link tag.
    | Plugin Name, active status and files array (even empty) are required.
    | Files, when added, need to have type (js or css), asset (true or false) and location (string).
    | When asset is set to true, the location will be output using asset() function.

    ----------------------------------------------------------------------------
    Configurez les plugins JavaScript � inclure. � ce moment, DataTables, Select2,
    Chartjs et SweetAlert sont ajout�s tels quels, y compris les fichiers Javascript et
    CSS d'un CDN via un script et une balise de lien.
    Nom du plugin, statut actif et tableau de fichiers (m�me vides) sont obligatoires.
    Les fichiers, une fois ajout�s, doivent avoir un type (js ou css), un actif (vrai ou faux)
    et un emplacement (cha�ne).
    Lorsque asset est d�fini sur true, l'emplacement sera g�n�r� � l'aide de la fonction asset ().
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
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
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
            'active' => true,
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
            'active' => true,
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
            'active' => true,
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

        [
            'name' => 'Mix',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//node_modules/jquery/dist/jquery.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//node_modules/bootstrap/dist/bootstrap.css',
                ],
            ],


        ],
    ],

];
