<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type',[
    'student' => 'student',
    'faculty' => 'faculty'
    ], Input::old('type'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('program', 'Program:') !!}
    {!! Form::select('program',[
    'bsc' => 'B.Sc.(Engg)',
    'msc' => 'M.Sc.(Engg)'
    ], Input::old('type'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('batch', 'Batch:') !!}
    {!! Form::text('batch', Input::old('batch'), ['class' => 'form-control', 'placeholder' => 'batch' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('uu_id', 'University Id:') !!}
    {!! Form::text('uu_id', Input::old('uu_id'), ['class' => 'form-control', 'placeholder' => 'University Id']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>