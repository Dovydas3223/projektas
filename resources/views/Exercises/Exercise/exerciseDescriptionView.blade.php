@extends('partials._navbar')

@section('content')
    <div class="container-fluid" style="max-width: 1500px" >
    <div class="row justify-content-center mt-3" >
        <div class=" row col-12">
            <h2>Pratimai</h2>
            <a class="btn btn-primary" href="{{ route('exercisesRoute', $categoryID) }}" style="margin-left: 15px"> Atgal</a>
        </div>
    </div>

    <div class="container text-center mt-2">
        <div class="">
            <H1>{{$exercise->exerciseName}}</H1>
            <img src="{{$exercise->image}}" class="img-fluid">
        </div>
        <div>
            <H2 >Aprašymas</H2>
            <p class="text-left" style="width: 600px;position: relative; left: 100px">
                @foreach( $desc as $step )
                    <p class="text-left">
                        {{$step}}
                    </p>
                @endforeach
            </p>
        </div>

        @if($userType == "Admin")
        <a href="{{action('ExercisesController@deleteExercise', ['id'=>$exercise->id])}}" class="btn btn-danger">Šalinti</a>
        <a href="{{route('openEditExerciseView', $exercise->id)}}" class="btn btn-secondary">Redaguoti</a>
        @endif
    </div>
    </div>
@endsection


