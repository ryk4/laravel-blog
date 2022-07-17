@php /** @var App\Models\Blog $blog */ @endphp

@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-9 mb-4">
                <div class="mb-0 mt-2 row">
                    <div class="col-md-4 col-12 order-md-last mb-3">
                        <img src="{{ $blog->image }}" class="w-100">
                    </div>
                    <div class="col-md-8 order-md-first">
                        <div class="text-custom-title-big">
                            {{ $blog->title }}
                        </div>
                        <div class="my-2">
                            @foreach($blog->tags as $tag)
                                <span class="custom-tag {{ $tag->style_class }}">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-8 col-7 text-custom-author">
                                <img src="/assets/images/img-avatar.png" style="width: 34px;height: 34px;"
                                     class="me-2">{{ $blog->user->name }}
                            </div>
                            <div class="col-md-4 col-5">
                                <div class="custom-tag tag-neutral mt-1">{{ $blog->createdAtReadable() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="custom-blog-tip py-2 px-3">
                        <i class="bi bi-lightbulb me-3" style="font-size: 20px;"></i>{{ $blog->tip }}
                    </div>
                </div>
                <div class="mb-0 my-5 mx-3">
                    <div class="">{!! $blog->guide !!}</div>
                </div>
                @isset($blog->repository_url)
                    <div class="mt-3">
                        <div class="repository-url py-2 px-3">
                            <i class="bi bi-github me-3" style="font-size: 20px;"></i>
                            <a href="{{ $blog->repository_url }}">{{ $blog->repository_url }}</a>
                        </div>
                    </div>
                @endisset
            </div>
            <blog-show-comment :blog="{{ $blog->id }}"></blog-show-comment>
        </div>
    </div>
@endsection

