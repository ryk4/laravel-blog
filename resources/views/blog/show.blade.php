@php /** @var App\Models\Blog $blog */ @endphp

@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-9">
                <div class="mb-0 mt-2 row">
                    <div class="col-8">
                        <div class="text-custom-title-big">
                            {{ $blog->title }}
                        </div>
                        <div class="my-2">
                            @foreach($blog->tags as $tag)
                                <span class="custom-tag {{ $tag->style_class }}">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-8 text-custom-author"><img src="/assets/images/img-avatar.png"
                                                                       style="width: 34px;height: 34px;"
                                                                       class="me-2">{{ $blog->user->name }}
                            </div>
                            <div class="col-4">
                                <span class="custom-tag tag-neutral">{{ $blog->createdAtReadable() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="/assets/images/img3.png" class="w-100">
                    </div>
                </div>
                <div class="mb-0 mt-3 mx-3 header-custom-medium">
                    <span>Blogs</span>
                </div>
            </div>
        </div>
    </div>
@endsection
