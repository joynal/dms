@extends('app')
@section('content')
    <h2>User generated list</h2>

    <a href="{!! route('admin.generates.create') !!}">Create</a>

    <h4>B.Sc.(engg)</h4>
    @if( !$bsc_students->count())
        <p>There is B.Sc students yet</p>
    @else
        <ul>
            @foreach($bsc_students as $bsc)
                <li>{!! $bsc->uu_id !!}</li>
                {!! Form::open([
                    'class' => 'form-inline',
                    'method' => 'DELETE',
                    'route' => ['admin.generates.destroy', $bsc->id ]]) !!}

                (
                {!! link_to_route('admin.generates.edit', 'Edit', [$bsc->id], ['class' => 'btn btn-info']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                )

                {!! Form::close() !!}
            @endforeach
        </ul>
    @endif

    <h4>M.Sc.(engg)</h4>
    @if( !$msc_students->count())
        <p>There is M.Sc students yet</p>
    @else
        <ul>
            @foreach($msc_students as $msc)
                <li>{!! $msc->uu_id !!}</li>
                {!! Form::open([
                    'class' => 'form-inline',
                    'method' => 'DELETE',
                    'route' => ['admin.generates.destroy', $msc->id]]) !!}

                (
                {!! link_to_route('admin.generates.edit', 'Edit', [$msc->id], ['class' => 'btn btn-info']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                )

                {!! Form::close() !!}
            @endforeach
        </ul>
    @endif
@endsection