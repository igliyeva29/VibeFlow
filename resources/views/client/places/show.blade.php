@extends('client.layouts.app')
@section('title', 'Place |')

@section('content')
    <div class="container-xxl place-detail-section mb-5 py-4">
        <div class="row gx-4">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="main-image-display border rounded-3 p-3 text-center shadow-sm">
                    <img src="{{ asset($place->image ?: 'img/places/defult.jpg') }}" class="img-fluid product-main-img"
                        alt="{{ $place->getTitle() }}">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="product-info bg-white rounded-3 p-4 shadow-sm h-100">
                    <h1 class="mb-2 fw-bold">{{ $place->getTitle() }}</h1>

                    <div class="d-flex align-items-center mb-3">

                        <div class="d-flex align-items-center">
                            <span class="fs-5 text-warning me-1">
                                @for ($i = 0; $place->rating > $i; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                                @for ($j = 0; $j < 5 - $place->rating; $j++)
                                    <i class="bi bi-star"></i>
                                @endfor
                            </span>
                            <span class=" text-muted">({{ $place->rating }})</span>
                        </div>
                        <span class="text-muted fw-semibold ms-3"><i class="bi bi-eye"></i> {{ $place->viewed }}</span>
                    </div>

                    <table class="table  table-border">
                        <tr>
                            <td class="fw-bolder">@lang('app.category'): </td>
                            <td>{{ $place->category->parent->getName() . ' / ' . $place->category->getName() }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.location'): </td>
                            <td>{{ $place->location->name }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.address'): </td>
                            <td>{{ $place->address}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.phoneNumber'): </td>
                            <td>{{ $place->phone_number}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.emailAddress'): </td>
                            <td>{{ $place->email_address}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.isntagramProfile'): </td>
                            <td>{{ $place->instagram_profile}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.tiktokProfile'): </td>
                            <td>{{ $place->tiktok_profile}}</td>
                        </tr>
                    </table>

                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-lg py-3"><i class="bi bi-heart-fill me-2"></i>
                            {{ __('app.like') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl">
        <div class="h2 mb-4 text-dark">@lang('app.similarPlaces') </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4 mb-5">
            @foreach ($similarPlaces as $obj)
                @include('client.app.place-card')
            @endforeach
        </div>
    </div>
@endsection