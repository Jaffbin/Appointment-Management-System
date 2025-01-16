@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Event</h3>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <form action="{{route('addEvent')}}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="eventname">Event Name</label>
				<input class="form-control" type="text" id="eventName" name="eventName" required>
            </div>
            <div class="form-group">
				<label for="eventDescription">Description</label>
				<textarea class="form-control" type="text" id="eventDescription" name="eventDescription" required></textarea>
            </div>
            <div class="form-group">
				<label for="organization">Organization</label>
				<input class="form-control" type="text" id="organization" name="organization" required>
            </div>
            <div class="form-group">
				<label for="eventPlace">Place</label>
				<input class="form-control" type="text" id="eventPlace" name="eventPlace" required>
            </div>
            <div class="form-group">
				<label for="eventStart">Start Date</label>
				<input class="form-control" type="date" id="eventStart" name="eventStart" min="0" required>
            </div>
            <div class="form-group">
				<label for="eventEnd">End Date</label>
				<input class="form-control" type="date" id="eventEnd" name="eventEnd" min="0" required>
            </div>
            <div class="form-group">
				<label for="eventTime">Time</label>
				<input class="form-control" type="time" id="eventTime" name="eventTime" min="0" required>
            </div>
            <div class="form-group">
				<label for="seat">Seat</label>
				<input class="form-control" type="number" id="seat" name="seat" min="0" required>
            </div>
            <div class="form-group">
				<label for="image">Poster</label>
				<input class="form-control" type="file" id="image" name="image" >
            </div>

            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection