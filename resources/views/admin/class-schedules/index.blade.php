@extends('app')
@section('content')
    <h4>Class schedules for: {!! $semester->name !!}</h4>

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
        </tr>
        @foreach( $semester->classSchedules as $schedule)
            <tr>
                <td>{!! $schedule->coffer->course->id !!}</td>
                <td>{!! $schedule->coffer->course->name !!}</td>
                <td>{!! $schedule->coffer->faculty->name !!}</td>
                <td>{!! $schedule->day !!}</td>
                <td>{!! $schedule->from !!}</td>
                <td>{!! $schedule->to !!}</td>
                <td>{!! $schedule->room !!}</td>
                <td>
                    @foreach($schedule->coffer->levels() as $level)
                        <p>{!! $level->batch !!} : {!! $level->section !!}</p>
                    @endforeach
                </td>
            </tr>
        @endforeach
    @endif

    <hr/>

    {!! Form::open([
        'route' => ['semesters.class-schedules.store', $semester->id],
        'class' => 'form-inline',
        'novalidate' => 'novalidate'
    ]) !!}
        @include('partials.form', ['submit_text' => 'create'])
    {!! Form::close() !!}
@endsection