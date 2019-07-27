@extends('layouts.app')

@section('content')
    <h1>All Films</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
 
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail filmData">
                 
                </div>
            </div>
        </div>
	   <div id="pages">
	   
	   </div>
   </div>
@endsection

