@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))

        <p class="alert alert-warning"><b>{{session('deleted_user')}}</b></p>

    @elseif(Session::has('created_user'))

        <p class="alert alert-success"><b>{{session('created_user')}}</b></p>

    @elseif(Session::has('updated_user'))

        <p class="alert alert-success"><b>{{session('updated_user')}}</b></p>

    @endif
    
    <h1>Users</h1>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td><b>{{$user->id}}</b>
                        <td><img height="40" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/40x40'}}"></td>
                        <td><a href="{{route('users.edit' , $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role != '' ? $user->role->name : 'has no role'}}</td>
                        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach

            @endif
        </tbody>
    </table>
    @endsection