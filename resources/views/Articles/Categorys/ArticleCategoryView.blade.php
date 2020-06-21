@extends('partials._navbar')

@section('content')


    <div class="row justify-content-center mt-3" >
        <div class=" row col-10">
            <h2>Pratimų kategorijos</h2>
        </div>

        <div class="row col-2">
            @if($userType == "Admin" || $userType == "RegisteredUser")
                <a href="{{route('artCategoryCreate')}}" class="btn btn-success" >Pridėti kategoriją</a>
            @endif

        </div>

    </div>


    @for ($i = 0; $i < count($categorys); $i=$i+3)
        <div class=" w3-row-padding d-flex justify-content-center mt-5">

            @if($i<count($categorys))
                <div class=" w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center " style="">
                    <a href="{{route('openArticleListView', $categorys[$i])}}" style="text-decoration: none">
                        <div class=" w3-container w3-white  embed-responsive w3-padding-16" >
                            <img src='{{$categorys[$i] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                            @if($userType == "Admin" || $userType == "RegisteredUser")
                                <a type="button" class="btn btn-primary"  href='{{route('openArtCategoryView', $categorys[$i] -> id)}}'>Redaguoti</a>
                                <a type="button"  class="btn btn-danger"onclick="return confirm('Ar tikrai norite šalinti?')" href='{{route('deleteCategory', $categorys[$i] -> id)}}'>Šalinti</a>
                            @endauth
                            <h4><b>{{$categorys[$i]->categoryName}}</b></h4>
                            <p>
                                {{$categorys[$i]->description}}
                            </p>
                        </div>
                    </a>
                </div>
            @endif

            @if($i+1<count($categorys))
                <div class=" w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center">
                    <a href="{{route('openArticleListView', $categorys[$i+1])}}" style="text-decoration: none">
                        <div class="w3-container w3-white  embed-responsive w3-padding-16 ">
                            <img src='{{$categorys[$i+1] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                            @if($userType == "Admin" || $userType == "RegisteredUser")
                                <a type="button" class="btn btn-primary"  href='{{route('openArtCategoryView', $categorys[$i+1] -> id)}}'>Redaguoti</a>
                                <a type="button"  class="btn btn-danger"onclick="return confirm('Ar tikrai norite šalinti?')" href='{{route('deleteCategory', $categorys[$i+1] -> id)}}'>Šalinti</a>
                            @endauth
                            <h4><b>{{$categorys[$i+1]->categoryName}}</b></h4>
                            <p>{{$categorys[$i+1]->description}}</p>
                        </div>
                    </a>
                </div>

            @endif

            @if($i+2<count($categorys))
                <div class="w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center">
                    <a href="{{route('openArticleListView', $categorys[$i+2])}}" style="text-decoration: none">
                        <div class="w3-container w3-white  embed-responsive w3-padding-16 ">
                            <img src='{{$categorys[$i+2] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">

                            @if($userType == "Admin" || $userType == "RegisteredUser")
                                <a type="button" class="btn btn-primary" href='{{route('openArtCategoryView', $categorys[$i+2] -> id)}}'>Redaguoti</a>
                                <a type="button"  class="btn btn-danger"onclick="return confirm('Ar tikrai norite šalinti?')" href='{{route('deleteCategory', $categorys[$i+2] -> id)}}'>Šalinti</a>
                            @endauth
                            <h4><b>{{$categorys[$i+2]->categoryName}}</b></h4>
                            <p>{{$categorys[$i+2]->description}}</p>
                        </div>
                    </a>
                </div>
            @endif


        </div>

    @endfor



@endsection
