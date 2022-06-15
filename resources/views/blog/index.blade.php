@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="mb-0 mx-3">
                    <img src="assets/images/bg-img.png" class="card-img-top">
                </div>
                <div class="mb-0 row justify-content-center">
                    <div class="col-12 text-center avatar-section">
                        <img src="assets/images/img-avatar.png" class="card-img-top">
                    </div>
                    <div class="col-12 text-center text-custom-title">
                        Rytis Klimavičius
                    </div>
                </div>
                <div class="mb-0 mt-2 row justify-content-center">
                    <div class="col-12 col-md-6 text-center text-custom-small">
                        Hey guys here you can find all the products and items I own and use myself daily. If L l you are
                        interested in any of them,support me and grab them while they are available!!
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-2 mt-3 mx-3 header-custom-medium">
                    <span>Blogs</span>
                    <a href="#" class="btn btn-custom-subscribe">Subscribe</a>
                </div>
                <div class="row mt-4">
                    @foreach($blogs as $blog)
                        <div class="col-12 col-md-4 d-flex justify-content-center m-0">
                            <div class="card mx-3 mb-5">
                                <div class="card-title">{{$blog->title}}</div>
                                <img src="assets/images/img3.png" class="card-img-top">
                                <div class="my-2">
                                    @foreach($blog->tags as $tag)
                                        <span class="custom-tag {{ $tag->style_class }}">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                <div class="text-custom-small">
                                    {{ $blog->summary }}
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-custom-neutral"><span
                                            class="btn-custom-text">Read article</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
