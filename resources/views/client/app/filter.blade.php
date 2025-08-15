<form action="{{ route('places.index', array_merge(request()->query())) }}" method="get" class="mb-5">
    @foreach (request()->query() as $key => $value)
        @if (!in_array($key, ['category']))
            @if (is_array($value))
                @foreach ($value as $val)
                    <input type="hidden" name="{{ $key }}[]" value="{{ $val }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endif
    @endforeach

    <div class="mb-3">
        <label for="category" class="form-label">Category:</label>
        <select id="category" name="category" class="form-select">
            <option value="">-</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $f_category ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('places.index') }}" class="btn btn-secondary"><i class="bi bi-x"></i> Reset</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>