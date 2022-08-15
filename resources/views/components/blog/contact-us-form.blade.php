<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact us</a>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('email.store') }}" method="POST">
            @method('POST')
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Get in touch with us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="row">
                    <div class="col-12 mb-3 text-muted">
                        I would love to have a chat with you about almost anything :)
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="name">Full name</label>
                        <input type="text" class="form-control form-control-custom"
                               id="name" rows="3"
                               placeholder="Enter your name"
                               name="name"/>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="mobile">Mobile</label>
                        <input type="text" class="form-control form-control-custom"
                               id="mobile" rows="3"
                               placeholder="Enter your mobile"
                               name="mobile"/>
                    </div>
                    <div class="col-12">
                        <label class="form-label mt-3" for="email">Email *</label>
                        <input type="email" class="form-control form-control-custom"
                               id="comment" rows="3"
                               placeholder="Enter your email address"
                               name="email" required/>
                    </div>
                    <div class="col-12">
                                    <textarea class="form-control form-control-custom mt-3" rows="3"
                                              placeholder="Ask, recommend or offer anything"
                                              name="comment" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-custom-primary">Send email</button>
            </div>
        </form>
    </div>
</div>
