@extends('app')
@section('content')

    @if( !$coffers->count() )
        <h4>No exam schedule yet.</h4>
    @else
        <div class="col-lg-10">
            <h4>Exam Schedules</h4>
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Course Id</th>
                    <th>Course Name</th>
                    <th>Class time</th>
                    <th>Campus</th>
                </tr>
                @foreach($coffers as $coffer)
                    @if( !$coffer->examSchedules)
                        <p>No exam schedule for {{ $coffer->course->name }}</p>
                    @else
                        <tr>
                            <td>{{ $coffer->examSchedules->date }}</td>
                            <td>{{ $coffer->course->id }}</td>
                            <td>{{ $coffer->course->name }}</td>
                            <td>{{ $coffer->examSchedules->from }} - {{ $coffer->examSchedules->to }}</td>
                            <td>{{ $coffer->examSchedules->campus }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    @endif
@endsection