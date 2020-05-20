<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function openKMICalculatorView()
    {
        return view('Calculators.KMIView');
    }
    public function openCalorieIntakeView()
    {
        return view('Calculators.calorieIntakeView');
    }
    public function openRequiredWaterView()
    {
        return view('Calculators.requiredWaterView');
    }
}
