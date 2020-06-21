<?php

namespace App\Http\Controllers;

use App\exercises;
use App\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\ExerciseCategory;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Description;
use function GuzzleHttp\Psr7\str;

class ExercisesController extends Controller
{

    private function userType(){
        $userType= "Guest";
        if(auth()->user() != null){
            $userType = auth()->user()->type;
        }
        return $userType;
    }


    public function deleteCategory($categoryID){
        $category = ExerciseCategory::find($categoryID);
        $exercises = exercises::where('fk_categoryID','=', $categoryID)->get();

        foreach ($exercises as $exercise){
            $exercise->delete();
        }
        $category->delete();

        return redirect()->route('categ')->with('message', 'Ištrinta');
    }

    public function updateCategory(Request $request, $id){


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
            ExerciseCategory::find($id)->update([
                'image' => $image
            ]);
        }

        ExerciseCategory::find($id)->update([
            'exerciseName' => $request->name,
            'description' => $request->detail,
        ]);

        return redirect()->route('categ')->with('message', 'Atnaujinta');

    }

    public function openEditCategoryView($id){
        $category = ExerciseCategory::findOrFail($id);
        $category-> image = 'data:image/jpeg;base64,'.base64_encode( $category -> image ).'';

        return view('Exercises.Categorys.editExerciseCategoryView', [
            'name'=>$category->categoryName,
            'image' => $category->image,
            'description' => $category->description,
            'categoryID' => $id
        ]);
    }


    public function openCreateExerciseCategoryView(){

        return view('Exercises.Categorys.createExerciseCategoryView');
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
        $newCategory->description = $request->detail;
        $newCategory->save();


        return redirect()->route('openRecipeCategoryView' )->with('message', 'Sukurta');;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openCategoryView()
    {
        $cat = ExerciseCategory::all();

        foreach ($cat as $c){
            $c-> image = 'data:image/jpeg;base64,'.base64_encode( $c-> image ).'';
        }
        return view('Exercises.Categorys.exerciseCategorys', [
            //'categorys' => 'data:image/jpeg;base64,'.base64_encode( $cat->image ).''
            'categorys' => $cat,
            'userType' => $this->userType()
        ]);
    }


    public function openExerciseListView($item_id)
    {
        $exercises = Exercises::where('FK_CategoryID','=', $item_id)->get();

        if ($exercises != null){
            foreach ($exercises as $exercise){
                $exercise-> image = 'data:image/jpeg;base64,'.base64_encode( $exercise -> image ).'';
            }
        }

        return view('Exercises.Exercise.exercises', [
            'exercises' => $exercises,
            'categoryID' => $item_id,
            'userType' => $this->userType()
        ]);

    }

    public function openExerciseDescriptionView($exercise_id)
    {
        $exercise = Exercises::findOrFail($exercise_id);
        $exercise -> image = 'data:image/jpeg;base64,'.base64_encode( $exercise -> image ).'';
        $exerciseDesc = explode("\n", $exercise -> description);

        return view('Exercises.Exercise.exerciseDescriptionView', [
            'exercise' => $exercise,
            'desc' => $exerciseDesc,
            'categoryID' => $exercise->fk_categoryID,
            'userType' => $this->userType()
        ]);
    }

    public  function deleteExercise($id)
    {

        $exercise = Exercises::where('id','=', $id)->first();
        $fk_ID= $exercise->fk_categoryID;
        $exercise->delete();

        return redirect()->route('exercisesRoute', ['id'=>$fk_ID])->with('message', 'Pašalinta');
    }

    public function openCreateExerciseView($categoryID)
    {

        return view('Exercises.Exercise.CreateExerciseView', [
            'categoryID'=>$categoryID
        ]);
    }

    public function createExercise(Request $request, $categoryID){
        $newExercise = new exercises();
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
            $newExercise->image = $image;
        }


        $newExercise->exerciseName = $request->name;
        $newExercise->description = $request->detail;

        $newExercise->FK_CategoryID = $categoryID;
        $newExercise->save();


        return redirect()->route('exercisesRoute',['id'=>$categoryID] )->with('message', 'Sukurta');;
    }

    public function editExercise(Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $destinationPath = storage_path() . '\app';
        $image->move($destinationPath, $name);
        $image = Storage::disk('local')->get($name);
            Exercises::find($id)->update([
                'image' => $image
            ]);
        }

        Exercises::find($id)->update([
            'exerciseName' => $request->name,
            'description' => $request->detail,
            ]);

        return redirect()->route('exerciseDesc',['id'=>$id])->with('message', 'Atnaujinta');;
    }

    public function openEditExerciseView($id)
    {
        $exercise = Exercises::findOrFail($id);
        $exercise-> image = 'data:image/jpeg;base64,'.base64_encode( $exercise -> image ).'';


        return view('Exercises.Exercise.exerciseEditView', [
            'id' => $exercise->id,
            'name'=>$exercise->exerciseName,
            'image' => $exercise->image,
            'description' => $exercise->description,
            'categoryID' => $exercise->fk_CategoryID
        ]);
    }


}
