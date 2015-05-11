@extends('app')
@section('content')
    <h2>Create user</h2>

    {!! Form::open([
        'class' => 'form-inline',
        'novalidate' => 'novalidate' ]) !!}

        @include('generates.partials.pre_form', ['submit_text' => 'Generate'])

    {!! Form::close() !!}

    <br/>
    <hr/>
    {!! Form::open([
        'route' => 'admin.generates.store',
        'class' =>  'form-inline',
        'novalidate' => 'novalidate' ]) !!}

        @include('generates.partials.form', ['submit_text' => 'Send'])

    {!! Form::close() !!}

@endsection