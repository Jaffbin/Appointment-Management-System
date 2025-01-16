@extends('layout') 

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Profile') }}</div>

                    <div class="card-body">
                        
                        <table class="table">

                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Birth Date</th>
                                <td>{{ $user->birthdate }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $user->phonenumber }}</td>
                            </tr>
                            <tr>
                                <th>Job</th>
                                <td>{{ $user->job }}</td>
                            </tr>
                            <tr>
                                <th>Organization</th>
                                <td>{{ $user->organization }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Created Time</th>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated Time</th>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td class="text-right"><a href="{{route('editProfile')}}" class="btn btn-warning btn-xs">Edit</a>&nbsp;</td>
                            </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection