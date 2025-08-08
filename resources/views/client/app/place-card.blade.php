<div class="col">
    <div
        class="card h-100  border shadow-sm">
        <a href="{{ route('places.show', [$obj->slug]) }}" class="text-decoration-none">
            <img src="{{asset($obj->image ?: 'img/places/defult.jpg') }}" class="card-img-top p-3" alt="{{ $obj->getTitle() }}">
            <div class="card-body d-flex flex-column">
                <div class="card-title h5 fw-semibold ">{{ $obj->getTitle() }}
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning small me-1">
                        @for ($i = 0; $obj->rating > $i; $i++)
                        <i class="bi bi-star-fill"></i>
                        @endfor
                        @for ($j = 0; $j < 5 - $obj->rating; $j++)
                        <i class="bi bi-star"></i>
                        @endfor
                    </span>
                    <span class="small text-muted">{{ $obj->rating }}</span>
                    <span class="small text-muted ms-3"><i class="bi bi-eye"></i> {{ $obj->viewed }}</span>
                </div>
            </div>
        </a>
    </div>
</div>