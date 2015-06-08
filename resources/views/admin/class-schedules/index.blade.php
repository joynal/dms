@extends('app')
@section('content')
    <h4>Class schedules for: {!! $semester->name !!}</h4>

    <div class="col-lg-10">
        <table class="table">
            @if(! $semester->classSchedules->count())
                <p>No class schedules created yet.</p>
            @else
                <tr>
                    <th>C.id</th>
                    <th>C.name</th>
                    <th>F.name</th>
                    <th>Day</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Room</th>
                    <th>Batch</th>
                    <th>Actions</th>
                </tr>
                @foreach( $semester->classSchedules as $schedule)
                    <tr>
                        <td>{!! $schedule->coffer->course->id !!}</td>
                        <td>{!! $schedule->coffer->course->name !!}</td>
                        <td>{!! $schedule->coffer->faculty->user->first_name !!}</td>
                        <td>{!! $schedule->day !!}</td>
                        <td>{!! $schedule->from !!}</td>
                        <td>{!! $schedule->to !!}</td>
                        <td>{!! $schedule->campus !!}</td>
                        <td>
                            @foreach($schedule->levels as $level)
                                <p>{!! $level->batch !!} : {!! $level->section !!}</p>
                                <p>
                                    {!! Form::open([
                                    'class' => 'form-inline',
                                    'method' => 'DELETE',
                                    'route' => ['admin.semesters.class-schedules.levels.destroy', $semester->id, $schedule->id, $level->id ]]) !!}

                                    <div>
                                        <button type="submit" class="glyphicon glyphicon-remove"></button>
                                    </div>

                                    {!! Form::close() !!}
                                </p>
                            @endforeach
                        </td>
                        <td>
                            {!! Form::open([
                            'class' => 'form-inline',
                            'method' => 'DELETE',
                            'route' => ['admin.semesters.class-schedules.destroy', $semester->id, $schedule->id ]]) !!}

                            {!! link_to_route('admin.semesters.class-schedules.edit', 'Edit', [$semester->id, $schedule->id], ['class'=> 'btn btn-info']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

    <br/>
    <br/>
    <br/>
    <hr/>

    {!! Form::open([
    'route' => ['admin.semesters.class-schedules.store', $semester->id],
    'class' => 'form-inline',
    'novalidate' => 'novalidate'
    ]) !!}
    @include('admin.class-schedules.partials.form', ['submit_text' => 'create'])
    {!! Form::close() !!}

    <script>
        $('#from').timepicker();
        $('#to').timepicker();
    </script>
@endsection