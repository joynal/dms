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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register/' . $registration->confirmation) }}"
                          novalidate="novalidate" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @if($registration->type == "student")
                                @include('auth.partials.form')
                            @else
                                @include('auth.partials.faculty_form')
                            @endif
                    </form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
