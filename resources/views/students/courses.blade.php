@extends('app')
@section('content')
    <div class="col-lg-10">
        <h4>Unenrolled Subject</h4>
        <table class="table">
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Faculty Name</th>
                <th>Credits</th>
            </tr>
            @foreach($coffers as $coffer)
                @if($coffer->pivot->status == 'unenrolled')
                    <tr>
                        <td>{{ $coffer->course->id }}</td>
                        <td>{{ $coffer->course->name }}</td>
                        <td>{{ $coffer->faculty->user->first_name }} {{ $coffer->faculty->user->last_name }}</td>
                        <td>{{ $coffer->course->credit }}</td>
                    </tr>
                @endif
            @endforeach
        </table>

        <h4>Enrolled Subject</h4>
        <table class="table">
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Faculty Name</th>
                <th>Credits</th>
            </tr>
            @foreach($coffers as $coffer)
                @if($coffer->pivot->status == 'enrolled')
                    <tr>
                        <td>{{ $coffer->course->id }}</td>
                        <td>{{ $coffer->course->name }}</td>
                        <td>{{ $coffer->faculty->user->first_name }} {{ $coffer->faculty->user->last_name }}</td>
                        <td>{{ $coffer->course->credit }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection