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
            <form class="col-md-9" action="{{ route('admin.blogs.update',$blog) }}" method="POST"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" id="title" name="title"
                                   value="{{ old('title') ?? $blog->title }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label class="form-label" for="title">Tags</label>
                            <blog-create-select2 :old="{{ json_encode($blog->tags) }}"></blog-create-select2>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="">
                            <label class="form-label" for="tip">Tip</label>
                            <input class="form-control" id="tip" name="tip" value="{{ old('tip') ?? $blog->tip }}">
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="">
                            <label class="form-label" for="summary">Summary</label>
                            <textarea class="form-control" id="summary" name="summary" rows="3"
                                      value="{{ old('summary') ?? $blog->summary }}"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <label class="form-label" for="repository_url">Repository URL</label>
                        <input class="form-control" id="repository_url" name="repository_url"
                               value="{{ old('repository_url') ?? $blog->repository_url }}">
                    </div>
                    <div class="col-md-12 my-2">
                        <label class="form-label" for="image">Choose file (will override)</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                    </div>
                    <blog-create-editor old="{{ old('guide') ?? $blog->guide }}"></blog-create-editor>
                </div>
                <div class="container mt-5 mb-5 text-center">
                    <button type="submit" class="btn btn-custom-warning mx-2">Update blog</button>
                </div>
            </form>
        </div>
@endsection

