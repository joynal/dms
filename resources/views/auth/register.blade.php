@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register/' . $registration->confirmation) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">University Id</label>
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
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
