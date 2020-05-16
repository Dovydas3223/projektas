<?php

use Illuminate\Support\Facades\Route;

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
    return view('mainView');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/recipes', function (){
   return view('recipes');
});
Route::get('/exerciseCategorys', 'ExercisesController@openCategoryView');

Route::get('/exercises', function(){
    return view('Exercises.exercises');
});
