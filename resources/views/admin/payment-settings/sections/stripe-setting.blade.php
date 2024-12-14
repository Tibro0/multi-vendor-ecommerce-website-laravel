<div class="tab-pane fade active" id="list-stripe" role="tabpanel" aria-labelledby="list-stripe-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.stripe-setting.update', 1) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Stripe Status</label>
                    <select name="status" class="form-control">
                        <option {{ $stripeSetting->status === 1 ? 'selected' : '' }} value="1">Enable</option>
                        <option {{ $stripeSetting->status === 0 ? 'selected' : '' }} value="0">Disable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Account Mode</label>
                    <select name="mode" class="form-control">
                        <option {{ $stripeSetting->mode === 0 ? 'selected' : '' }} value="0">SandBox</option>
                        <option {{ $stripeSetting->mode === 1 ? 'selected' : '' }} value="1">Live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Country Name</label>
                    <select name="country_name" class="form-control select2">
                        <option value="">Select</option>
                        @foreach (config('settings.country_list') as $country)
                            <option {{ $country === $stripeSetting->country_name ? 'selected' : '' }}
                                value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency Name</label>
                    <select name="currency_name" class="form-control select2">
                        <option value="">Select</option>
                        @foreach (config('settings.currency_list') as $key => $currency)
                            <option {{ $currency === $stripeSetting->currency_name ? 'selected' : '' }}
                                value="{{ $currency }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency Rate (Per {{ $settings->currency_name }})</label>
                    <input type="text" name="currency_rate" value="{{ $stripeSetting->currency_rate }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Stripe Client ID</label>
                    <input type="text" name="client_id" value="{{ $stripeSetting->client_id }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Stripe Secret Key</label>
                    <input type="text" name="secret_key" value="{{ $stripeSetting->secret_key }}"
                        class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
