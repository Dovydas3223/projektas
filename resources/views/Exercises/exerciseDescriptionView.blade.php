@extends('partials._navbar')

@section('content')

    <div class="container text-center mt-2">
        <div class="">
            <H1>{{$exercise->exerciseName}}</H1>
            <img src="{{$exercise->image}}" class="img-fluid">
        </div>
        <div   >
            <H2 >Aprašymas</H2>

            <p class="text-left" style="width: 600px;position: relative; left: 100px">
                @foreach( $desc as $step )
                    <p class="text-left">
                        {{$step}}
                    </p>
                @endforeach
            </p>
        </div>

        <a href="{{action('ExercisesController@deleteExercise', ['id'=>$exercise->id])}}" class="btn btn-danger">Šalinti</a>
        <a href="{{action('ExercisesController@editExercise', ['id'=>$exercise->id])}}" class="btn btn-secondary">Redaguoti</a>

       </div>

@endsection


