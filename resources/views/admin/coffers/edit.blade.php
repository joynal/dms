@extends('app')
@section('content')
    <h2>Edit course offer</h2>

    {!! Form::model($coffer, [
    'method'    => 'PATCH',
    'route'     => ['admin.semesters.coffers.update', $semester->id, $coffer->id],
    'class'     => 'form-inline',
    'novalidate'    => 'novalidate' ]) !!}

    @include('admin.coffers.partials.form', ['submit_text' => 'Update'])

    {!! Form::close() !!}
@endsection