    <div class="form-group">
        <label class="col-md-4 control-label">Student Id</label>
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
        <label class="col-md-4 control-label">Batch</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="batch" value="{{ $registration->batch }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Section</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="section" value="{{ old('section') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Registration Id</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="reg_id" value="{{ old('reg_id') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Birth Date</label>
        <div class="col-md-6">
            <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">University Admission date</label>
        <div class="col-md-6">
            <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date') }}">
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
        <label class="col-md-4 control-label">Contact</label>
        <div class="col-md-6">
            <input type="number" class="form-control" name="contact" value="{{ old('contact') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Social site</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="socialite" value="{{ old('socialite') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="image" class = col-md-4 control-label="class = col-md-4 control-label">Image:</label>
        <div class="col-md-6">
            <input name="image" type="file" id="image">
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