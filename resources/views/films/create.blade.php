@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">{{ __('Create new film') }}</div>

                <div class="card-body">
 
    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}
    {{ Form::hidden('invisible', 'secret', array('id' => 'ctoken')) }}
    {{ Form::open(array('url' => 'films','files'=>true, 'id' => 'cform' )) }}

    <div class="input-group row">
        {{ Form::label('name', 'Name', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
        </div>
    </div>
  <br/>
    <div class="input-group row">
        {{ Form::label('description', 'Description', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::textarea('description', Request::old('description'), array('class' => 'form-control')) }}
        </div>
    </div>
  <br/>

    <div class="input-group row">
        {{ Form::label('release_date', 'Release Date', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::text('release_date', Request::old('release_date'), array('required'=>'required','id'=>'datepicker','class' => 'form-control')) }}
    </div> </div>
  <br/>
    <div class="input-group row">
        {{ Form::label('rating', 'Rating', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::selectRange('rating', 1,5 ,Request::old('rating'), array('class' => 'form-control')) }}
    </div> </div>
  <br/>
    <div class="input-group row">
        {{ Form::label('ticket_price', 'Ticket Price', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::text('ticket_price', Request::old('ticket_price'), array('required'=>'required','class' => 'form-control')) }}
    </div> </div>
  <br/>
    <div class="input-group row">
        {{ Form::label('country', 'Country', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::text('country', Request::old('country'), array('required'=>'required','class' => 'form-control')) }}
    </div> </div>
  <br/>
    <div class="input-group row">
        {{ Form::label('genre', 'Genres', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::select('genres[]',$genres ,Request::old('genre'), array('multiple' => 'multiple','class' => 'form-control')) }}
    </div> </div>
  <br/>
    <div class="input-group row">
        {{ Form::label('photo_url', 'Image', array('class' => ' col-md-4 col-form-label text-md-right')) }}
         <div class="col-md-6">
        {{ Form::file('photo_url', Request::old('photo_url'), array('required'=>'required','class' => 'form-control')) }}
    </div> </div>
    <br/>

    {{ Form::submit('Create Film', array('class' => 'btn btn-primary input-group')) }}
 
    {{ Form::close() }}
    
    </div> </div> </div> </div> </div>
    <br/>
@endsection
