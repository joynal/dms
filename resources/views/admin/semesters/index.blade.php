@extends('app')
@section('content')
    <h2>create new semester</h2>

    {!! Form::open([
        'route' => 'admin.semesters.store',
        'class' => 'form-inline',
        'novalidate' => 'novalidate' ]) !!}

        @include('admin.semesters.partials.form', ['submit_text' => 'Create'])

    {!! Form::close() !!}

    <div class="col-lg-10">
        <h4>Semesters list</h4>
        <table class="table">
            @if( !$semesters->count())
                <p>There is semester created yet</p>
            @else
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Form</th>
                    <th>To</th>
                    <th>Actions</th>
                </tr>
                @foreach($semesters as $semester)
                    <tr>
                        <td><a href="{!! route('admin.semesters.show', $semester->id) !!}">{!! $semester->name !!}</a></td>
                        <td>{!! $semester->year !!}</td>
                        <td>{!! $semester->form !!}</td>
                        <td>{!! $semester->to !!}</td>
                        <td>
                            {!! Form::open([
                            'class' => 'form-inline',
                            'method' => 'DELETE',
                            'route' => ['admin.semesters.destroy', $semester->id ]]) !!}

                            {!! link_to_route('admin.semesters.edit', 'Edit', [$semester->id], ['class' => 'btn btn-info']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

@endsection