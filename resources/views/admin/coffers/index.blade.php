@extends('app')
@section('content')

    <div class="col-lg-10">
        <h4>{!! $semester->name !!}</h4>
        <table class="table">
            @if( !$semester->coffers->count())
                <p>There is no course offer created yet</p>
            @else
                <tr>
                    <th>Program</th>
                    <th>Year</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Faculty Id</th>
                    <th>Faculty Name</th>
                    <th>Batch</th>
                    <th>Actions</th>
                </tr>
                @foreach($semester->coffers as $coffer)
                    <tr>
                        <td>{!! $coffer->program !!}</td>
                        <td>{!! $coffer->year !!}</td>
                        <td>{!! $coffer->course_id !!}</td>
                        <td>{!! $coffer->course->name !!}</td>
                        <td>{!! $coffer->faculty->user->uid !!}</td>
                        <td>{!! $coffer->faculty->user->first_name !!}</td>
                        <td>
                            @foreach($coffer->levels as $level)
                                <p>{!! $level->batch !!} : {!! $level->section !!}</p>
                                <p>
                                    {!! Form::open([
                                    'class' => 'form-inline',
                                    'method' => 'DELETE',
                                    'route' => ['admin.semesters.coffers.levels.destroy', $semester->id, $coffer->id, $level->id ]]) !!}

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
                            'route' => ['admin.semesters.coffers.destroy', $semester->id, $coffer->id ]]) !!}

                            {!! link_to_route('admin.semesters.coffers.edit', 'Edit', [$semester->id, $coffer->id], ['class' => 'btn btn-info']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>

        {!! Form::open([
        'route' => ['admin.semesters.coffers.store', $semester->id ],
        'class' => 'form-inline',
        'novalidate' => 'novalidate' ]) !!}

        @include('admin.coffers.partials.form', ['submit_text' => 'Create'])

        {!! Form::close() !!}
    </div>

@endsection