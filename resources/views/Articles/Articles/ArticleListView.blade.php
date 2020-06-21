@extends('partials._navbar')


@section('content')

    <div class="container-fluid" style="max-width: 1500px" >



        <div class="row pt-5" >
            <h2 class="col-sm-10">{{$categoryName}}</h2>
            @if($userType == "Admin" || $userType == "RegisteredUser")
            <a href="{{route('openCreateArticleView', $categoryID)}}" class="btn btn-success col-sm-2" >Pridėti straipsnį</a>
            @endif
        </div>
        @for ($i = 0; $i < count($articles); $i=$i+3)
            <div class="w3-row-padding d-flex justify-content-center mt-5 text-center" >

                @if($i<count($articles))
                    <div class="w3-quarter w3-container w3-margin-bottom col-sm-4 ">
                        <a href="{{route('openArticleDescView', $articles[$i])}}" style="text-decoration: none">
                            <div class="w3-container w3-white  embed-responsive w3-padding-16" >
                                <img src='{{$articles[$i] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                                <p><b>{{$articles[$i]->articleName}}</b></p>
                                <p>{{$articles[$i]->description}}</p>
                            </div>
                        </a>
                    </div>
                @endif
                @if($i+1<count($articles))
                    <div class="w3-quarter w3-container w3-margin-bottom col-sm-4">
                        <a href="/articleDesc/{{$articles[$i+1] -> id}}" style="text-decoration: none">
                            <div class="w3-container w3-white  embed-responsive w3-padding-16">
                                <img src='{{$articles[$i+1] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                                <p><b>{{$articles[$i+1]->articleName}}</b></p>
                                <p>{{$articles[$i+1]->description}}</p>
                            </div>
                        </a>
                    </div>
                @endif
                @if($i+2<count($articles))
                    <div class="w3-quarter w3-container w3-margin-bottom col-sm-4">
                        <a href="/articleDesc/{{$articles[$i+2] -> id}}" style="text-decoration: none">
                            <div class="w3-container w3-white  embed-responsive w3-padding-16">
                                <img src='{{$articles[$i+2] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                                <p><b>{{$articles[$i+2]->articleName}}</b></p>
                                <p>{{$articles[$i+2]->description}}</p>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        @endfor
    </div>
@endsection
