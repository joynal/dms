@extends('app')
@section('content')
    <h4>Exam schedules for: {!! $semester->name !!}</h4>

    <div class="col-lg-10">
        <table class="table">
            @if(! $semester->examSchedules->count())
                <p>No exam schedules created yet.</p>
            @else
                <tr>
                    <th>E.name</th>
                    <th>C.id</th>
                    <th>C.name</th>
                    <th>F.name</th>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Room</th>
                    <th>Batch</th>
                    <th>Actions</th>
                </tr>
                @foreach( $semester->examSchedules as $schedule)
                    <tr>
                        <td>{!! $schedule->name !!}</td>
                        <td>{!! $schedule->coffer->course->id !!}</td>
                        <td>{!! $schedule->coffer->course->name !!}</td>
                        <td>
                            @foreach($schedule->faculties as $faculty)
                                <p>{!! $faculty->user->first_name !!}</p>
                                <p>
                                    {!! Form::open([
                                    'class' => 'form-inline',
                                    'method' => 'DELETE',
                                    'route' => ['admin.semesters.exam-schedules.faculties.destroy', $semester->id, $schedule->id, $faculty->id ]]) !!}

                                        <div>
                                            <button type="submit" class="glyphicon glyphicon-remove"></button>
                                        </div>

                                    {!! Form::close() !!}
                                </p>
                            @endforeach
                        </td>
                        <td>{!! $schedule->date !!}</td>
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
                                    'route' => ['admin.semesters.exam-schedules.levels.destroy', $semester->id, $schedule->id, $level->id ]]) !!}

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
                            'route' => ['admin.semesters.exam-schedules.destroy', $semester->id, $schedule->id ]]) !!}

                            {!! link_to_route('admin.semesters.exam-schedules.edit', 'Edit', [$semester->id, $schedule->id], ['class'=> 'btn btn-info']) !!}
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
    'route' => ['admin.semesters.exam-schedules.store', $semester->id],
    'class' => 'form-inline',
    'novalidate' => 'novalidate'
    ]) !!}
    @include('admin.exam-schedules.partials.form', ['submit_text' => 'create'])
    {!! Form::close() !!}

    <script>
        $('#from').timepicker();
        $('#to').timepicker();
    </script>
@endsection