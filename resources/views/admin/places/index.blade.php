@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="d-flex justify-content-between mt-4 mb-3">
            <div class="h4">
                @lang('app.places')
            </div>
            <a href="{{ route('admin.places.create') }}" class="btn btn-primary me-0">
                <i class="bi bi-plus-circle me-1"></i> @lang('app.addNewPlace')
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover border border-1 rounded-2 shadow-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center"><i class="bi bi-hash me-1"></i> @lang('app.id')</th>
                                <th scope="col" class="text-center"><i class="bi bi-image me-1"></i> @lang('app.image')</th>
                                <th scope="col" class="text-center"><i class="bi bi-text-left me-1"></i> @lang('app.title')
                                </th>
                                <th scope="col" class="text-center"><i class="bi bi-tags me-1"></i> @lang('app.details')
                                </th>
                                <th scope="col" class="text-center"><i class="bi bi-globe me-1"></i>
                                    @lang('app.contactInformation')</th>
                                <th scope="col" class="text-center"><i class="bi bi-calendar-event me-1"></i>
                                    @lang('app.dates')</th>
                                <th scope="col" class="text-center"><i class="bi bi-gear me-1"></i> @lang('app.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($places as $place)
                                <tr>
                                    <th scope="row" class="align-middle text-center">{{ $places->firstItem() + $loop->index }}
                                    </th>
                                    <td class="align-middle text-center col-2">
                                        <img src="{{ asset($place->image ? 'storage/' . $place->image : 'img/places/defult.jpg') }}"
                                            class="img-fluid" alt="{{ $place->getTitle() }}">
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td class="fw-semibold">EN</td>
                                                <td>{{ $place->title ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">TM</td>
                                                <td>{{ $place->title_tm ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">RU</td>
                                                <td>{{ $place->title_ru ?: '-' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td><i class="bi bi-bookmark me-1"></i> {{ $place->category->getName() }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-map me-1"></i> {{ $place->location->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-geo-alt me-1"></i> {{ $place->address }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td><i class="bi bi-telephone me-1"></i> {{ $place->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-envelope me-1"></i> {{ $place->email_address }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-instagram me-1"></i> {{ $place->instagram_profile }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-tiktok me-1"></i> {{ $place->tiktok_profile }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td>{{ $place->created_at->format('d.m.Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $place->updated_at->format('d.m.Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $place->user->name }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.places.show', $place->id) }}" class="btn btn-success m-1">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.places.edit', $place->id) }}" class="btn btn-warning m-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>
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
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Kapat"></button>
                                </div>
                                <div class="modal-body">
                                    <p id="deleteMessage">Are you sure you want to delete this item?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        @lang('app.cancel')
                                    </button>
                                    <button type="button" class="btn btn-danger" id="confirmDelete">@lang('app.delete')
                                    </button>
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
            </div>
        </div>
        <div class="mt-3 mb-5">
            {{ $places->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection