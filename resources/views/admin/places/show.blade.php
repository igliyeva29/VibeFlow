@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            <a href="{{ route('admin.places.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a>
            @lang('app.view') {{ $place->getTitle() }}
        </div>

        <table class="table table-striped table-hover border border-1 rounded-2 ">
            <tr>
                <td class="col-2">
                    <div>
                        <img src="{{ asset($place->image ? 'storage/' . $place->image : 'img/places/defult.jpg') }}"
                            class="card-img-top" alt="{{ $place->getTitle() }}">
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <span class="text-warning small me-1">
                            @for ($i = 0; $place->rating > $i; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                            @for ($j = 0; $j < 5 - $place->rating; $j++)
                                <i class="bi bi-star"></i>
                            @endfor
                        </span>
                        <span class="small text-muted">{{ $place->rating }}</span>
                        <span class="small text-muted ms-3"><i class="bi bi-eye"></i> {{ $place->viewed }}</span>
                    </div>
                </td>
                <td>
                    <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                        <tr>
                            <td>
                                <span class="fw-semibold">EN </span>{{ $place->title ?: '-' }}
                            </td>
                            <td>
                                <span class="fw-semibold">TM </span>{{ $place->title_tm ?: '-' }}
                            </td>

                            <td>
                                <span class="fw-semibold">RU </span>{{ $place->title_ru ?: '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-bookmark me-1"></i>
                                {{ $place->category->parent->getName() . ' / ' . $place->category->getName() }}</td>
                            <td><i class="bi bi-geo-alt me-1"></i> {{ $place->address}}</td>
                            <td><i class="bi bi-telephone me-1"></i> {{ $place->phone_number }}</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-envelope me-1"></i> {{ $place->email_address }}</td>
                            <td><i class="bi bi-instagram me-1"></i> {{ $place->instagram_profile }}</td>
                            <td><i class="bi bi-tiktok me-1"></i> {{ $place->tiktok_profile }}</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-clock me-1"></i> {{ $place->created_at->format('d.m.Y H:i') }}</td>
                            <td><i class="bi bi-clock me-1"></i> {{ $place->updated_at->format('d.m.Y H:i') }}</td>
                            <td><i class="bi bi-person me-1"></i> {{ $place->user->name }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
@endsection