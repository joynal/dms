<div class="form-group">
    {!! Form::label('program', 'Program:') !!}
    {!! Form::select('program',[
        'bsc' => 'B.Sc.(Engg)',
        'msc' => 'M.Sc.(Engg)'
    ], Input::old('program'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::text('year', Input::old('year'), ['class' => 'form-control', 'placeholder' => 'Year']) !!}
</div>


<div class="form-group">
    {!! Form::label('course_id', 'Course Id:') !!}
    {!! Form::text('course_id', Input::old('course_id'), ['class' => 'form-control', 'placeholder' => 'Course Id']) !!}
</div>

<div class="form-group">
    {!! Form::label('faculty_id', 'Faculty Id:') !!}
    {!! Form::text('faculty_id', Input::old('faculty_id'), ['class' => 'form-control', 'placeholder' => 'faculty Id']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>