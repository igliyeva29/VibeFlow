@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="d-flex justify-content-between mt-4 mb-3">
            <div class="h4">
                @lang('app.places')
            </div>
            <div>
                <a href="{{ route('admin.places.create') }} " class="btn btn-primary">+ @lang('app.addNewPlace') </a>
            </div>
        </div>

        <table class="table table-bordered text-center">
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
                    <th>Updated at</th>
                    <th>@lang('app.settings') <i class="bi bi-gear-fill"></i></th>
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
                        <td>{{ $place->updated_at}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.places.edit', $place->id) }}" class="btn btn-warning m-1"> <i
                                        class="bi bi-pencil"></i> </a>

                                <button type="button" class="btn btn-danger m-1 delete-btn" data-id="{{ $place->id }}"
                                    data-name="{{ $place->title }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <form id="deleteForm" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                    </div>
                    <div class="modal-body">
                        <p id="deleteMessage">Are you sure you want to delete this item?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> @lang('app.cancel')
                        </button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">@lang('app.delete') </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deleteButtons = document.querySelectorAll('.delete-btn');
                const deleteForm = document.getElementById('deleteForm');
                const deleteMessage = document.getElementById('deleteMessage');
                let currentId = null;

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        currentId = this.getAttribute('data-id');
                        const placeName = this.getAttribute('data-name') || '';
                        deleteMessage.textContent = `Are you sure you want to delete "${placeName}"?`;
                        deleteForm.action = `/admin/places/${currentId}`;
                    });
                });

                document.getElementById('confirmDelete').addEventListener('click', function () {
                    deleteForm.submit();
                });
            });
        </script>
    </div>
    <div class="mt-3">
        {{ $places->links('pagination::bootstrap-5') }}
    </div>
@endsection