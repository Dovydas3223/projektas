<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ExerciseCategory;

class ExercisesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openCategoryView()
    {
        $cat = ExerciseCategory::all()->first();
        $str = "dasdad";


        return view('Exercises.exercises', [
            'categorys' => $cat->categoryName
        ]);
    }

}
