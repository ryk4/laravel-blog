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
            <div class="col-md-9">

                @include('components.blog.blogger')

                @include('components.blog.subscription-form')

                <div class="row mt-4">
                    @foreach($blogs as $blog)
                        <div class="col-12 col-md-4 d-flex justify-content-center m-0">
                            <div class="card mx-3 mb-5">
                                <div class="card-title">{{$blog->title}}</div>
                                <img src="{{ $blog->image }}" class="card-img-top" alt="{{ $blog->tag }}">
                                <div class="my-2">
                                    @foreach($blog->tags as $tag)
                                        <span class="custom-tag {{ $tag->style_class }}">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
{{--                                <div class="text-custom-small">--}}
{{--                                    {{ $blog->summary }}--}}
{{--                                </div>--}}
                                <div class="mt-2">
                                    <a href="{{ route('blogs.show', $blog->slug) }}"
                                       class="btn btn-custom-neutral"><span
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

<script type="text/javascript">


</script>
