@extends('partials._navbar')

@section('content')


    <div class="row justify-content-around mt-3" >
        <h2 class="col-4">Straipsnių kategorijos</h2>
        <a href="{{route('artCategoryCreate')}}" class="btn btn-success col-xs-4" >Pridėti kategoriją</a>
    </div>


    @for ($i = 0; $i < count($categorys); $i=$i+3)
        <div class=" w3-row-padding d-flex justify-content-center mt-5">

            @if($i<count($categorys))
                <div class=" w3-hover-opacity w3-quarter w3-container w3-margin-bottom text-center " style="">
                    <a href="{{route('openArticleListView', $categorys[$i])}}" style="text-decoration: none">
                        <div class=" w3-container w3-white  embed-responsive w3-padding-16" >
                            <img src='{{$categorys[$i] -> image}}'  class="rounded mx-auto d-block w3-image" style="width: 300px;
                 height: 300px; object-fit: cover ">
                            <a type="button" class="btn btn-primary"  href='{{route('openArtCategoryView', $categorys[$i] -> id)}}'>Redaguoti</a>
                            <a type="button"  class="btn btn-danger"onclick="return confirm('Ar tikrai norite šalinti?')" href='{{route('deleteCategory', $categorys[$i] -> id)}}'>Šalinti</a>
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
                            <a type="button" class="btn btn-primary"  href='{{route('openArtCategoryView', $categorys[$i+1] -> id)}}'>Redaguoti</a>
                            <a type="button"  class="btn btn-danger"onclick="return confirm('Ar tikrai norite šalinti?')" href='{{route('deleteCategory', $categorys[$i+1] -> id)}}'>Šalinti</a>
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
                            <a type="button" class="btn btn-primary" href='{{route('openArtCategoryView', $categorys[$i+2] -> id)}}'>Redaguoti</a>
                            <a type="button"  class="btn btn-danger"onclick="return confirm('Ar tikrai norite šalinti?')" href='{{route('deleteCategory', $categorys[$i+2] -> id)}}'>Šalinti</a>
                            <h4><b>{{$categorys[$i+2]->categoryName}}</b></h4>
                            <p>{{$categorys[$i+2]->description}}</p>
                        </div>
                    </a>
                </div>
            @endif


        </div>

    @endfor



@endsection
