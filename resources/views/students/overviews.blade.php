@extends('app')
@section('content')
    @if( !$results->count() )
        <h4>There is no semester results yet</h4>
    @else
        <tr>
            <th>Semester name</th>
            <th>Year</th>
            <th>S.G.P.A</th>
        </tr>
        @foreach( $results as $result)
            <tr>
                <td>$result->semester->name</td>
                <td>$result->semester->year</td>
                <td>$result->sgpa</td>
            </tr>
        @endforeach
        {{ dd($student) }}
    @endif
@endsection