@extends('partials._navbar')
@section('content')

    <div class="container-fluid" style="max-width: 1500px" >
        <div class="row justify-content-center mt-3" >
            <div class=" row col-12">
                <h2>Pratimai</h2>
                <a class="btn btn-primary" href="{{ route('openRecipeListView', $categoryID) }}" style="margin-left: 15px"> Atgal</a>
            </div>
        </div>



        <div class="container text-center mt-2">
            <div class="">
                <H1>{{$recipe->recipeName}}</H1>
                <img src="{{$recipe->image}}" class="img-fluid">
            </div>


            <table  id="myTable" class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Kiekis</th>
                    <th>Baltymai</th>
                    <th>Riebalai</th>
                    <th>Angliavandeniai</th>
                </tr>
                </thead>

                <tbody id="myTableBody">
                @for ($i = 0; $i < count($quantity); $i++)
                    <tr>
                        <th>{{$i+1}}</th>
                        <th>{{$ingredID[$i]->name}} </th>
                        <th>{{$quantity[$i]}} </th>

                    </tr>
                @endfor

                </tbody>

                <tfoot>
                <tr style="background-color: lightgray; color: #a52a2a;" >
                    <th>Viso</th>
                    <th></th>
                    <th id="quantity"></th>
                    <th id="proteins"></th>
                    <th id="fats"></th>
                    <th id="carbs"></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

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
                <a href="{{action('ExercisesController@deleteExercise', ['id'=>$recipe->id])}}" class="btn btn-danger">Šalinti</a>
                <a href="{{route('openEditExerciseView', $recipe->id)}}" class="btn btn-secondary">Redaguoti</a>
            @endif
        </div>
    </div>





@endsection
