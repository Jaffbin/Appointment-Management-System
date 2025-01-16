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
                    <td><img src="{{asset('image')}}/{{$event->image}}" alt="" width="100" class="img-fluid"></td>
                    <td>{{$event->name}}</td>
                    <td>{{$event->description}}</td>
                    <td>{{$event->organization}}</td>
                    <td>{{$event->place}}</td>
                    <td>{{$event->start}}</td>
                    <td>{{$event->end}}</td>
                    <td>{{$event->time}}</td>
                    <td>{{$event->seat}}</td>
                    <td>{{$event->image}}</td>
                    <td><a href="" class="btn btn-warning btn-xs">Join</a>&nbsp;
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

