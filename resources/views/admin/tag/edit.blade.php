@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="col-md-9" action="{{ route('admin.tags.update',$tag) }}" method="POST"
                  enctype="multipart/form-data">
                <div class="header-custom-medium mb-5">Edit tag</div>
                @method('PUT')
                @csrf

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" value="{{ $tag->name, old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label class="form-label" for="title">Color Style</label>
                            <select class="form-select" name="style_class">
                                <option selected>Select tag</option>
                                @foreach($availableTagColors as $tagColor)
                                    <option value="{{ $tagColor }}"
                                            @if($tagColor === $tag->style_class) selected @endif>{{ $tagColor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container mt-5 text-center">
                    <button type="submit" class="btn btn-custom-warning mx-2">Update tag</button>
                </div>
            </form>
        </div>
@endsection

