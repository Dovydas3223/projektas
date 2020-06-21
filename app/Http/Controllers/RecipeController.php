<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    private function userType(){
        $userType= "Guest";
        if(auth()->user() != null){
            $userType = auth()->user()->type;
        }
        return $userType;
    }

    public function openRecipeListView($item_id)
    {
        $recipes = Recipe::where('FK_CategoryID','=', $item_id)->get();

        if ($recipes != null){
            foreach ($recipes as $recipe){
                $recipe-> image = 'data:image/jpeg;base64,'.base64_encode( $recipe -> image ).'';
            }
        }

        return view('Recipe.Recipes.RecipeListView', [
            'recipes' => $recipes,
            'categoryID' => $item_id,
            'userType' => $this->userType()
        ]);

    }

    public function openRecipeCreationView($categoryID)
    {
        $ingredients = Ingredient::all();

        return view('Recipe.Recipes.RecipeCreationView', [
            'categoryID'=>$categoryID,
            'ingredients' => $ingredients
        ]);
    }

    public function createRecipe(Request $request)
    {
        dd($request);
    }

}
