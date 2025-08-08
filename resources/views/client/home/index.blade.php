@extends('client.layouts.app')
@section('title', 'Home |')
@section('content')
    <div class="container-xxl mb-5 py-4">
        <div class="h2 mb-4 text-dark">@lang('app.cafes') </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach ($cafes as $obj)
                @include('client.app.place-card')
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-danger btn-lg fw-bold px-5">
                @lang('app.all') <i class="bi bi-tags-fill"></i>
            </a>
        </div>
    </div>

    <div class="container-xxl mb-5 py-4">
        <div class="h2 mb-4 text-dark">@lang('app.education') </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach ($education as $obj)
                @include('client.app.place-card')
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-danger btn-lg fw-bold px-5">
                @lang('app.all') <i class="bi bi-tags-fill"></i>
            </a>
        </div>
    </div>


    <div class="container-xxl mb-5 py-4">
        <div class="h2 mb-4 text-dark">@lang('app.shopping') </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach ($shopping as $obj)
                @include('client.app.place-card')
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-danger btn-lg fw-bold px-5">
                @lang('app.all') <i class="bi bi-tags-fill"></i>
            </a>
        </div>
    </div>
@endsection