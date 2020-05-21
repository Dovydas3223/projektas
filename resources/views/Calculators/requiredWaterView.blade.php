@extends('partials._navbar')
@section('content')


    <form action="{{ route('reqWater') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="row mt-4">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amžius:</strong>
                    <input type="text" value="{{$age ?? ''}}" name="age" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Svoris (kg):</strong>
                    <input type="text" value="{{$weight ?? ''}}" name="weight" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aktyvumas:</strong>
                    <input type="text" name="activity" value="{{$activity ?? ''}}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    <div class="col-sm mt-5" style="text-align: center">
        <h2>Reikalingas vanduo</h2>
        <span class= "index">{{$water ?? '----'}}</span><br>

    </div>


@endsection
