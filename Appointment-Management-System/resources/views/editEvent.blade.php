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
            <div class="form-group">
                <img src="" alt="" width="100" class="img-fluid"><br>
            <label for="eventname">Event Name</label>
            <input type="hidden" name="id" value="{{$event->id}}">
            <input class="form-control" type="text" id="eventName" name="eventName" required value="{{$event->name}}">           
            </div>
            <div class="form-group">
            <label for="eventDescription">Description</label>
            <input class="form-control" type="text" id="eventDescription" name="eventDescription" required value="{{$event->description}}">
            </div>
            <div class="form-group">
            <label for="eventDescription">Organization</label>
            <input class="form-control" type="text" id="organization" name="organization" required value="{{$event->organization}}">
            </div>
            <div class="form-group">
            <label for="eventPrice">Location</label>
            <input class="form-control" type="text" id="eventPlace" name="eventPlace" required value="{{$event->place}}">  
            </div>
            <div class="form-group">
            <label for="eventQuantity">Start Date</label>
            <input class="form-control" type="date" id="eventStart" name="eventStart" min="0" required value="{{$event->start}}">
            </div>
            <div class="form-group">
            <label for="eventQuantity">End Date</label>
            <input class="form-control" type="date" id="eventEnd" name="eventEnd" min="0" required value="{{$event->end}}">
            </div>
            <div class="form-group">
            <label for="eventQuantity">Time</label>
            <input class="form-control" type="time" id="eventTime" name="eventTime" min="0" required value="{{$event->time}}">
            </div>
            <div class="form-group">
            <label for="eventImage">Seat</label>
            <input class="form-control" type="number" id="seat" name="seat" min="0" required value="{{$event->seat}}">
            </div>
            <div class="form-group">
            <label for="eventImage">Image</label>
            <input class="form-control" type="file" id="eventImage" name="eventImage" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            @endforeach            
        </form>
        <br><br>
    </div>

</div>
@endsection