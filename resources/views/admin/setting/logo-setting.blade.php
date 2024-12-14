<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.logo-setting-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Logo Preview</label><br>
                    <img src="{{ asset(@$logoSettings->logo) }}" width="150">
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" name="logo" class="form-control">
                    <input type="hidden" name="old_logo" value="{{ @$logoSettings->logo }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Favicon Preview</label><br>
                    <img src="{{ asset(@$logoSettings->favicon) }}" width="150">
                </div>
                <div class="form-group">
                    <label>Favicon</label>
                    <input type="file" name="favicon" class="form-control">
                    <input type="hidden" name="old_favicon" value="{{ @$logoSettings->favicon }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
