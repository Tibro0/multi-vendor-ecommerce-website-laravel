<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.homepage-banner-section-four') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <label>Status</label><br>
                <label class="custom-switch">
                    <input type="checkbox"
                        {{ @$homepage_section_banner_four->banner_one->status == 1 ? 'checked' : '' }} name="status"
                        class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                </label>

                <div class="form-group">
                    <img src="{{ asset(@$homepage_section_banner_four->banner_one->banner_image) }}" width="100">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" name="banner_image" value="" class="form-control">
                    <input type="hidden" name="banner_old_image"
                        value="{{ @$homepage_section_banner_four->banner_one->banner_image }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner Url</label>
                    <input type="text" name="banner_url"
                        value="{{ @$homepage_section_banner_four->banner_one->banner_url }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
