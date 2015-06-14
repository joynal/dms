<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'semester name']) !!}
</div>

<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::text('year', Input::old('year'), ['class' => 'form-control', 'placeholder' => 'Year']) !!}
</div>

<div class="form-group">
    {!! Form::label('form', 'Form:') !!}
    {!! Form::input('date', 'form', date('d-m-y'), Input::old('form'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('to', 'To:') !!}
    {!! Form::input('date', 'to', date('d-m-y'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>