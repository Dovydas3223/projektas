<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\ManyToManyRecipe;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\True_;

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

    public function createRecipe(Request $request, $categoryID)
    {
        $newRecipe = new Recipe();
        $quantityList = $request->quantity;
        $ingredIDList = $request->ingredList;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = storage_path() . '\app';
            $image->move($destinationPath, $name);
            $image = Storage::disk('local')->get($name);
            $newRecipe->image = $image;
        }

        $newRecipe->recipeName = $request->name;
        $newRecipe->shortDescription = $request->shortDetail;
        $newRecipe->description = $request->detail;
        $newRecipe->fk_categoryID = $categoryID;
        $newRecipe->fk_userID = Auth::user()->id;

        $newRecipe->save();

        if ($quantityList != null){
            for ($i = 0; $i < count($quantityList); $i++){
                $newRelationship = new ManyToManyRecipe();
                $newRelationship->recipeID = $newRecipe->id;

                $newRelationship->ingredID = $ingredIDList[$i];
                $newRelationship->quantity = $quantityList[$i];
                $newRelationship->save();
            }

        }
        return redirect()->route('exercisesRoute',['id'=>$categoryID] )->with('message', 'Sukurta');;
    }

    public function openDescriptionCreationView(Request $request, $categoryID){
        $quantityList = $request->quantity;
        $ingredIDList = $request->ingredID;
        return view('Recipe.Recipes.RecipeDescriptionCreationView', [
            'quantityList' => $quantityList,
            'ingredList' => $ingredIDList,
            'categoryID' => $categoryID
        ]);
    }

    public function openRecipeDescriptionView($categoryID, $recipeID){
        $recipe = Recipe::find($recipeID);
        $ingred = ManyToManyRecipe::where('recipeID', $recipe->id)->get();
        $quantity = [];
        $ingredID = [];
        for ($i = 0; $i < count($ingred); $i++)
        {
            $quantity[$i] = $ingred[$i]->quantity;
            $ingredID[$i] = Ingredient::find($ingred[$i]->ingredID);
        }

        $desc = explode("\n", $recipe -> description);
        $recipe -> image = 'data:image/jpeg;base64,'.base64_encode( $recipe -> image ).'';
        return view('Recipe.Recipes.RecipeDescriptionView', [
            'categoryID' => $categoryID,
            'recipe' => $recipe,
            'ingred' => $ingred,
            'desc' => $desc,
            'userType'=> $this->userType(),
            'quantity' => $quantity,
            'ingredID' => $ingredID
        ]);
    }

}
