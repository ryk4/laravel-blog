@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mt-3 mb-5">
                    <div class="header-custom-medium">Queue jobs management</div>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="btn" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Active queue
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="btn active" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Failed queue
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="btn" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Contact
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">

                        <div class="">
                            <table class="table mb-5">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">

                            <div class="">
                                <table class="table mb-5">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">uuid</th>
                                        <th scope="col">queue</th>
                                        <th scope="col">payload</th>
                                        <th scope="col">exception</th>
                                        <th scope="col">failed_at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    @foreach($failedJobs as $job)
                                        <td>{{ $job->id }}</td>
                                        <td>{{ $job->uuid }}</td>
                                        <td>{{ $job->queue }}</td>
                                        <td>
                                            <large-text-popover></large-text-popover>
                                        </td>
                                        <td>View it here</td>
                                        <td>{{ $job->failed_at }}</td>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


