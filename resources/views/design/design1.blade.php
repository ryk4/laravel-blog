@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="mt-3 mb-0 text-muted mx-3">
                    <a href="#" class="filter-option text-muted">All</a>
                    <a href="#" class="filter-option text-muted">Laravel</a>
                    <a href="#" class="filter-option text-muted">Livewire</a>
                    <a href="#" class="filter-option text-muted">Vue</a>
                    <hr class="mt-1">
                </div>
                <div class="row mt-4">
                    @for($i =0;$i<3;$i++)
                        <div class="col-4 d-flex justify-content-center m-0">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/images/img1.png" class="card-img-top" alt="...">
                                <div class="m-2">
                                    <span class="badge rounded-pill bg-primary">Primary</span>
                                    <span class="badge rounded-pill bg-secondary">Secondary</span>
                                    <span class="badge rounded-pill bg-success">Success</span>
                                    <span class="badge rounded-pill bg-danger">Danger</span>
                                    <span class="badge rounded-pill bg-warning text-dark">Warning</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Card title</h5>
                                    <p class="card-text text-muted">Some quick example text to build on the card title
                                        and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-custom-primary">Read full article</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
