@extends('app')
@section('content')
    <h2>Create user</h2>
    <hr/>
    {!! Form::open([
        'route' => 'admin.generates.store',
        'class' =>  'form-inline',
        'novalidate' => 'novalidate' ]) !!}

        @include('admin.generates.partials.form', ['submit_text' => 'Send'])

    {!! Form::close() !!}

@endsection