@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <div class="card-body">
            <form action="{{route(name:'joinEvent')}}" method="POST">
            @CSRF
            @foreach($events as $event)
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <input type="hidden" name="id" value="{{ $event->id }}">
                    <img src="{{asset('image/')}}/{{ $event->image }}" alt="" width="100%" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <br><br>
                    <p class="card-text">{{ $event->description }}</p>

                    <br>
                    <button type="submit" class="btn btn-danger btn-xs">Join Event</button>
                </div>
            </div>
            @endforeach 
            </form>
        </div>       
    </div>
    <div class="col-sm-2"></div>
</div>
@endsection