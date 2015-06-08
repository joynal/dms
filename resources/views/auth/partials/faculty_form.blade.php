    <div class="form-group">
        <label class="col-md-4 control-label">Faculty Id</label>
        <div class="col-md-6">
            <p>{{ $registration->uu_id }}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">First name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Last name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ $registration->email }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Joining Date</label>
        <div class="col-md-6">
            <input type="date" class="form-control" name="joining_date" value="{{ old('joining_date') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Gender</label>
        <div class="col-md-6">
            <select name="gender" class="form-control">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Designation</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
    </div>