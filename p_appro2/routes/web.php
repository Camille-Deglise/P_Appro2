<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

//Route préfixées avec une racine, un nom commun à toute
//Permet de faire un changement sur plusieurs routes à un seul endroit
Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/new', 'create')->name('create');


    Route::get('/{slug}-{id}','show')->where([
            'id'=>'[0-9]+',
            'slug'=>'[a-z0-9\-]+'
        ])->name('show');
});




