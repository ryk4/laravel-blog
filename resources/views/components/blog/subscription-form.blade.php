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
