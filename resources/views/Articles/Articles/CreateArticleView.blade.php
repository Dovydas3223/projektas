@extends('partials._navbar')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prid4ti naują straipsnį</h2>
            </div>
            <div class="pull-right mt-3">
                <a class="btn btn-primary" href="{{ route('openArticleListView', $categoryID) }}"> Atgal</a>
            </div>
        </div>
    </div>

    <form class="mt-3" action="{{ route('createArticle', $categoryID) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type='file' name='image' >
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Straipsnio pavadinimas:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Pavadinimas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aprašymas:</strong>
                    <textarea class="form-control" style="height:150px" name="detail"
                              value={{old('detail')}} ></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Išsaugoti</button>
            </div>
        </div>

    </form>
@endsection
