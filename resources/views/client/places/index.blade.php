@extends('client.layouts.app')
@section('title', 'Places |')
@section('content')
    <div class="container-xxl mb-5 py-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @forelse ($places as $obj)
                @include('client.app.place-card')
            @empty
                <div class="display-4 text-center mx-auto my-5">
                    @lang('app.placeNotFound')
                </div>
            @endforelse
        </div>
    </div>
    <div class="mt-3">
        {{ $places->links('pagination::bootstrap-5') }}
    </div>
    </div>

@endsection