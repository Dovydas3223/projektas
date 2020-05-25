@extends('partials._navbar')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Redaguoti pratimą</h2>
            </div>
            <div class="pull-right mt-3">
                <a class="btn btn-primary" href="{{ route('exerciseDesc', $id) }}"> Atgal</a>
            </div>
        </div>
    </div>

    <form class="" action="{{ route('edit', ['id'=>$id]) }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="form-group mt-3">
            <input type='file' name='image' >
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pratimo pavadinimas:</strong>
                    <input type="text" name="name" class="form-control" value={{old('name', $name)}} >
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection





