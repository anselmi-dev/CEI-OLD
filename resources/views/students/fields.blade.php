<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', 'Lastname:') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Borndate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('borndate', 'Borndate:') !!}
    {!! Form::date('borndate', null, ['class' => 'form-control']) !!}
</div>

<!-- Boleta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('boleta', 'Boleta:') !!}
    {!! Form::file('boleta') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('students.index') !!}" class="btn btn-default">Cancel</a>
</div>
