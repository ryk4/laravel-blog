@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mt-3 mb-5">
                    <div class="header-custom-medium">Manage Tags</div>
                </div>
                <div class="">
                    <table class="table mb-5">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Color class</th>
                            <th scope="col">No of uses</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $key => $tag)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $tag->name }}</td>
                                <td><span class="custom-tag {{ $tag->style_class }}">{{ $tag->style_class }}</span></td>
                                <td>{{ $tag->numberOfUses() }}</td>
                                <td class="">
                                    <a href="{{ route('admin.tags.edit', $tag) }}"
                                       class="btn btn-custom-warning mx-1"><span
                                            class="btn-custom-text">Edit</span></a>
                                    <a onclick="deleteConfirm('delete-tag-form-{{$tag->id}}')"
                                       class="btn btn-custom-danger mx-1"><span
                                            class="btn-custom-text">Delete</span></a>
                                    <form class="" id="delete-tag-form-{{$tag->id}}"
                                          action="{{ route('admin.tags.destroy', $tag) }}"
                                          method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr/>
            <form class="col-md-12 mt-3 mb-5" action="{{ route('admin.tags.store') }}" method="POST"
                  enctype="multipart/form-data">
                <div class="header-custom-medium">Create Tag</div>

                @method('POST')
                @csrf

                <div class="row mt-1">
                    <div class="col-md-4">
                        <div class="">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <label class="form-label" for="title">Color Style</label>
                            <select class="form-select" name="style_class">
                                @foreach($availableTagColors as $tag)
                                    <option value="{{ $tag }}">{{ $tag }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-custom-warning mt-4">
                            <span class="btn-custom-text">Create tag</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
