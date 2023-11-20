@extends('admin.layouts.app')

@section('content')
    <div class="container p-4">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark">Manage Experience</h2>
                </div>
            </div>
        </div>
        <!-- Table -->
        @if (session('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <div class="mb-4 rounded overflow-auto">
                <div>
                    <table class="table bg-white">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($stt = 1)
                            @foreach ($experiences as $experience)
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $experience->title }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#"
                                                class="p-2 rounded-circle text-success bg-light-success d-inline-flex align-items-center justify-content-center me-1"
                                                data-bs-toggle="modal" data-bs-target="#editExperienceModal"
                                                data-id="{{ $experience->id }}" data-title="{{ $experience->title }}">
                                                <i class="lni lni-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.experience.delete', ['id' => $experience->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="p-2 border-0 rounded-circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ms-1">
                                                    <i class="lni lni-close"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php($stt++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-success py-2 px-3 text-white" data-bs-toggle="modal" data-bs-target="#addExperienceModal">
                    Add Experience
                </a>
            </div>
        </div>
        <!-- Create Experience Modal -->
        <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addExperienceModalLabel">
                            Add New Experience
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.experience.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Experiences</label>
                                        <input class="form-control rounded" type="text" name="title" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save Type
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Experience Modal -->
        <div class="modal fade" id="editExperienceModal" tabindex="-1" aria-labelledby="editExperienceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editExperienceModalLabel">Edit Experience</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.experience.update') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="id" class="text-dark">ID</label>
                                        <input class="form-control rounded" type="number" name="id" id="id"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="type" class="text-dark">Title</label>
                                        <input class="form-control rounded" type="text" name="title" id="title" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
