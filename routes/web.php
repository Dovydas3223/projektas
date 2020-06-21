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

//ExercisesCategorys
Route::get('/exerciseCategorys', 'ExercisesController@openCategoryView')->name('categ');
Route::get('/createExerCategory', 'ExercisesController@openCreateExerciseCategoryView')->name('openCreateExerCategory');
Route::post('/createExerCategory','ExercisesController@createCategory' )->name('createExerCategory');
Route::get('/editExerciseCategory/{id}', 'ExercisesController@openEditCategoryView')->name('openEditExerciseCategoryView');
Route::post('/editExerciseCategory/{id}', 'ExercisesController@updateCategory')->name('updateExerciseCategory');
Route::get('/deleteExerciseCategory/{categID}', 'ExercisesController@deleteCategory')->name('deleteExerciseCategory');

//Exercises
Route::get('/exercisesDesc/{id}', 'ExercisesController@openExerciseDescriptionView')->name('exerciseDesc');
Route::get('/exercisesDel/{id}', 'ExercisesController@deleteExercise');
Route::get('/exerciseCreate/{id}', 'ExercisesController@openCreateExerciseView')->name('openCreateExerciseView');
Route::post('/exercises/{id}','ExercisesController@createExercise')->name('create');
Route::get('exerciseEdit/{id}', 'ExercisesController@openEditExerciseView')->name('openEditExerciseView');
Route::post('/exerciseEdit/{id}','ExercisesController@editExercise')->name('edit');
Route::get('/exercises/{id}','ExercisesController@openExerciseListView')->name('exercisesRoute');



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
Route::get('/articleDesc/{categoryID}', 'ArticleController@openArticleDescriptionView')->name('openArticleDescView');
Route::get('/createArticle/{categoryID}', 'ArticleController@openCreateArticleView')->name('openCreateArticleView');
Route::post('/createArticle/{categoryID}', 'ArticleController@createArticle')->name('createArticle');
Route::get('articleEdit/{id}', 'ArticleController@openEditArticleView')->name('openEditArticleView');
Route::post('/articleEdit/{id}','ArticleController@updateArticle')->name('editArticle');
Route::get('/articleDel/{id}', 'ArticleController@deleteArticle');

//RecipeController Categorys
Route::get('/RecipeCategories', 'RecipeCategoryController@openRecipeCategoryListView')->name('openRecipeCategoryView');
Route::get('/CreateRecipeCategory', 'RecipeCategoryController@openCreateRecipeCategoryView')->name('openCreateRecipeCategoryView');
Route::get('/EditRecipeCategory/{id}', 'RecipeCategoryController@openEditRecipeCategoryView')->name('openEditRecipeCategoryView');
Route::post('/CreateRecipeCategory','RecipeCategoryController@createCategory' )->name('createRecipeCategory');
Route::post('/EditRecipeCategory/{categoryID}','RecipeCategoryController@editCategory' )->name('editRecipeCategory');
Route::get('/DeleteRecipeCategory/{id}','RecipeCategoryController@deleteRecipeCategory' )->name('deleteRecipeCategory');


//Recipes
Route::get('/Recipes/{categoryID}', 'RecipeController@openRecipeListView')->name('openRecipeListView');
Route::get('/Recipes/{categoryID}/CreateRecipe', 'RecipeController@openRecipeCreationView')->name('openCreateRecipe');
Route::post('/CreateRecipe/{categoryID}', 'RecipeController@createRecipe')->name('createRecipe');
