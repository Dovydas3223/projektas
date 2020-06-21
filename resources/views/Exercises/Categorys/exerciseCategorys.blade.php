@extends('partials._navbar')

@section('content')
    <div class="container-fluid" style="max-width: 1500px" >

        <div class="row justify-content-center mt-3" >
            <div class=" row col-10">
                <h2>Pratimų kategorijos</h2>
            </div>

            <div class="row col-2">
                @if($userType == "Admin" )
                    <a href="{{route('openCreateExerCategory')}}" class="btn btn-success" >Pridėti kategoriją</a>
                @endif

            </div>

        </div>

    @for ($i = 0; $i < count($categorys); $i=$i+3)
        <div class="w3-row-padding d-flex justify-content-center mt-5">

            @if($i<count($categorys))
            <div class="w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center col-sm-4">
                <a href="/exercises/{{$categorys[$i] -> id}}" style="text-decoration: none">
                <div class="w3-container w3-white  embed-responsive w3-padding-16" >
                    <img src='{{$categorys[$i] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">

                    @if($userType == "Admin" )
                    <a type="button" class="btn btn-primary"  href='{{route('openEditExerciseCategoryView', $categorys[$i]->id)}}'>Redaguoti</a>
                    @endif
                    <h4><b>{{$categorys[$i]->categoryName}}</b></h4>
                    <p>
                        {{$categorys[$i]->description}}
                    </p>
                </div>
                </a>
            </div>
            @endif

            @if($i+1<count($categorys))
                    <div class="w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center col-sm-4">
                        <a href="/exercises/{{$categorys[$i+1] -> id}}" style="text-decoration: none">
                            <div class="w3-container w3-white  embed-responsive w3-padding-16" >
                                <img src='{{$categorys[$i+1] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                                @if($userType == "Admin" )
                                <a type="button" class="btn btn-primary"  href='{{route('openEditExerciseCategoryView', $categorys[$i+1] -> id)}}'>Redaguoti</a>
                                @endif
                                <h4><b>{{$categorys[$i+1]->categoryName}}</b></h4>
                                <p>
                                    {{$categorys[$i+1]->description}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endif

                @if($i+2<count($categorys))
                    <div class="w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center col-sm-4">
                        <a href="/exercises/{{$categorys[$i+2] -> id}}" style="text-decoration: none">
                            <div class="w3-container w3-white  embed-responsive w3-padding-16" >
                                <img src='{{$categorys[$i+2] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                                @if($userType == "Admin" )
                                <a type="button" class="btn btn-primary"  href='{{route('openEditExerciseCategoryView', $categorys[$i+2] -> id)}}'>Redaguoti</a>
                                @endif
                                <h4><b>{{$categorys[$i+2]->categoryName}}</b></h4>
                                <p>
                                    {{$categorys[$i+2]->description}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endif
        </div>

        @endfor
    </div>
@endsection
