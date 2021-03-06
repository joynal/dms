@extends('app')
@section('content')
    <h1>{!! $semester->name !!} = {!! $coffer->id !!}</h1>

    <div class="col-lg-10">
        <table class="table">
            @if( !$coffer->levels->count())
                <p>No batch added yet</p>
            @else
                <tr>
                    <th>Batch</th>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>
                @foreach($coffer->levels as $level)
                    <tr>
                        <td>{!! $level->batch !!}</td>
                        <td>{!! $level->section !!}</td>
                        <td>
                            {!! Form::open([
                            'class' => 'form-inline',
                            'method' => 'DELETE',
                            'route' => ['admin.semesters.coffers.levels.destroy', $semester->id, $coffer->id, $level->id ]]) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>

        {!! Form::open([
        'route' => ['admin.semesters.coffers.levels.store', $semester->id, $coffer->id ],
        'class' => 'form-inline',
        'novalidate' => 'novalidate' ]) !!}

            <div class="form-group">
                {!! Form::label('batch', 'Batch:') !!}
                {!! Form::text('batch', Input::old('batch'), ['class' => 'form-control', 'placeholder' => 'batch']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('section', 'Section:') !!}
                {!! Form::text('section', Input::old('section'), ['class' => 'form-control', 'placeholder' => 'section']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add', ['class'=>'btn primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection