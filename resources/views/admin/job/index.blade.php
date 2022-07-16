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
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">

                        <div class="">
                            <table class="table mb-5">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Queue</th>
                                    <th scope="col">Payload</th>
                                    <th scope="col">Attempts</th>
                                    <th scope="col">Available at</th>
                                    <th scope="col">Created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                @foreach($jobs as $job)
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->queue }}</td>
                                    <td>
                                        <large-text-popover value="{{ $job->payload }}"></large-text-popover>
                                    </td>
                                    <td>{{ $job->attempts }}</td>
                                    <td>{{ $job->available_at }}</td>
                                    <td>{{ $job->created_at }}</td>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                         aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">

                            <div class="">
                                <table class="table mb-5">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">UUID</th>
                                        <th scope="col">Queue</th>
                                        <th scope="col">Payload</th>
                                        <th scope="col">Exception</th>
                                        <th scope="col">Failed_at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    @foreach($failedJobs as $job)
                                        <tr>
                                            <td>{{ $job->id }}</td>
                                            <td>{{ $job->uuid }}</td>
                                            <td>{{ $job->queue }}</td>
                                            <td>
                                                <large-text-popover value="{{ $job->payload }}"></large-text-popover>
                                            </td>
                                            <td>
                                                <large-text-popover value="{{ $job->exception }}"></large-text-popover>
                                            </td>
                                            <td>{{ $job->failed_at }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


