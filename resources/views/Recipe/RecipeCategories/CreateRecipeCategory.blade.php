@extends('partials._navbar')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pridėti naują receptų kategoriją</h2>
            </div>
            <div class="pull-right mt-3">
                <a class="btn btn-primary" href="{{ route('openRecipeCategoryView') }}"> Atgal</a>
            </div>
        </div>
    </div>

    <form class="mt-3" action="{{ route('createRecipeCategory') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type='file' name='image' >
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naujos kategorijos pavadinimas:</strong>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Pavadinimas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aprašymas:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Trumpas Aprašymas"
                    >{{old('detail')}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Išsaugoti</button>
            </div>
        </div>

    </form>
@endsection
