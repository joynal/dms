<div class="form-group">
    {!! Form::label('id', 'Course Id:') !!}
    {!! Form::text('id', Input::old('id'), ['class' => 'form-control', 'placeholder' => 'Course Id']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Course name:') !!}
    {!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Course name']) !!}
</div>

<div class="form-group">
    {!! Form::label('credit', 'Course credit:') !!}
    {!! Form::text('credit', Input::old('credit'), ['class' => 'form-control', 'placeholder' => 'Course credit']) !!}
</div>

<div class="form-group">
    {!! Form::label('program', 'Program:') !!}
    {!! Form::select('program',[
    'bsc' => 'B.Sc.(Engg)',
    'msc' => 'M.Sc.(Engg)'
    ], Input::old('program'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>