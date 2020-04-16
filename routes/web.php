<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/


//Route pour aller chercher les age du site web
Route::get('/', 'SitewebController@accueil_site')->name('accueil');
//Route::get('contact', 'SitewebController@contact')->name('contacts');
Route::get('presentation', 'SitewebController@presentation')->name('presentation');

//Envoye de mail dans la age contact du web site
Route::get('contact', 'ContactController@create')->name('contacts');
Route::post('contact', 'ContactController@store')->name('contactsmail');



/***
//Routes pour la gestion des utilisateur
Route::prefix('admin')->namespace('Back')->group(function () {
Route::name('admin')->get('/', 'AdminController@index');
});
 ****/
Route::group(['namespace'=> 'admin', 'prefix'=>'admin'], function (){

    // Route Pour la creation,l' Edition, L'affichage, et  la modifition des commandes
    /*
     Route::get('index', function() {
         return view('admin/index');
     })->name('index')->middleware('auth');
     */
    Route::get('index', 'DashboardController@index')->name('index')->middleware('auth');
    // Route Pour la creation,l' Edition, L'affichage, et  la modifition des commandes
    Route::resource('commandes','CommandeController');

// Route Pour la creation,l' Edition, L'affichage, et  la modifition des Employés
    Route::resource('employes','EmployeController');

// Route Pour la creation,l' Edition, L'affichage, et  la modifition des Models
    Route::resource('modeles','ModeleController');

// Route Pour la creation,l' Edition, L'affichage, et  la modifition des Livraisons
    Route::resource('livraisons','LivraisonController');

// Route Pour la creation,l' Edition, L'affichage, et  la modifition des progressions de commandes
    Route::resource('progressions','ProgressionController');

// Route Pour la creation,l' Edition, L'affichage, et  la modifition des Payement
    Route::resource('payements','PayementController');

// Route Pour la creation,l' Edition, L'affichage, et  la modifition des Payement
    Route::resource('clients','ClientController');
//Auth::routes();

// L'article a bien été supprimé définitivement dans la base de données
//Route::delete('commandes/force/{commande}', 'CommandeController@forceDestroy')->name('commandes.force.destroy');

// L'article a bien ete restaure.
    //Route::put('commandes/restore/{commande}', 'CommandeController@restore')->name('commandes.restore');

//Route pour aller chercher les commandes d'un client dont on connait le numero de tel
    Route::get('client/{contact_client}/commandes', 'CommandeController@index')->name('commandes.client');

//Route pour aller chercher les films par catégorie
  //  Route::get('client/{id}/commandes', 'CommandeController@create')->name('commandes.clientid');

    // Route pour  les livraison
    Route::post('commandes/livraison/{commande}', 'CommandeController@livraison')->name('livraisons.commande');

    // Route pour la restauration des commandes livrés (valider) par erreur
    Route::post('commandes/livraison_restor/{commande}', 'CommandeController@livraison_restor')->name('livraisons.cmd_restor');


    //Route pour aller chercher un client dont on connait le numero de tel
    Route::get('client/num_tel/{contact_client}', 'ClientController@index')->name('clients.numTel');


    //Route pour aller chercher un Employe  dont on connait le numero de tel
    Route::get('employe/num_tel/{telephone_employe}', 'EmployeController@index')->name('employes.Tel');


    //Route pour aller chercher un Employe  dont on connait le numero de tel
    Route::get('modele/lib_model/{lib_modele}', 'ModeleController@index')->name('modeles.lib');

    //Route pour aller chercher un Employe  dont on connait le numero de tel
    Route::get('progression/etape/{commande_id}', 'ProgressionController@index')->name('progressions.etape');

    //Route pour aller chercher les mesures d'un client deja enregistré
    Route::post('commandes/client/{dimension_cmd}', 'ClientController@renvoye_mesure_client')->name('clients.commande_mesure');







/*
    ///Route pour la comptabilite
    Route::get('divers/comptabilite', 'DiversController@comptabilite')->name('divers.comptabilite');
    //Route pour important
    Route::get('divers/important', 'DiversController@important')->name('divers.important');
    //Route pour alerte
    Route::get('divers/alerte', 'DiversController@alerte')->name('divers.alerte');
    //Route pour les information
    Route::get('divers/info', 'DiversController@info')->name('divers.info');



    //Route pour creer un utilisateur
    Route::get("url(config('adminlte.register_url', 'register'))", 'ConfigController@create_user')->name('auth.register');
    //Route pour changer de mot de passe

    //Route::get('auth/passwords/reset', 'ConfigController@change_password')->name('auth.passwords.reset');



    //Route pour la comptabilite des commandes
    Route::get('divers/comptabilite/{dat_df_cmd}', 'DiversController@comptabilite')->name('comptabilite.cmd');
    //Route::get('client/{contact_client}/commandes', 'CommandeController@index')->name('commandes.client');



*/





});


//

//Route::get('/home','CommandeController@index');
// Route pour l'Authentification des Users
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
