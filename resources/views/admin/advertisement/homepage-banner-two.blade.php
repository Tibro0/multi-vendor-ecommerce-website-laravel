<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.homepage-banner-section-two') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <h5>Banner One</h5>
                <label>Status</label><br>
                <label class="custom-switch">
                    <input type="checkbox" {{ @$homepage_section_banner_two->banner_one->status == 1 ? 'checked' : '' }}
                        name="banner_one_status" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                </label>

                <div class="form-group">
                    <img src="{{ asset(@$homepage_section_banner_two->banner_one->banner_image) }}" width="100">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" name="banner_one_image" value="" class="form-control">
                    <input type="hidden" name="banner_one_old_image"
                        value="{{ @$homepage_section_banner_two->banner_one->banner_image }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner Url</label>
                    <input type="text" name="banner_one_url"
                        value="{{ @$homepage_section_banner_two->banner_one->banner_url }}" class="form-control">
                </div>



                <hr>
                <h5>Banner Two</h5>
                <label>Status</label><br>
                <label class="custom-switch">
                    <input type="checkbox"
                        {{ @$homepage_section_banner_two->banner_two->status == 1 ? 'checked' : '' }}
                        name="banner_two_status" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                </label>

                <div class="form-group">
                    <img src="{{ asset(@$homepage_section_banner_two->banner_two->banner_image) }}" width="100">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" name="banner_two_image" value="" class="form-control">
                    <input type="hidden" name="banner_two_old_image"
                        value="{{ @$homepage_section_banner_two->banner_two->banner_image }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner Url</label>
                    <input type="text" name="banner_two_url"
                        value="{{ @$homepage_section_banner_two->banner_two->banner_url }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>