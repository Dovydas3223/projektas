@extends('partials._navbar')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pridėti aprašą</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('createRecipe', ['categoryID'=>$categoryID]) }}" method="POST"  enctype="multipart/form-data">
        @csrf

        @if (!is_null($ingredList))
            @foreach($ingredList as $ingred)
                <input hidden name="ingredList[]" value="{{$ingred}}" >
            @endforeach

            @foreach($quantityList as $quantity)
                <input hidden  name="quantity[]" value="{{$quantity}}" >
            @endforeach
        @endif


        <div class="form-group">
            <label>Pridėti nuotrauką</label>
            <input type='file' required name='image' >
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Recepto pavadinimas:</strong>
                    <input type="text" required name="name" class="form-control" placeholder="Pavadinimas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aprašymas:</strong>
                    <textarea class="form-control" required placeholder="Gaminimo eiga...
                    1. pirmas žingsnis
                    2. anras žingsnis
                    3. ...
" style="height:150px" name="detail"
                              value={{old('detail')}}  ></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Trumpas aprašymas:</strong>
                    <textarea class="form-control" placeholder="Trumpas pristatymas..." style="height:150px" name="shortDetail"
                              value={{old('shortDetail')}} ></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@endsection
