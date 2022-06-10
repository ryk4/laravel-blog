@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-9" action="{{ route('blogs.store') }}" method="POST">
                @csrf

                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="">
                            <label class="form-label" for="email">Title</label>
                            <input class="form-control" id="email" name="title">
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="">
                            <label class="form-label" for="email">Tip</label>
                            <input class="form-control" id="email" name="tip">
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="">
                            <label class="form-label" for="email">Summary</label>
                            <input class="form-control" id="email" name="summary">
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="">
                            <label class="form-label" for="cardholder">Description</label>
                            <textarea type="text" class="form-control" rows="3" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <label class="form-label" for="input_file">Choose file</label>
                        <input type="file" class="form-control" id="input_file">
                    </div>
                    <blog-create-editor></blog-create-editor>
                </div>
                <div class="container mt-5">
                    <button class="btn btn-custom-neutral">Save</button>
                    <button type="submit" class="btn btn-custom-primary">Post blog</button>
                    <div
                        class="d-flex align-items-center justify-content-center text-center mt-5 mb-2 text-muted text-sm">
                        <i class="bi bi-lock me-2"></i>
                    </div>
                </div>
            </form>
        </div>
@endsection

