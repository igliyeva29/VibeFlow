<form action="{{ route('places.index', array_merge(request()->query())) }}" method="get" class="mb-5">
    @foreach (request()->query() as $key => $value)
        @if (!in_array($key, ['', 'brandModel', 'color', 'minPrice', 'maxPrice', 'saleProducts', 'topProducts']))
            @if (is_array($value))
                @foreach ($value as $val)
                    <input type="hidden" name="{{ $key }}[]" value="{{ $val }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endif
    @endforeach
</form>