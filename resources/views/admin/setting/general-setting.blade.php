<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.general-setting-update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" name="site_name" value="{{ @$generalSettings->site_name }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Layout</label>
                    <select name="layout" class="form-control">
                        <option {{ @$generalSettings->layout == 'LTR' ? 'selected' : '' }} value="LTR">LTR</option>
                        <option {{ @$generalSettings->layout == 'RTL' ? 'selected' : '' }} value="RTL">RTL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact Email</label>
                    <input type="text" name="contact_email" value="{{ @$generalSettings->contact_email }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{ @$generalSettings->contact_phone }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact Address</label>
                    <input type="text" name="contact_address" value="{{ @$generalSettings->contact_address }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Google Map Url</label>
                    <input type="text" name="map" value="{{ @$generalSettings->map }}" class="form-control">
                </div>
                <hr>

                <div class="form-group">
                    <label>Default Currency Name</label>
                    <select name="currency_name" class="form-control select2">
                        <option value="">Select</option>
                        @foreach (config('settings.currency_list') as $currency)
                            <option {{ @$generalSettings->currency_name == $currency ? 'selected' : '' }}
                                value="{{ $currency }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Currency Icon</label>
                    <input type="text" name="currency_icon" value="{{ @$generalSettings->currency_icon }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>TimeZone</label>
                    <select name="time_zone" class="form-control select2">
                        <option value="">Select</option>
                        @foreach (config('settings.time_zone') as $key => $timeZone)
                            <option {{ @$generalSettings->time_zone == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
