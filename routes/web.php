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

//Exercises
Route::get('/exerciseCategorys', 'ExercisesController@openCategoryView')->name('categ');//->middleware('is_admin')->name('categ');
Route::get('/exercises/{id}','ExercisesController@openExerciseListView')->name('exercisesRoute');
Route::get('/exercisesDesc/{id}', 'ExercisesController@openExerciseDescriptionView')->name('exerciseDesc');
Route::get('/exercisesDel/{id}', 'ExercisesController@deleteExercise');
Route::get('/exerciseCreate/{id}', 'ExercisesController@openCreateExerciseView')->name('openCreateExerciseView');
Route::post('/exercises/{id}','ExercisesController@createExercise')->name('create');
Route::get('exerciseEdit/{id}', 'ExercisesController@openEditExerciseView')->name('openEditExerciseView');
Route::post('/exerciseEdit/{id}','ExercisesController@editExercise')->name('edit');
Route::get('/createExerCategory', 'ExercisesController@openCreateExerciseCategoryView')->name('openCreateExerCategory');
Route::post('/createExerCategory','ExercisesController@createCategory' )->name('createExerCategory');
Route::get('/editExerciseCategory/{id}', 'ExercisesController@openEditCategoryView')->name('openEditExerciseCategoryView');
Route::post('/editExerciseCategory/{id}', 'ExercisesController@updateCategory')->name('updateExerciseCategory');
Route::get('/deleteExerciseCategory/{categID}', 'ExercisesController@deleteCategory')->name('deleteExerciseCategory');


//Calculators
Route::get('/KMI', 'CalculatorController@openKMICalculatorView')->name('KMI');
Route::get('/requiredWater', 'CalculatorController@openCalorieIntakeView')->name('calorieIntake');
Route::get('/requiredCalories', 'CalculatorController@openRequiredWaterView')->name('requiredWater');
Route::post('/KMI', 'CalculatorController@calculateKMI')->name('calcKMI');
Route::post('/requiredCalories', 'CalculatorController@calculateRequiredCalories')->name('reqCalories');
Route::post('/requiredWater', 'CalculatorController@calculateRequiredWater')->name('reqWater');

//ArticleCategory
Route::get('/articleCategorys', 'ArticleController@openArticleCategorys')->name('artCategory');
Route::get('/createArticleCategory', 'ArticleController@openCreateCategory')->name('artCategoryCreate');
Route::post('/createArticleCategory', 'ArticleController@CreateCategory')->name('createArtCategory');
Route::get('/editArticleCategory/{id}', 'ArticleController@openEditArticleCategoryView')->name('openArtCategoryView');
Route::post('/editArticleCategory/{id}', 'ArticleController@updateCategory')->name('editArtCategory');
Route::get('/articleCategoryDel/{id}', 'ArticleController@deleteCategory')->name('deleteCategory');

//Articles
Route::get('/articleList/{Category}', 'ArticleController@openArticleListView')->name('openArticleListView');
Route::get('/articleDesc', 'ArticleController@openArticleDescriptionView')->name('openArticleDescView');
Route::get('/createArticle/{categoryID}', 'ArticleController@openCreateArticleView')->name('openCreateArticleView');
Route::post('/createArticle/{categoryID}', 'ArticleController@createArticle')->name('createArticle');
