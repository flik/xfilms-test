@extends('layouts.app')

@section('content')

    <h1>Edit {{ $film->name }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($film, array('route' => array('films.update', $film->id), 'method' => 'PUT','files' => true)) }}

    <div class="input-group">
        {{ Form::label('name', 'Name', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('description', 'Description', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::textarea('description', Request::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('release_date', 'Release Date', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::text('release_date', Request::old('release_date'), array('required'=>'required','id'=>'datepicker','class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('rating', 'Rating', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::selectRange('rating', 1,5 ,Request::old('rating'), array('class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('ticket_price', 'Ticket Price', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::text('ticket_price', Request::old('ticket_price'), array('required'=>'required','class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('country', 'Country', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::text('country', Request::old('country'), array('required'=>'required','class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('genre', 'Genres', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::select('genres[]',$genres ,$film->genres->pluck('id')->all(), array('multiple' => 'multiple','class' => 'form-control')) }}
    </div>
    <br/>
    <div class="input-group ">
        <img src="{{ $film->photo_url }}" width="171">
    </div><br/>

    <div class="input-group">
        {{ Form::label('photo_url', 'Image', array('class' => ' col-md-4 col-form-label text-md-right')) }}
        {{ Form::file('photo_url', Request::old('photo_url'), array('required'=>'required','class' => 'form-control')) }}
    </div>
    <br/>

    {{ Form::submit('Update Film', array('class' => 'btn btn-primary input-group')) }}

    {{ Form::close() }}
@endsection
