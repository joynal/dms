<div class="form-group">
    {!! Form::label('program', 'Program:') !!}
    {!! Form::select('program',[
    'bsc' => 'B.Sc.(Engg)',
    'msc' => 'M.Sc.(Engg)'
    ], Input::old('program'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('batch', 'Batch:') !!}
    {!! Form::text('batch', Input::old('batch'), ['class' => 'form-control', 'placeholder' => 'batch']) !!}
</div>


<div class="form-group">
    {!! Form::label('section', 'Section:') !!}
    {!! Form::text('section', Input::old('section'), ['class' => 'form-control', 'placeholder' => 'section']) !!}
</div>

<div class="form-group">
    {!! Form::label('course_id', 'Course Id:') !!}
    {!! Form::text('course_id', Input::old('course_id'), ['class' => 'form-control', 'placeholder' => 'Course Id']) !!}
</div>

<div class="form-group">
    {!! Form::label('uid', 'Faculty Id:') !!}
    {!! Form::text('uid', Input::old('uid'), ['class' => 'form-control', 'placeholder' => 'faculty Id']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Exam name:') !!}
    {!! Form::select('name',[
    'mid' => 'Midterm',
    'final' => 'Final'
    ], Input::old('name'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('date', 'To:') !!}
    {!! Form::input('date', 'date', date('d-m-y'), Input::old('date'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('from', 'From:') !!}
    {!! Form::text('from', Input::old('from'), ['class' => 'form-control input-append bootstrap-timepicker', 'placeholder' => 'from']) !!}
    <span class="add-on"><i class="icon-time"></i></span>
</div>

<div class="form-group">
    {!! Form::label('to', 'To:') !!}
    {!! Form::text('to', Input::old('to'), ['class' => 'form-control input-append bootstrap-timepicker', 'placeholder' => 'to']) !!}
    <span class="add-on"><i class="icon-time"></i></span>
</div>

<div class="form-group">
    {!! Form::label('campus', 'Campus/Room:') !!}
    {!! Form::text('campus', Input::old('campus'), ['class' => 'form-control', 'placeholder' => 'Campus and room number']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>



