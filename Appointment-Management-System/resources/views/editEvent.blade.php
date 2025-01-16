@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-8">
        <br><br>
        <h3>Edit event</h3>
        <form action="{{route('updateEvent')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @foreach($events as $event)
            <input type="hidden" name="id" value="{{ $event->id }}">
        <div class="form-group">
            <label for="eventName">Event Name</label>
            <input type="text" class="form-control" id="eventName" name="eventName" value="{{ $event->name }}" required>
        </div>
        <div class="form-group">
            <label for="eventDescription">Event Description</label>
            <textarea class="form-control" id="eventDescription" name="eventDescription" required>{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="organization">Organization</label>
            <input type="text" class="form-control" id="organization" name="organization" value="{{ $event->organization }}" required>
        </div>
        <div class="form-group">
            <label for="eventPlace">Event Place</label>
            <input type="text" class="form-control" id="eventPlace" name="eventPlace" value="{{ $event->place }}" required>
        </div>
        <div class="form-group">
            <label for="eventStart">Start Date</label>
            <input type="date" class="form-control" id="eventStart" name="eventStart" value="{{ $event->start }}" required>
        </div>
        <div class="form-group">
            <label for="eventEnd">End Date</label>
            <input type="date" class="form-control" id="eventEnd" name="eventEnd" value="{{ $event->end }}" required>
        </div>
        <div class="form-group">
            <label for="eventTime">Time</label>
            <input type="time" class="form-control" id="eventTime" name="eventTime" value="{{ $event->time }}" required>
        </div>
        <div class="form-group">
            <label for="seat">Seat</label>
            <input type="number" class="form-control" id="seat" name="seat" value="{{ $event->seat }}" min="0" required>
        </div>
        <div class="form-group">
            <label for="image">Poster</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" width="100">
            @endif
        </div>
            <button type="submit" class="btn btn-primary">Update</button>
            @endforeach            
        </form>
        <br><br>
    </div>

</div>
@endsection