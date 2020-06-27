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

    public function calculateKMI(Request $request)
    {

        $this->validate($request, [
            'weight' => 'required',
            'height' => 'required'
        ]);
        $KMI = round($request->weight/($request->height*$request->height)*10000,2);

        if($KMI > 13 && $KMI < 19){
            $text = "Nepakankamas svoris";
            $color= "#f6ef2e";
        }else if($KMI > 19 && $KMI < 25){
            $text = "Normalus svoris";
            $color = "#3db246";
        }else if($KMI >= 25 && $KMI < 29){
            $text = "Antsvoris";
            $color = "#c5f503";
        }else if($KMI >= 29 && $KMI < 39){
            $text = "Nutukimas";
            $color = "#ffbc40";
        }else if($KMI >= 39 && $KMI < 69){
            $text = "Labai didelis nutukimas";
            $color = "#ec7600";
        }else{
                $text = "Neteisingi duomenys";
                $color = "#ff0000";
            }
        return view('Calculators.KMIView',[
            'KMI' => $KMI,
            'text' => $text,
            'color' => $color,
            'weight' => $request->weight,
            'height' => $request->height
        ] );
    }

    public function calculateRequiredCalories(Request $request)
    {

        $this->validate($request, [
            'age' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'activity' => 'required'
        ]);
        $gender = $request->gender;
        $weight= $request->weight;
        $age = $request->age;
        $height = $request->height;
        $activity = $request->activity;
        $man = '';
        $woman = '';
        $veryLight = '';
        $light = '';
        $moderate = '';
        $heavy = '';
        $veryHeavy = '';
        if ($gender == 'man')
        {
            $BMR = (10*$weight+6.25*$height-5*$age+5)*1.1;
            $man = 'checked';
        } else
        {
            $BMR = (10*$weight+6.25*$height-5*$age-161)*1.1;
            $woman = 'checked';
        }
        if ($activity == 'veryLight')
        {
            $mult=1.3;
            $maintainWeight = $BMR*$mult;
            $loseWeight = ($BMR*$mult)-($BMR*$mult*0.2);
            $gainWeight = ($BMR*$mult)+($BMR*$mult*0.2);
            $veryLight = 'checked';
        }elseif ($activity == 'light')
        {
            $mult=1.55;
            $maintainWeight = $BMR*$mult;
            $loseWeight = ($BMR*$mult)-($BMR*$mult*0.2);
            $gainWeight = ($BMR*$mult)+($BMR*$mult*0.2);
            $light = 'checked';
        }elseif ($activity == 'moderate')
        {
            $mult=1.65;
            $maintainWeight = $BMR*$mult;
            $loseWeight = ($BMR*$mult)-($BMR*$mult*0.2);
            $gainWeight = ($BMR*$mult)+($BMR*$mult*0.2);
            $moderate = 'checked';
        }elseif ($activity == 'heavy')
        {
            $mult=1.8;
            $maintainWeight = $BMR*$mult;
            $loseWeight = ($BMR*$mult)-($BMR*$mult*0.2);
            $gainWeight = ($BMR*$mult)+($BMR*$mult*0.2);
            $heavy = 'checked';
        }else {
            $mult=2;
            $maintainWeight = $BMR*$mult;
            $loseWeight = ($BMR*$mult)-($BMR*$mult*0.2);
            $gainWeight = ($BMR*$mult)+($BMR*$mult*0.2);
            $veryHeavy = 'checked';
        }


        return view('Calculators.calorieIntakeView',[
            'age' =>  $request->age,
            'gender' =>  $request->gender,
            'weight' =>  $request->weight,
            'height' =>  $request->height,
            'activity' =>  $request->activity,
            'maintainWeight'=> round($maintainWeight),
            'loseWeight' => round($loseWeight),
            'gainWeight' => round($gainWeight),
            'veryLight' => $veryLight,
            'light' => $light,
            'moderate' => $moderate,
            'heavy' => $heavy,
            'veryHeavy' => $veryHeavy,
            'man' => $man,
            'woman' => $woman
        ] );
    }

    public function calculateRequiredWater(Request $request)
    {

        $this->validate($request, [
            'weight' => 'required',
            'age' => 'required',
        ]);

        $weight= $request->weight;
        $age = $request->age;
        $activity = $request->activity;

        $reqWater = ($weight/2.2);
        if ($age < 30){
            $reqWater = (($weight)*40)/28.3*0.02;
        }elseif ($age >= 30  && $age < 55){
            $reqWater = (($weight)*35)/28.3*0.02;
        }else{
            $reqWater = (($weight)*30)/28.3*0.02;
        }

        if (is_null($request->activity)){
            return view('Calculators.requiredWaterView',[
                'age' =>  $request->age,
                'weight' =>  $request->weight,
                'activity' => $activity,
                'water' => $reqWater
            ] );
        }else
        {
            $reqWater = $reqWater+ ($activity * 0.0118);
        }

        return view('Calculators.requiredWaterView',[
            'age' =>  $request->age,
            'weight' =>  $request->weight,
            'activity' => $activity,
            'water' => round($reqWater,2)
        ] );
    }


}
