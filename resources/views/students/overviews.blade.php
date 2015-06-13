@extends('app')
@section('content')
    @if( !$results->count() )
        <p>There is no semester results yet</p>
    @else
        <tr>
            <th>Semester name</th>
            <th>Year</th>
            <th>S.G.P.A</th>
        </tr>
        @foreach( $results as $result)
            <tr>
                <td>$result-></td>
            </tr>
        @endforeach
        {{ dd($student) }}
    @endif
@endsection