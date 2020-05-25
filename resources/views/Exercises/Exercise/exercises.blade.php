@extends('partials._navbar')

@section('content')

<div class="container-fluid" style="max-width: 1500px" >



    <div class="row justify-content-center mt-3" >
        <div class=" row col-10">
            <h2>Pratimai</h2>
            <a class="btn btn-primary" href="{{ route('categ') }}" style="margin-left: 15px"> Atgal</a>
        </div>
        @auth('admin')
        <div class="row col-2">
            <a href="{{route('openCreateExerciseView', $categoryID)}}" class="btn btn-success" >Pridėti pratimą</a>
        </div>
        @endauth
    </div>

    @for ($i = 0; $i < count($exercises); $i=$i+3)
        <div class="w3-row-padding d-flex justify-content-center mt-5" >

            @if($i<count($exercises))
                <div class="w3-hover-opacity text-center w3-quarter w3-container w3-margin-bottom col-sm-4 ">
                    <a href="/exercisesDesc/{{$exercises[$i] -> id}}" style="text-decoration: none">
                        <div class="w3-container w3-white  embed-responsive w3-padding-16" >
                            <img src='{{$exercises[$i] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                            <p><b>{{$exercises[$i]->exerciseName}}</b></p>
                            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae
                                justo condimentum, porta lectus vitae, ultricies congue gravida
                                diam non fringilla.</p>
                        </div>
                    </a>
                </div>
            @endif

            @if($i+1<count($exercises))
                <div class="w3-quarter w3-container w3-margin-bottom col-sm-4">
                    <a href="/exercisesDesc/{{$exercises[$i+1] -> id}}" style="text-decoration: none">
                        <div class="w3-container w3-white  embed-responsive w3-padding-16">
                            <img src='{{$exercises[$i+1] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                            <p><b>{{$exercises[$i+1]->exerciseName}}</b></p>
                            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae
                                justo condimentum, porta lectus vitae, ultricies congue gravida
                                diam non fringilla.</p>
                        </div>
                    </a>
                </div>
            @endif

            @if($i+2<count($exercises))
                <div class="w3-quarter w3-container w3-margin-bottom col-sm-4">
                    <a href="/exercisesDesc/{{$exercises[$i+2] -> id}}" style="text-decoration: none">
                        <div class="w3-container w3-white  embed-responsive w3-padding-16">
                            <img src='{{$exercises[$i+2] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                            <p><b>{{$exercises[$i+2]->exerciseName}}</b></p>
                            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae
                                justo condimentum, porta lectus vitae, ultricies congue gravida
                                diam non fringilla.</p>
                        </div>
                    </a>
                </div>
            @endif
        </div>

    @endfor
    </div>


@endsection
