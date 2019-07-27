@extends('layouts.app')
<style>
    p {
        font-family: '-webkit-pictograph';
    }
</style>
@section('content')
    <h1>Showing {{ $film->name }}</h1>

    <div class="jumbotron text-left row">
        <div class="col-md-6">
            <h2>{{ $film->name }}</h2>
            <a href="{{ $film->photo_url }}">
                <img src="{{  $film->photo_url  }}" class="img-rounded" alt="{{ $film->name }}" width="200">
            </a>
            <p>
                <strong>Description:</strong> {{ $film->description }}<br>
            </p>
            <p><b>Release Date:</b> {{ $film->release_date }}</p>
            <p><b>Rating:</b> {{ $film->rating }}</p>
            <p><b>Ticket Price:</b> {{ $film->ticket_price }}</p>
            <p><b>Country:</b> {{ $film->country }}</p>
            <p><b>Genres:</b>
                @foreach($film->genres as $genre)
                    {{ $genre->name }}
                    {{ $genre !== $film->genres->last() ? ', ' : ''}}
                @endforeach
            </p>
        </div>

        <div class="text-left">
            <h3>Comments</h3>
            <!-- if there are creation errors, they will show here -->
            {{ Html::ul($errors->all(), ['class' => 'list-group']) }}

            @foreach($film->comments as $comment)
                <strong>{{ $comment->author_name }}</strong>
                <p>{{ $comment->comment_body }}</p>
            @endforeach

            @if(!$guest)
                <h3>Add Comment</h3>
                {{ Form::open(array('url' =>  URL::to('films/' . $film->id . '/comment') )) }}
                <div class="input-group">
                    {{ Form::label('author_name', 'Your Name') }}
                    {{ Form::text('author_name', Request::old('author_name'), array('class' => 'form-control')) }}
                </div>

                <div class="input-group">
                    {{ Form::label('comment_body', 'Your comment') }}
                    {{ Form::textarea('comment_body', Request::old('comment_body'), array('class' => 'form-control')) }}
                </div>
                <br/>
                {{ Form::submit('Add Comment', array('class' => 'btn btn-primary input-group')) }}

                {{ Form::close() }}
            @endif

        </div>
    </div>

@endsection
