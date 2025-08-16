@extends('admin.layouts.app')

@section('content')

<div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            <a href="{{ route('admin.places.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a>
            @lang('app.create', ['name' => 'place'])
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('admin.places.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="category" class="form-label">@lang('app.category'):<span
                                    class="text-danger">*</span></label>
                            <select id="category" name="categoryId"
                                class="form-select @error('categoryId') is-invalid @enderror" required>
                                <option value="">-</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->getName() }}">
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}" {{ old('categoryId') == $child->id ? 'selected' : '' }}>
                                                {{ $child->getName() }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="title" class="form-label">@lang('app.title'):<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="titleTm" class="form-label"><span class="text-primary"><i
                                        class="bi bi-translate"></i> tm</span> @lang('app.title'):</label>
                            <input type="text" class="form-control @error('titleTm') is-invalid @enderror" id="titleTm"
                                name="titleTm" value="{{ old('titleTm') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="titleRu" class="form-label"><span class="text-primary"><i
                                        class="bi bi-translate"></i> ru</span> @lang('app.title'):</label>
                            <input type="text" class="form-control @error('titleRu') is-invalid @enderror" id="titleRu"
                                name="titleRu" value="{{ old('titleRu') }}">
                        </div>
                       <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="location" class="form-label">@lang('app.location'):<span
                                    class="text-danger">*</span></label>
                            <select id="loaction" name="locationId" class="form-select @error('locationId') is-invalid @enderror"
                                required>
                                <option value="">-</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" {{ old('locationId') == $location->id ? 'selected' : '' }}>
                                        {{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="address" class="form-label"> @lang('app.address'):<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" value="{{ old('address') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="phoneNumber" class="form-label"> @lang('app.phoneNumber'):<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber"
                                name="phoneNumber" value="{{ old('phoneNumber') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="emailAddress" class="form-label"> @lang('app.emailAddress'):</label>
                            <input type="text" class="form-control @error('emailAddress') is-invalid @enderror" id="emailAddress"
                                name="emailAddress" value="{{ old('emailAddress') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="instagramProfile" class="form-label"> @lang('app.instagramProfile'):</label>
                            <input type="text" class="form-control @error('instagramProfile') is-invalid @enderror" id="instagramProfile"
                                name="instagramProfile" value="{{ old('instagramProfile') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="tiktokProfile" class="form-label"> @lang('app.tiktokProfile'):</label>
                            <input type="text" class="form-control @error('tiktokProfile') is-invalid @enderror" id="tiktokProfile"
                                name="tiktokProfile" value="{{ old('tiktokProfile') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="image" class="form-label">@lang('app.image'):<span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">@lang('app.submit')</button>
                </form>
            </div>
        </div>
    </div>
@endsection