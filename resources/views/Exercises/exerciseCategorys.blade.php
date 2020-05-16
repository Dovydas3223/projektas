@extends('partials._navbar')

@section('content')

    @for ($i = 0; $i < count($categorys); $i=$i+3)
        <div class="w3-row-padding d-flex justify-content-center mt-5">

            @if($i<count($categorys))
            <div class="w3-quarter w3-container w3-margin-bottom ">
                <a href="https://www.w3schools.com">
                <div class="w3-container w3-white  embed-responsive w3-padding-16" >
                    <img src='{{$categorys[$i] -> image}}'  class="rounded mx-auto d-block" style="width: 300px;
                 height: 300px; object-fit: cover ">
                    <p><b>{{$categorys[$i]->categoryName}}</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae
                        justo condimentum, porta lectus vitae, ultricies congue gravida
                        diam non fringilla.</p>
                </div>
                </a>
            </div>
            @endif

            @if($i+1<count($categorys))
            <div class="w3-quarter w3-container w3-margin-bottom">
                <div class="w3-container w3-white  embed-responsive w3-padding-16">
                    <img src='{{$categorys[$i+1] -> image}}'  class="rounded mx-auto d-block" style="width: 300px;
                 height: 300px; object-fit: cover ">
                    <p><b>{{$categorys[$i+1]->categoryName}}</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae
                        justo condimentum, porta lectus vitae, ultricies congue gravida
                        diam non fringilla.</p>
                </div>
            </div>
                @endif

                @if($i+2<count($categorys))
            <div class="w3-quarter w3-container w3-margin-bottom">
                <div class="w3-container w3-white  embed-responsive w3-padding-16">
                    <img src='{{$categorys[$i+2] -> image}}'  class="rounded mx-auto d-block" style="width: 300px;
                 height: 300px; object-fit: cover ">
                    <p><b>{{$categorys[$i+2]->categoryName}}</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae
                        justo condimentum, porta lectus vitae, ultricies congue gravida
                        diam non fringilla.</p>
                </div>
            </div>
                @endif


        </div>

        @endfor

@endsection
