@extends('partials._navbar')

@section('content')

    <div class="container-fluid" style="max-width: 1500px" >
        <div class="row justify-content-center mt-3" >
            <div class=" row col-10">
                <h2>Receptų kategorijos</h2>
            </div>

            <div class="row col-2">
                @if($userType == "Admin" )
                    <a href="{{route('openCreateRecipeCategoryView')}}" class="btn btn-success" >Pridėti kategoriją</a>
                @endif

            </div>

        </div>


        @for ($i = 0; $i < count($categories); $i=$i+3)
            <div class=" w3-row-padding d-flex justify-content-center mt-5">

                @if($i<count($categories))
                    <div class="w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center col-sm-4 " style="">
                        <a href="{{route('openRecipeListView', $categories[$i])}}" style="text-decoration: none">
                            <div class=" w3-container w3-white  embed-responsive w3-padding-16" >
                                <img src='{{$categories[$i] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                                @if($userType == "Admin")
                                    <a type="button" class="btn btn-primary"  href='{{route('openEditRecipeCategoryView', $categories[$i] -> id)}}'>Redaguoti</a>
                                @endauth
                                <h4><b>{{$categories[$i]->categoryName}}</b></h4>
                                <p>
                                    {{$categories[$i]->shortDescription}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endif

                @if($i+1<count($categories))
                    <div class="w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center col-sm-4">
                        <a href="{{route('openRecipeListView', $categories[$i+1])}}" style="text-decoration: none">
                            <div class="w3-container w3-white  embed-responsive w3-padding-16 ">
                                <img src='{{$categories[$i+1] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                                @if($userType == "Admin")
                                    <a type="button" class="btn btn-primary"  href='{{route('openEditRecipeCategoryView', $categories[$i+1] -> id)}}'>Redaguoti</a>
                                @endauth
                                <h4><b>{{$categories[$i+1]->categoryName}}</b></h4>
                                <p>{{$categories[$i+1]->shortDescription}}</p>
                            </div>
                        </a>
                    </div>

                @endif

                @if($i+2<count($categories))
                    <div class="w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center col-sm-4">
                        <a href="{{route('openRecipeListView', $categories[$i+2])}}" style="text-decoration: none">
                            <div class="w3-container w3-white  embed-responsive w3-padding-16 ">
                                <img src='{{$categories[$i+2] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">

                                @if($userType == "Admin")
                                    <a type="button" class="btn btn-primary" href='{{route('openEditRecipeCategoryView', $categories[$i+2] -> id)}}'>Redaguoti</a>
                                @endauth
                                <h4><b>{{$categories[$i+2]->categoryName}}</b></h4>
                                <p>{{$categories[$i+2]->shortDescription}}</p>
                            </div>
                        </a>
                    </div>
                @endif


            </div>

        @endfor
    </div>





@endsection
