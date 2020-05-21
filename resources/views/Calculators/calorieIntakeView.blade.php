@extends('partials._navbar')
@section('content')
    <form action="{{ route('reqCalories') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="row mt-4">
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amžius:</strong>
                    <input type="text" value="{{$age ?? ''}}" name="age" class="form-control">
                </div>
            </div>


            <radio class=" col-xs-12 col-sm-12 col-md-12">
                <input type="radio" name="gender" value="Man"{{$man ?? ''}}/>Vyras
                <input type="radio" name="gender" value="Woman" {{$woman ?? ''}}/>Moteris
            </radio>

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


            <radio class=" col-xs-12 col-sm-12 col-md-12">
                <input type="radio" name="activity" value="veryLight" {{$veryLight ?? ''}}/>Labai mažas
                <input type="radio" name="activity" value="light" {{$light ?? ''}}/>Mažas
                <input type="radio" name="activity" value="moderate" {{$moderate ?? ''}}/> Vidutinis
                <input type="radio" name="activity" value="heavy" {{$heavy ?? ''}}/>Aukštas
                <input type="radio" name="activity" value="veryHeavy" {{$veryHeavy ?? ''}}/>Labai aukštas
            </radio>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    <div class="col-sm mt-5" style="text-align: center">
        <h2>Kiek reikia kalorijų?</h2>
        <span class= "index">Norint palaikyti svorį: {{$maintainWeight ?? '----'}}</span><br>
        <span class="index" >Norint priaugti svorio: {{$loseWeight ?? '----'}}</span><br>
        <span class="index" >Norint numesti svorio: {{ $loseWeight ?? '----'}}</span><br>
@endsection
