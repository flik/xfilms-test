@extends('layouts.app')

@section('content')
    <h1>All Films</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @foreach($films as $film)
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail filmData">
                    <img src="{{  $film->photo_url  }}" alt="{{ $film->name }}" width="40%">
                    <div class="caption">
                        <h3>{{ $film->name }}</h3>
                        <p>{{ $film->description }}</p>
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
                        <p>
                            <a href="{{ URL::to('films/' . $film->slug) }}" class="btn btn-primary"
                               role="button">Show</a>
                            <a href="{{ URL::to('films/' . $film->id . '/edit') }}" class="btn btn-default"
                               role="button">Edit</a>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['films.destroy', $film->id],'onsubmit' => 'return confirm("Are you sure ?")']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{ $films->links() }}

        </div>
@endsection

