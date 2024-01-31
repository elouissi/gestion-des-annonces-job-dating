<?php

use Illuminate\Support\Facades\Route;
 use Illuminate\View\AnonymousComponent;
use App\Http\Controllers\CompagnieController;

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
Route::get('/', [CompagnieController::class, 'index'])->name('Compagnies.index');
Route::fallback(function(){
    return redirect('/');
});
Route::get('Compagnies/Add', function () {
 return   view('Compagnies.formCompagnie');
    
})->name('Compagnies.formCompagnies');
Route::post('Compagnies/create', [CompagnieController::class, 'store'])->name('compagnies.store');


Route::delete('Compagnies/destroy' , [CompagnieController::class, 'destroy'])->name('compagnie.destroy');
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