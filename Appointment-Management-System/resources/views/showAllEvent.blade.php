@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-12 text-center">
        <h2>All Event</h2>
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
                    <td> 
                        @if (session()->has('joined_event_' . $event->id))
                                <button class="btn btn-secondary" disabled>Joined</button>
                            @else
                            <form action="{{ route('joinEvent') }}" method="POST">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                @php
                                    $isDisabled = $event->seat <= 0 ? 'disabled' : '';
                                @endphp
                                <button type="submit" class="btn btn-primary" {{ $isDisabled }}> Join</button>
                            </form>
                            @endif
                        </td>
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

