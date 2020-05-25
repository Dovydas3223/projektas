@extends('partials._navbar')
@section('content')


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


    <div class="container-fluid" style="max-width: 1500px" >
    <div class="row justify-content-center mt-3" >
        <div class=" row col-10">
            <h2>Kategorijos valdymas</h2>
        </div>
        <div class="row col-2">
            <a  onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger" >Šalinti</a>
        </div>
    </div>

    <form class="mt-3" action="{{ route('updateExerciseCategory', $categoryID) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type='file' name='image' >
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pavadinimas:</strong>
                    <input type="text" name="name" class="form-control" value="{{old('name', $name)}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aprašymas:</strong>
                    <textarea class="form-control" style="height:150px" name="detail"
                    >{{old('detail', $description)}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" style="width: 150px" class="btn btn-primary">Išsaugoti</button>
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
