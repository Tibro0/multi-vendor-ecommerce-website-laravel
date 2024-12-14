<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.email-setting-update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="{{ $emailSettings->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mail Host</label>
                    <input type="text" name="host" value="{{ $emailSettings->host }}" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Smtp Username</label>
                            <input type="text" name="username" value="{{ $emailSettings->username }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Smtp Password</label>
                            <input type="text" name="password" value="{{ $emailSettings->password }}"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Port</label>
                            <input type="text" name="port" value="{{ $emailSettings->port }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Encryption</label>
                            <select name="encryption" class="form-control">
                                <option {{ $emailSettings->encryption === 'tls' ? 'selected' : '' }} value="tls">TLS
                                </option>
                                <option {{ $emailSettings->encryption === 'ssl' ? 'selected' : '' }} value="ssl">SSL
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
