<div class="tab-pane fade" id="list-cart" role="tabpanel" aria-labelledby="list-cart-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.cart-page-banner') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <h5>Banner One</h5>
                <label>Status</label><br>
                <label class="custom-switch">
                    <input type="checkbox" {{ @$cartpage_banner_section->banner_one->status == 1 ? 'checked' : '' }}
                        name="banner_one_status" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                </label>

                <div class="form-group">
                    <img src="{{ asset(@$cartpage_banner_section->banner_one->banner_image) }}" width="100">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" name="banner_one_image" value="" class="form-control">
                    <input type="hidden" name="banner_one_old_image"
                        value="{{ @$cartpage_banner_section->banner_one->banner_image }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner Url</label>
                    <input type="text" name="banner_one_url"
                        value="{{ @$cartpage_banner_section->banner_one->banner_url }}" class="form-control">
                </div>



                <hr>
                <h5>Banner Two</h5>
                <label>Status</label><br>
                <label class="custom-switch">
                    <input type="checkbox" {{ @$cartpage_banner_section->banner_two->status == 1 ? 'checked' : '' }}
                        name="banner_two_status" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                </label>

                <div class="form-group">
                    <img src="{{ asset(@$cartpage_banner_section->banner_two->banner_image) }}" width="100">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" name="banner_two_image" value="" class="form-control">
                    <input type="hidden" name="banner_two_old_image"
                        value="{{ @$cartpage_banner_section->banner_two->banner_image }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner Url</label>
                    <input type="text" name="banner_two_url"
                        value="{{ @$cartpage_banner_section->banner_two->banner_url }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>