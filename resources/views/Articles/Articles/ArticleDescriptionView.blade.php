@extends('partials._navbar')

@section('content')

    <link href="{{ asset('css/DeleteMessage.css') }}" rel="stylesheet">

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="{{action('ArticleController@deleteArticle', ['id'=>$article->id])}}">
            <div class="container">
                <h1>Kategorijos šalinimas</h1>
                <p>Ar tikrai norite šalinti šią kategoriją?</p>

                <div class="clearfix">
                    <button onclick="document.getElementById('id01').style.display='none'" type="button" class="cancelbtn">Atšaukti</button>
                    <button type="submit" class="deletebtn">Šalinti</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container-fluid" style="max-width: 1500px" >
        <div class="row justify-content-center mt-3" >
            <div class=" row col-12">
                <h2>Straipsniai</h2>
                <a class="btn btn-primary" href="{{ route('exercisesRoute', $categoryID) }}" style="margin-left: 15px"> Atgal</a>
            </div>
        </div>

        <div class="container text-center mt-2">
            <div class="">
                <H1>{{$article->articleName}}</H1>
                <img src="{{$article->image}}" class="img-fluid">
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


            @if($userType == "Admin" || $userType == "RegisteredUser")
                <a onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger" >Šalinti</a>
                <a href="{{route('openEditArticleView', $article->id)}}" class="btn btn-secondary">Redaguoti</a>
            @endif


        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection


