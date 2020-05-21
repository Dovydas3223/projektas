@extends('partials._navbar')
@section('content')

    <form action="{{ route('calcKMI') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ūgis (cm):</strong>
                    <input type="text" name="height" value="{{$height ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Svoris (kg):</strong>
                    <input type="text" value="{{$weight ?? ''}}" name="weight" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

            <div class="col-sm mt-5" style="text-align: center">
        <h5>Kūno masės skaičiavimas</h5>
        <span class= "index" style=" color: {{$color ?? ''}}">{{$KMI ?? '----'}}</span><br>
        <span class="size" style=" color: {{$color ?? ''}}">{{$text ?? ''}}</span>
    </div>

@endsection
