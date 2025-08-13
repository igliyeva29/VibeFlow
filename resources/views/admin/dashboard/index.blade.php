@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <table class="table table-bordered my-4 text-center">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>Email address</th>
                    <th>Isntagram profile</th>
                    <th>Tiktok profile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($places as $place)
                    <tr>
                        <td>{{ $place->title}}</td>
                        <td>{{ $place->category->name}}</td>
                        <td>{{ $place->location->name}}</td>
                        <td>{{ $place->address}}</td>
                        <td>{{ $place->phone_number}}</td>
                        <td>{{ $place->email_address}}</td>
                        <td>{{ $place->instagram_profile}}</td>
                        <td>{{ $place->tiktok_profile}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $places->links('pagination::bootstrap-5') }}
    </div>
@endsection