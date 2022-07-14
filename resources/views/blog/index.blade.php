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
                    <a href="#" class="btn btn-custom-subscribe" data-bs-toggle="modal"
                       data-bs-target="#subscribeModal">Subscribe</a>
                </div>
                <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('subscribe-list.store') }}" method="POST">
                            @method('POST')
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="subscribeModalLabel">Subscribe</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <div class="row">
                                    <div class="col-12 mb-3 text-muted">
                                        Subscribe if you wish to be notified when a new blog is published.
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label mt-3" for="email">Email *</label>
                                        <input type="email" class="form-control form-control-custom"
                                               id="comment" rows="3"
                                               placeholder="Enter your email address"
                                               name="email" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-custom-primary">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-4">
                    @foreach($blogs as $blog)
                        <div class="col-12 col-md-4 d-flex justify-content-center m-0">
                            <div class="card mx-3 mb-5">
                                <div class="card-title">{{$blog->title}}</div>
                                <img src="{{ $blog->image }}" class="card-img-top">
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

<script type="text/javascript">


</script>
