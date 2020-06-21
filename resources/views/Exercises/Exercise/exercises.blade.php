@extends('partials._navbar')

@section('content')

<div class="container-fluid" style="max-width: 1500px" >



    <div class="row justify-content-center mt-3" >
        <div class=" row col-8">
            <h2>Pratimai</h2>
            <a class="btn btn-primary" href="{{ route('categ') }}" style="margin-left: 15px"> Atgal</a>
        </div>
        @if($userType == "Admin")
        <div class="row col-2">
            <a onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger" >Šalinti</a>
        </div>
        <div class="row col-2">
            <a href="{{route('openCreateExerciseView', $categoryID)}}" class="btn btn-success" >Pridėti pratimą</a>
        </div>
        @endif



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

<link href="{{ asset('css/DeleteMessage.css') }}" rel="stylesheet">
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" action="{{route('deleteExerciseCategory', $categoryID)}}">
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
