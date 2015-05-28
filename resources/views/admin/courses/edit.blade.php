@extends('app')
@section('content')
    <h2>Edit course</h2>

    {!! Form::model($course, [
    'method'    => 'PATCH',
    'route'     => ['courses.update', $course->id],
    'class'     => 'form-inline',
    'novalidate'    => 'novalidate' ]) !!}

    @include('admin.courses.partials.form', ['submit_text' => 'Update'])

    {!! Form::close() !!}
@endsection