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
Route::get('/exerciseCategorys', 'ExercisesController@openCategoryView')->name('categ');
Route::get('/exercises/{id}','ExercisesController@openExerciseListView')->name('exercisesRoute');
Route::get('/exercisesDesc/{id}', 'ExercisesController@openExerciseDescriptionView')->name('exerciseDesc');
Route::get('/exercisesDel/{id}', 'ExercisesController@deleteExercise');
Route::get('/exerciseCreate/{id}', 'ExercisesController@openCreateExerciseView');//category id
Route::post('/exercises/{id}','ExercisesController@createExercise')->name('create');
Route::get('exerciseEdit/{id}', 'ExercisesController@openEditExerciseView');
Route::post('/exerciseEdit/{id}','ExercisesController@editExercise')->name('edit');
Route::get('/KMI', 'CalculatorController@openKMICalculatorView')->name('KMI');
Route::get('/requiredWater', 'CalculatorController@openCalorieIntakeView')->name('calorieIntake');
Route::get('/requiredCalories', 'CalculatorController@openRequiredWaterView')->name('requiredWater');
Route::post('/KMI', 'CalculatorController@calculateKMI')->name('calcKMI');
Route::post('/requiredCalories', 'CalculatorController@calculateRequiredCalories')->name('reqCalories');
Route::post('/requiredWater', 'CalculatorController@calculateRequiredWater')->name('reqWater');
