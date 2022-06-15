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
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
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
                                <td>
                                    @foreach($blog->tags as $tag)
                                        <span class="custom-tag {{ $tag->style_class }}">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $blog->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit',$blog) }}" class="btn btn-custom-warning mx-1"><span
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
