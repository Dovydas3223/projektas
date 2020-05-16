<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ExerciseCategory;
use Illuminate\Support\Facades\Storage;

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

}
