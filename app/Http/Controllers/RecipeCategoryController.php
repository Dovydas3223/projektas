<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeCategoryController extends Controller
{

    private function userType(){
        $userType= "Guest";
        if(auth()->user() != null){
            $userType = auth()->user()->type;
        }
        return $userType;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openRecipeCategoryListView()
    {
        $categories = RecipeCategory::all();

        foreach ($categories as $c){
            $c-> image = 'data:image/jpeg;base64,'.base64_encode( $c-> image ).'';
        }

        return view('Recipe.RecipeCategories.RecipeCategoryListView', [
            'categories' => $categories,
            'userType' => $this->userType()
        ]);
    }


    public function openCreateRecipeCategoryView (){

        return view('Recipe.RecipeCategories.CreateRecipeCategory');
    }

    public function createCategory(Request $request){

        $newCategory = new RecipeCategory();

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = storage_path() . '\app';
            $image->move($destinationPath, $name);
            $image = Storage::disk('local')->get($name);
            $newCategory->image = $image;
        }


        $newCategory->categoryName = $request->name;
        $newCategory->shortDescription = $request->detail;


        $newCategory->save();


        return redirect()->route('openRecipeCategoryView' )->with('message', 'Sukurta');;
    }

    public function openEditRecipeCategoryView($id){
        $category = RecipeCategory::findOrFail($id);
        $category-> image = 'data:image/jpeg;base64,'.base64_encode( $category -> image ).'';

        return view('Recipe.RecipeCategories.EditRecipeCategoryView', [
            'name'=>$category->categoryName,
            'image' => $category->image,
            'description' => $category->shortDescription,
            'categoryID' => $id
        ]);
    }

    public function editCategory(Request $request, $categoryID){


        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = storage_path() . '\app';
            $image->move($destinationPath, $name);
            $image = Storage::disk('local')->get($name);
            RecipeCategory::find($categoryID)->update([
                'image' => $image
            ]);
        }

        RecipeCategory::find($categoryID)->update([
            'categoryName' => $request->name,
            'shortDescription' => $request->detail,
        ]);

        return redirect()->route('openRecipeCategoryView')->with('message', 'Atnaujinta');

    }

    public function deleteRecipeCategory($categoryID){
        $category = RecipeCategory::find($categoryID);
        $recipes = Recipe::where('fk_categoryID','=', $categoryID)->get();

        foreach ($recipes as $recipe){
            $recipe->delete();
        }
        $category->delete();

        return redirect()->route('openRecipeCategoryView')->with('message', 'Ištrinta');
    }

}
