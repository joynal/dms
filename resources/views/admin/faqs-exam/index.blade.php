@extends('app')
@section('content')
    <h1>{!! $semester->name !!} = {!! $schedule->id !!}</h1>

    <div class="col-lg-10">
        <table class="table">
            @if( !$schedule->faculties->count())
                <p>No faculty added yet</p>
            @else
                <tr>
                    <th>Faculty Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                @foreach($schedule->faculties as $faculty)
                    <tr>
                        <td>{!! $faculty->user->uid !!}</td>
                        <td>{!! $faculty->user->first_name !!}</td>
                        <td>
                            {!! Form::open([
                            'class' => 'form-inline',
                            'method' => 'DELETE',
                            'route' => ['admin.semesters.exam-schedules.faculties.destroy', $semester->id, $schedule->id, $faculty->id ]]) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>

        {!! Form::open([
        'route' => ['admin.semesters.exam-schedules.faculties.store', $semester->id, $schedule->id ],
        'class' => 'form-inline',
        'novalidate' => 'novalidate' ]) !!}

            <div class="form-group">
                {!! Form::label('uid', 'Faculty Id:') !!}
                {!! Form::text('uid', Input::old('uid'), ['class' => 'form-control', 'placeholder' => 'Faculty Id']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add', ['class'=>'btn primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection