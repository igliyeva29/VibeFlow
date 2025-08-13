@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            <a href="{{ route('admin.places.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a>
            @lang('app.edit', ['name' => 'place'])
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div action="{{ route('admin.places.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="category" class="form-label">@lang('app.category') :</label>
                        <select id="category" name="categoryId" class="form-select">
                            <option value="">-</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" {{ $parent->id == $category->parent_id ? 'selected' : '' }}>
                                    {{ $parent->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label"> {{ __('app.subcategory') . " / " . __('app.category') }}<span
                                class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="nameTm" class="form-label">
                            <span class="text-primary"><i class="bi bi-translate"></i> tm</span>
                            {{ __('app.subcategory') . " / " . __('app.category') }}
                        </label>
                        <input type="text" class="form-control" id="nameTm" name="nameTm" value="{{ $category->name_tm }}">
                    </div>

                    <div class="mb-3">
                        <label for="nameRu" class="form-label">
                            <span class="text-primary"><i class="bi bi-translate"></i> ru</span>
                            {{ __('app.subcategory') . " / " . __('app.category') }}
                        </label>
                        <input type="text" class="form-control" id="nameRu" name="nameRu" value="{{ $category->name_ru }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"> @lang('app.title')<span class="text-danger">*</span> :
                        </label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"><span class="text-primary"><i class="bi bi-translate"></i>
                                tm</span> @lang('app.titleTm') : </label>
                        <input type="text" class="form-control" id="titleTm" name="titleTm">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"><span class="text-primary"><i class="bi bi-translate"></i>
                                ru</span> @lang('app.titleRu') : </label>
                        <input type="text" class="form-control" id="titleRu" name="titleRu">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="category" class="form-label">@lang('app.location')<span class="text-danger">*</span> :
                    </label>
                    <select id="category" name="categoryId" class="form-select">
                        <option value="">-</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"> @lang('app.address')<span class="text-danger">*</span> :
                    </label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"> @lang('app.phoneNumber')<span class="text-danger">*</span> :
                    </label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"> @lang('app.emailAddress') </label>
                    <input type="text" class="form-control" id="emailAddress" name="emailAddress">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"> @lang('app.instagramProfile') </label>
                    <input type="text" class="form-control" id="instagramProfile" name="instagramProfile">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"> @lang('app.tiktokProfile') </label>
                    <input type="text" class="form-control" id="tiktokProfile" name="tiktokProfile">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary w-100">{{ __('app.submit') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection