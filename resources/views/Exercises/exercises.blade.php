@extends('partials._navbar')

@section('content')
<div>
    {{ $categorys }}
</div>


<div class="w3-row-padding d-flex justify-content-center">
    <div class="w3-quarter w3-container w3-margin-bottom">
        <img src="https://i.pinimg.com/originals/b8/77/80/b8778012a3fcf7cc46ad6189803e34d4.jpg"  style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
            <p><b>{{ $categorys }}</b></p>S
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
    </div>
    <div class="w3-quarter w3-container w3-margin-bottom">
        <img src="https://i.pinimg.com/originals/b8/77/80/b8778012a3fcf7cc46ad6189803e34d4.jpg" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
    </div>
    <div class="w3-quarter w3-container">
        <a href="#">
            <img src="https://i.pinimg.com/originals/b8/77/80/b8778012a3fcf7cc46ad6189803e34d4.jpg" style="width:100%" class="w3-hover-opacity">
        </a>
        <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
    </div>
</div>
@endsection
