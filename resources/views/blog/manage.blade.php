@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-0 mb-5 header-custom-medium">
                    <span>Manage Blogs</span>
                </div>
                <div class="">
                    <table class="table mb-5">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>
                                    @foreach($blog->tags as $tag)
                                        <span class="custom-tag {{ $tag->style_class }}">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $blog->created_at }}</td>
                                <td>
                                    <a href="{{ route('blogs.edit',$blog) }}" class="btn btn-custom-warning mx-1"><span
                                            class="btn-custom-text">Edit</span></a>
                                    <a onclick="testSwal({{ $blog->id }})" href="#"
                                       class="btn btn-custom-danger mx-1"><span
                                            class="btn-custom-text">Delete</span></a>
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
    <script>
        console.log('printing form jS');

        function testSwal($blog) {
            console.log($blog);
            Swal.fire({
                title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
            })
        }


    </script>
@endsection
