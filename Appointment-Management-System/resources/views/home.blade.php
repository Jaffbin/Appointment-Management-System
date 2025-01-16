@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-8">Welcome to Malaysian Event Management and Participation System (MyEvent)</h1>
        
        <!-- Quick Actions Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Add New Event Card -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-plus text-blue-500"></i>
                    </div>
                </div>
                <h2 class="text-xl font-semibold mb-2" >Add New Event</h2>
                <p class="text-gray-600 mb-4">Schedule an event quickly.</p>
                <a href="{{ route('addEvent') }}" class="text-blue-500 hover:text-blue-600 font-medium">Create Now →</a>
            </div>

            <!-- View All Events Card -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-calendar-alt text-green-500"></i>
                    </div>
                </div>
                <h2 class="text-xl font-semibold mb-2">View All Events</h2>
                <p class="text-gray-600 mb-4">See all scheduled Events in calendar view.</p>
                <a href="{{route('showAllEvent')}}" class="text-green-500 hover:text-green-600 font-medium">View All →</a>
            </div>

            <!-- My Events Card -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-user-clock text-purple-500"></i>
                    </div>
                </div>
                <h2 class="text-xl font-semibold mb-2">My Events</h2>
                <p class="text-gray-600 mb-4">View and manage your personal Events.</p>
                <a href="{{route('myEvent')}}" class="text-purple-500 hover:text-purple-600 font-medium">View Mine →</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Upcoming Events</h2>
            <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($upcomingEvents as $event)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->start}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->time }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            @if (session()->has('joined_event_' . $event->id))
                                <button class="btn btn-secondary" disabled>Joined</button>
                            @else
                            <form action="{{ route('joinEvent') }}" method="POST">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                @php
                                    $isDisabled = $event->seat <= 0 ? 'disabled' : '';
                                @endphp
                                <button type="submit" class="text-red-600 hover:text-red-900" {{ $isDisabled }}> Join</button>
                            </form>
                            @endif                           
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

   
    </div>
</body>
</html>
@endsection
