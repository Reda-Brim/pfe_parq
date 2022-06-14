<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\VehiculeController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
        

    });

    Route::middleware(['auth','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home'); 
       
        // Route::view('/home','dashboard.user.home')->name('home'); 
        Route::post('/logout',[UserController::class,'logout'])->name('logout');

        Route::get('/profil_client',[UserController::class,'profil_client'])->name('profil_client');
        Route::view('/changer_password','dashboard.user.changer_password')->name('changer_password');
        Route::post('/editer_password',[UserController::class,'editer_password'])->name('editer_password');
    
        Route::get('modifier_donnees_client',[UserController::class,'modifier_donnees_client'])->name('modifier_donnees_client');
        Route::post('editer_donnees_client',[UserController::class,'editer_donnees_client'])->name('editer_donnees_client');

        
        Route::get('vehicules_disponible',[UserController::class,'vehicules_disponible'])->name('vehicules_disponible');
        Route::get('detail_vehicules_disponible/{id}',[UserController::class,'detail_vehicules_disponible'])->name('detail_vehicules_disponible');


        Route::get('page_demande_location/{id}',[UserController::class,'page_demande_location'])->name('page_demande_location');
        Route::post('demande_location',[UserController::class,'demande_location'])->name('demande_location');

        Route::get('page_demande_achat/{id}',[UserController::class,'page_demande_achat'])->name('page_demande_achat');
        Route::post('demande_achat',[UserController::class,'demande_achat'])->name('demande_achat');

        






    });
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');

    });
 

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');

       //CLIENTS
        Route::get('/Listes_des_clients',[AdminController::class,'list_clients'])->name('Listes_des_clients');     
        Route::view('/Nouveau_client','dashboard.admin.Nouveau_client')->name('Nouveau_client');

        Route::get('supprimer_client/{id}',[AdminController::class,'supprimer_client'])->name('supprimer_client');
        Route::get('modifier_client/{id}',[AdminController::class,'modifier_client'])->name('modifier_client');
        Route::post('editer_client',[AdminController::class,'editer_client'])->name('editer_client');
        Route::get('impression_detail_client/{id}',[AdminController::class,'impression_detail_client'])->name('impression_detail_client');

        Route::get('/impression_clients',[AdminController::class,'impression_clients'])->name('impression_clients');

        Route::get('detail_client/{id}',[AdminController::class,'detail_client'])->name('detail_client');
        

        // Route::view('/Liste_vehicules','dashboard.admin.liste_vehicules')->name('liste_vehicules');
        // Route::view('/Nouveau_vehicules','dashboard.admin.Nouveau_vehicules')->name('Nouveau_vehicules');
 
        //VEHICULES 
        Route::get('/Liste_vehicules',[AdminController::class,'Liste_vehicules'])->name('Liste_vehicules');
        Route::get('/impression_vehicules',[AdminController::class,'impression_vehicules'])->name('impression_vehicules');

        Route::view('/Nouveau_vehicules','dashboard.admin.Nouveau_vehicules')->name('Nouveau_vehicules');
        Route::post('create_vehicule',[AdminController::class,'create_vehicule'])->name('create_vehicule');


        Route::get('modifier_vehicule/{id}',[AdminController::class,'modifier_vehicule'])->name('modifier_vehicule');

        Route::post('editer_vehicule',[AdminController::class,'editer_vehicule'])->name('editer_vehicule');
        Route::get('supprimer_vehicule/{id}',[AdminController::class,'supprimer_vehicule'])->name('supprimer_vehicule');

        Route::get('detail_vehicule/{id}',[AdminController::class,'detail_vehicule'])->name('detail_vehicule');
        Route::get('impression_detail_vehicule/{id}',[AdminController::class,'impression_detail_vehicule'])->name('impression_detail_vehicule');



      //contrats
      Route::get('/liste_contrats',[AdminController::class,'liste_contrats'])->name('liste_contrats'); 
      Route::get('impression_detail_contrat_achat/{numeroContrat}/{cinClient}/{matriculeVehicules}',[AdminController::class,'impression_detail_contrat_achat'])->name('impression_detail_contrat_achat');
      Route::get('impression_detail_contrat_location/{numeroContrat}/{cinClient}/{matriculeVehicules}',[AdminController::class,'impression_detail_contrat_location'])->name('impression_detail_contrat_location');


    //contrat achat
      Route::view('/Nouveau_contrat_achat','dashboard.admin.Nouveau_contrat_achat')->name('Nouveau_contrat_achat');
      Route::post('create_contrat_achat',[AdminController::class,'create_contrat_achat'])->name('create_contrat_achat');
//contrat location
      Route::view('/Nouveau_contrat_location','dashboard.admin.Nouveau_contrat_location')->name('Nouveau_contrat_location');
      Route::post('create_contrat_location',[AdminController::class,'create_contrat_location'])->name('create_contrat_location');
      Route::get('/impression_contrats',[AdminController::class,'impression_contrats'])->name('impression_contrats');


    Route::get('detail_contrat_location/{numeroContrat}/{cinClient}/{matriculeVehicules}',[AdminController::class,'detail_contrat_location'])->name('detail_contrat_location');
    Route::get('detail_contrat_achat/{numeroContrat}/{cinClient}/{matriculeVehicules}',[AdminController::class,'detail_contrat_achat'])->name('detail_contrat_achat');

    Route::get('modifier_contrat_achat/{id}',[AdminController::class,'modifier_contrat_achat'])->name('modifier_contrat_achat');
    Route::post('editer_contrat_achat',[AdminController::class,'editer_contrat_achat'])->name('editer_contrat_achat');

    Route::get('modifier_contrat_location/{id}',[AdminController::class,'modifier_contrat_location'])->name('modifier_contrat_location');
    Route::post('editer_contrat_location',[AdminController::class,'editer_contrat_location'])->name('editer_contrat_location');

    Route::get('supprimer_contrat/{id}',[AdminController::class,'supprimer_contrat'])->name('supprimer_contrat');


    Route::get('liste_demande_location',[AdminController::class,'liste_demande_location'])->name('liste_demande_location');
    Route::get('liste_demande_achat',[AdminController::class,'liste_demande_achat'])->name('liste_demande_achat');
    

    Route::get('page_accepter_demande_location/{id}',[AdminController::class,'page_accepter_demande_location'])->name('page_accepter_demande_location');
    Route::post('accepter_demande_location',[AdminController::class,'accepter_demande_location'])->name('accepter_demande_location');
    
    Route::get('page_accepter_demande_achat/{id}',[AdminController::class,'page_accepter_demande_achat'])->name('page_accepter_demande_achat');
    Route::post('accepter_demande_achat',[AdminController::class,'accepter_demande_achat'])->name('accepter_demande_achat');

    Route::get('Refuser_demande_achat/{id}',[AdminController::class,'Refuser_demande_achat'])->name('Refuser_demande_achat');
    Route::get('Refuser_demande_location/{id}',[AdminController::class,'Refuser_demande_location'])->name('Refuser_demande_location');



    



    });
    Route::view('/profile','dashboard.admin.profile')->name('profile');
  
 
    // Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');


    
    


});
