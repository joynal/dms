@extends('app')
@section('content')

    <div class="col-lg-10">
        <h4>{!! $semester->name !!}</h4>
        <table class="table">
            <tr>
                <td>{!! link_to_route('semesters.coffers.index', 'See course offers', [$semester->id], ['class' => 'btn btn-primary']) !!}</td>
                <td>{!! link_to_route('semesters.class-schedules.index', 'See class schedules', [$semester->id], ['class' => 'btn btn-primary']) !!}</td>
                <td>{!! link_to_route('semesters.exam-schedules.index', 'See exam schedules', [$semester->id], ['class' => 'btn btn-primary']) !!}</td>
            </tr>
        </table>
    </div>

@endsection