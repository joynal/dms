@extends('app')
@section('content')
    <h2>Edit semester</h2>

    {!! Form::model($semester, [
    'method'    => 'PATCH',
    'route'     => ['admin.semesters.update', $semester->id],
    'class'     => 'form-inline',
    'novalidate'    => 'novalidate' ]) !!}

    @include('admin.semesters.partials.form', ['submit_text' => 'Update'])

    {!! Form::close() !!}
@endsection