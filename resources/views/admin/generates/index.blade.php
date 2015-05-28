@extends('app')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <div class="text-center">Admin Logged</div>
            <br>
            <ul class="list-group">
                <li class="list-group-item">Generate ID</li>
                <li class="list-group-item">Offer Courses</li>
                <li class="list-group-item">Class Routine</li>
                <li class="list-group-item">Exam Routine</li>
                <li class="list-group-item">Publish Result</li>
                <li class="list-group-item">Report</li>
            </ul>
        </div>
        <div class="col-lg-10">
            <a href="{!! route('admin.generates.create') !!}" class="btn btn-primary">Create</a>
            <h4>Generated users</h4>
            <table class="table">
                @if( !$bsc_students->count())
                    <p>There is no generated users yet</p>
                @else
                    <tr>
                        <th>User type</th>
                        <th>Program</th>
                        <th>Batch</th>
                        <th>University ID</th>
                        <th>Email</th>
                    </tr>
                    @foreach($bsc_students as $bsc)
                        <tr>
                            <td>{!! $bsc->type !!}</td>
                            <td>{!! $bsc->program !!}</td>
                            <td>{!! $bsc->batch !!}</td>
                            <td>{!! $bsc->uu_id!!}</td>
                            <td>{!! $bsc->email !!}</td>
                            <td>
                                {!! Form::open([
                                    'class' => 'form-inline',
                                    'method' => 'DELETE',
                                    'route' => ['admin.generates.destroy', $bsc->id ]]) !!}

                                {!! link_to_route('admin.generates.edit', 'Edit', [$bsc->id], ['class' => 'btn btn-info']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection