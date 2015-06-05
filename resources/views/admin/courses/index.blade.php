@extends('app')
@section('content')
    <h2>Create new course</h2>

    {!! Form::open([
    'route' => 'admin.courses.store',
    'class' => 'form-inline',
    'novalidate' => 'novalidate' ]) !!}

    @include('admin.courses.partials.form', ['submit_text' => 'Create'])

    {!! Form::close() !!}

    <div class="col-lg-10">
        <h4>course list</h4>
        <table class="table">
            @if( !$courses->count())
                <p>There is no courses created yet</p>
            @else
                <tr>
                    <th>Course Name</th>
                    <th>Course Id</th>
                    <th>Credit</th>
                    <th>Program</th>
                    <th>Actions</th>
                </tr>
                @foreach($courses as $course)
                    <tr>
                        <td><a href="{!! route('admin.courses.show', $course->id) !!}">{!! $course->name !!}</a></td>
                        <td>{!! $course->id !!}</td>
                        <td>{!! $course->credit !!}</td>
                        <td>{!! $course->program !!}</td>
                        <td>
                            {!! Form::open([
                            'class' => 'form-inline',
                            'method' => 'DELETE',
                            'route' => ['admin.courses.destroy', $course->id ]]) !!}

                            {!! link_to_route('admin.courses.edit', 'Edit', [$course->id], ['class' => 'btn btn-info']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

@endsection