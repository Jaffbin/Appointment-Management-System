@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-12 text-center">
        <h2>My Event</h2>
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>organization</td>
                    <td>location</td>
                    <td>Start Date</td>
                    <td>End Date</td>
                    <td>Time</td>
                    <td>Seat</td>
                </tr>
            </thead>
            <tbody>
               @foreach($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>
                        @if ($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}">
                        @endif
                    </td>
                    <td>{{$event->name}}</td>
                    <td>{{$event->description}}</td>
                    <td>{{$event->organization}}</td>
                    <td>{{$event->place}}</td>
                    <td>{{$event->start}}</td>
                    <td>{{$event->end}}</td>
                    <td>{{$event->time}}</td>
                    <td>{{$event->seat}}</td>
                    <td><a href="{{route('editEvent',['id'=>$event->id])}}" class="btn btn-warning btn-xs">Edit</a>&nbsp;
                    <a href="{{route('deleteEvent',['id'=>$event->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure delete?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-6"></div>
</div>
@endsection

