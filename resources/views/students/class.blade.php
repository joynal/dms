@extends('app')
@section('content')

    @if( !$coffers->count() )
        <h4>No class schedule yet.</h4>
    @else
        <div class="col-lg-10">
            <h4>Class Schedules</h4>
            <table class="table">
                <tr>
                    <th>Day</th>
                    <th>Course Id</th>
                    <th>Course Name</th>
                    <th>Class time</th>
                    <th>Campus</th>
                </tr>
                @foreach($coffers as $coffer)
                    @foreach($coffer->classSchedules as $schedule)
                        <tr>
                            <td>{{ $schedule->day }}</td>
                            <td>{{ $coffer->course->id }}</td>
                            <td>{{ $coffer->course->name }}</td>
                            <td>{{ $schedule->from }} - {{ $schedule->to }}</td>
                            <td>{{ $schedule->campus }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    @endif
@endsection