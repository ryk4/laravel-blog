@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="mb-0 mx-3">
                    <img src="assets/images/bg-img.png" class="card-img-top" alt="...">
                </div>
                <div class="mb-0 row justify-content-center">
                    <div class="col-12 text-center avatar-section">
                        <img src="assets/images/img-avatar.png" class="card-img-top">
                    </div>
                    <div class="col-12 text-center text-custom-title">
                        Average Developer
                    </div>
                </div>
                <div class="mb-0 mt-2 row justify-content-center">
                    <div class="col-6 text-center text-custom-small">
                        Hey guys here you can find all the products and items I own and use myself daily. If L l you are
                        interested in any of them,support me and grab them while they are available!!
                    </div>
                </div>
                <div class="mb-0 mt-3 mx-3 header-custom-medium">
                    <span>Blogs</span>
                </div>
                <div class="row mt-4">
                    @for($i =0;$i<5;$i++)
                        <div class="col-4 d-flex justify-content-center m-0">
                            <div class="card mx-3 mb-5">
                                <div class="card-title">Laravel 0Auth2 authentication for big boys. + some vue</div>
                                <img src="assets/images/img.png" class="card-img-top">
                                <div class="my-2">
                                    <span class="custom-tag tag-light-green">Laravel</span>
                                    <span class="custom-tag tag-dark-blue">Vue</span>
                                    <span class="custom-tag tag-red">Vuex</span>
                                </div>
                                <div class="text-custom-small">This topix cover some very simple guide opnm how to
                                    asd lasd authentication and some otherlea. </div>
                                <div class="mt-2">
                                    <a href="#" class="btn btn-custom-neutral"><span class="btn-custom-text">Read article</span></a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
