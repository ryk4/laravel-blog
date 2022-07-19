@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="mb-0 mx-3">
                    <img src="assets/images/bg-img.png" class="card-img-top">
                </div>
                <div class="mb-0 row justify-content-center">
                    <div class="col-12 text-center text-custom-title">
                        We are sorry to see you go 😢
                    </div>
                </div>
                <br>
                <div class="mb-0 mt-2 row justify-content-center">
                    <div class="col-12 col-md-6 text-center text-custom-small">
                        Please let by letting me know privately on what went wrong and I will personally get back to you 🥺
                        <a href="mailto:{{ env('MAIL_PRIMARY_EMAIL') }}" class="hover-underline">
                            {{ env('MAIL_PRIMARY_EMAIL') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">


</script>
