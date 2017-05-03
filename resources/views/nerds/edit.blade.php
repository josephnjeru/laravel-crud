@extends('layouts/defaultlayout')
@section('content')
<div class="edit">
 
{{ HTML::ul($errors->all()) }}

<h1>Edit Nerd {{ $nerd->name }}</h1>

{{ Form::model($nerd, array('route'=> array('nerds.update', $nerd->id), 'method'=>'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('nerd_level', 'Nerd Level') }}
        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Amatuer', '2' => 'Proffesional', '3' => 'Legend'), Input::old('nerd_level'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@stop