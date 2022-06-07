@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="">
                            <label class="form-label" for="email">Title</label>
                            <input type="email" class="form-control" id="email" placeholder="Your email">
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <div class="">
                            <label class="form-label" for="email">Tip</label>
                            <input type="email" class="form-control" id="email" placeholder="Your email">
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <div class="">
                            <label class="form-label" for="email">Summary</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <div class="">
                            <label class="form-label" for="cardholder">Description</label>
                            <textarea type="text" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <label class="form-label" for="input_file">Choose file</label>
                        <input type="file" class="form-control" id="input_file" placeholder="Your email">
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-custom-neutral">Save</button>
                    <button type="submit" class="btn btn-custom-primary">Post blog</button>
                    <div
                        class="d-flex align-items-center justify-content-center text-center mt-5 mb-2 text-muted text-sm">
                        <i class="bi bi-lock me-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
@endsection
