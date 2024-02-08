<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompagnieController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;

// use App\Http\Controllers\RoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
// Route::resource('Compagnies', CompagnieController::class);
Route::fallback(function(){
    return redirect('/');
});



Route::middleware('guest')->get('/login', [LoginController::class, 'index'])->name('form.login');
Route::middleware('guest')->get('/register', [LoginController::class, 'register'])->name('form.regiter');
Route::Post('/login', [LoginController::class, 'login'])->name('login');
Route::Post('/register', [LoginController::class, 'create'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [LoginController::class, 'profile'])->name('profile');



Route::get('/roles', [RoleController::class, 'index'])->name('roles.index'); // Utiliser le namespace complet une seule fois
Route::get('/roles/add', [RoleController::class, 'create'])->name('roles.create'); // Utiliser le namespace complet une seule fois
Route::post('/roles/ajouter', [RoleController::class, 'store'])->name('roles.store');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/{role}', [RoleController::class, 'edit'])->name('roles.edit');  // Utiliser le namespace complet une seule fois
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');  // Utiliser le namespace complet une seule fois



// Route::middleware('auth')->group(function () {
//     // Route::resource('roles', RoleController::class);
// });
// Route::resource('users', \App\Http\controllers\App\Http\Controllers\UserController::class)->middleware('auth');
Route::middleware('auth')->group(function () {
Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Utiliser le namespace complet une seule fois
Route::get('/users/create', [UserController::class, 'show'])->name('users.create'); // Utiliser le namespace complet une seule fois
Route::post('/users/add', [UserController::class, 'store'])->name('users.store'); // Utiliser le namespace complet une seule fois
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Utiliser le namespace complet une seule fois
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.edit'); // Utiliser le namespace complet une seule fois
});

// Route::resource('users', UserController::class)->only(['index']);
Route::get('/', [CompagnieController::class, 'home'])->name('Compagnies.home');
Route::get('/dashboard', [CompagnieController::class, 'index'])->name('Compagnies.index');
Route::get('Compagnies/Add', function () { return   view('Compagnies.formCompagnie');  })->name('Compagnies.formCompagnies');
Route::post('Compagnies/create', [CompagnieController::class, 'store'])->name('compagnies.store'); 
Route::delete('Compagnies/{compagnie}' , [CompagnieController::class, 'destroy'])->name('compagnie.destroy');
Route::get('Compagnies/{compagnie}' , [CompagnieController::class, 'edit'])->name('compagnie.edit');
Route::put('Compagnies/{compagnie}' , [CompagnieController::class, 'update'])->name('compagnies.update');


Route::get('Announcement/Add', [AnnouncementController::class, 'index'])->name('Announcement.formAnnouncement');
Route::post('Announcement/store', [AnnouncementController::class, 'store'])->name('Announcement.store');
Route::delete('Announcement/{announcement}' , [AnnouncementController::class, 'destroy'])->name('Announcement.destroy');
Route::get('Announcement/{announcement}' , [AnnouncementController::class, 'edit'])->name('Announcement.edit');
Route::put('Announcement/{announcement}' ,  [AnnouncementController::class, 'update'])->name('Announcement.update');

Route::get('skill/Add', [SkillController::class, 'index'])->name('skill.index');
Route::get('skill/create', [SkillController::class, 'create'])->name('skill.create');
Route::post('skill/store', [SkillController::class, 'store'])->name('skill.store');
Route::delete('skill/{skill}' , [SkillController::class, 'destroy'])->name('skill.destroy');
Route::get('skill/{skill}' , [SkillController::class, 'edit'])->name('skill.edit');
Route::put('skill/{skill}' ,  [SkillController::class, 'update'])->name('skill.update');






// Route::get('Announcement/Add', function () {
//     return   view('Announcement.formAnnouncement');  
//    })->name('Announcement.formAnnouncement');
// //pour nommer un router sans avoir le probleme du nom
// Route::get('mycompagny', function () {
//  return   view('mydata');
    
// });
// Route::post('recevoir/data', function () {
//  return   'welcome';
    
// })->name('compagnie');
// //end pour nommer un router sans avoir le probleme du nom

// //pour ajouter une condition 
// Route::get('edit/{id}', function($id){
//     return '<h1>gooooooo'.$id.'dooooooooooo</h1>';
// })->where(['id'=>'[0-5]+']  );
// //end pour ajouter une condition 
// //tous les methodes 'post''put''patch'
// Route::post('data', function(){
//     return '<h1>goooooooooooooooooo</h1>';
// });
// Route::put('mydata', function(){
//     return '<h1>put</h1>';
// });

// Route::patch('my/patch', function(){
//     return '<h1>patch</h1>';
// });
// //pour ne pas repeter le meme code "product/edit"
// Route::prefix('annoucement')->group(function(){
//     Route::get('edit/{id}', function($id){
//         return '<h1>gooooooo'.$id.'dooooooooooo</h1>';
//     })->where(['id'=>'[0-5]+']  );

// });
// //lors vous avez une erreur dans votre path vous donnez le default path

// //end path
// //eviter d'ecrire beaucoup du name space du controller
// Route::controller('AnnouncementController')->group(function () {
//     Route::get('mondata','mydata');
// });
// Route::get('une/ligne','AnnouncementController@mydata');
// //middlware
// Route::middleware('guest')->get('midl',function(){
//     return 'essayer midllware';
// });
// //midllware grouper les routes sous un midllware
// Route::middleware('test')->group(function(){
//     Route::get('group',function(){
//         return 'essayer midllware';
//     });

// });