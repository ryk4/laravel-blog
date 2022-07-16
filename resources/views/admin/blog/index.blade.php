@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mt-3 mb-5">
                    <div class="header-custom-medium">Manage Blogs</div>
                    <div>
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-custom-primary mx-1"><span
                                class="btn-custom-text">Create</span></a>
                    </div>
                </div>
                <div class="">
                    <table class="table mb-5">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Views</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->views }}</td>
                                <td>
                                    @foreach($blog->tags as $tag)
                                        <span class="custom-tag {{ $tag->style_class }}">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $blog->created_at }}</td>
                                <td class="">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.blogs.edit',$blog) }}"
                                           class="btn btn-custom-warning mx-1"><span class="btn-custom-text">Edit</span></a>
                                        <a onclick="deleteConfirm('delete-form-{{$blog->id}}')"
                                           class="btn btn-custom-danger mx-1"><span
                                                class="btn-custom-text">Delete</span></a>
                                        <form class="" id="delete-form-{{$blog->id}}"
                                              action="{{ route('admin.blogs.destroy',$blog) }}"
                                              method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
