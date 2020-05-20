<?php

namespace App\Http\Controllers;

use App\exercises;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\ExerciseCategory;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Description;
use function GuzzleHttp\Psr7\str;

class ExercisesController extends Controller
{
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
        return view('Exercises.exerciseCategorys', [
            //'categorys' => 'data:image/jpeg;base64,'.base64_encode( $cat->image ).''
            'categorys' => $cat
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

        return view('Exercises.exercises', [
            'exercises' => $exercises,
            'categoryID' => $item_id
        ]);

    }

    public function openExerciseDescriptionView($exercise_id)
    {
        $exercise = Exercises::where('id','=', $exercise_id)->first();

        $exercise -> image = 'data:image/jpeg;base64,'.base64_encode( $exercise -> image ).'';
        $exerciseDesc = explode("\n", $exercise -> description);
        return view('Exercises.exerciseDescriptionView', [
            'exercise' => $exercise,
            'desc' => $exerciseDesc
        ]);
    }

    public  function deleteExercise($id)
    {

        $exercise = Exercises::where('id','=', $id)->first();
        $exercise->delete();

        return redirect()->route('exercisesRoute', ['id'=>$exercise->FK_CategoryID])->with('message', 'Pašalinta');
    }

    public function openCreateExerciseView($categoryID)
    {

        return view('Exercises.CreateExerciseView', [
            'categoryID'=>$categoryID
        ]);
    }

    public function createExercise(Request $request, $categoryID){
        $newExercise = new exercises;
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


        return view('Exercises.exerciseEditView', [
            'id' => $exercise->id,
            'name'=>$exercise->exerciseName,
            'image' => $exercise->image,
            'description' => $exercise->description,
            'categoryID' => $exercise->FK_CategoryID
        ]);
    }


}
