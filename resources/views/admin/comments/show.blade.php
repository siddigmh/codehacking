@extends('layouts.admin')



@section('content')

    @if($comments)
        <h1>Comments</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created</th>
                <th>Link</th>
                <th>Replies</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td><a target="_blank" class="btn btn-warning btn-xs" href="{{route('home.post' , $comment->post->id)}}">view post</a></td>
                    <td>

                        @if($comment->is_active == 1)

                            {!! Form::open(['method' =>'PATCH'  , 'action'=>['PostCommentsController@update' , $comment->id] , 'files'=> true]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('un-approve' , ['class' => 'btn btn-xs btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' =>'PATCH' , 'action'=>['PostCommentsController@update' , $comment->id] , 'files'=> true]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve' , ['class' => 'btn btn-xs btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>

                        {!! Form::open(['method' =>'DELETE' , 'action'=>['PostCommentsController@destroy' , $comment->id] , 'files'=> true]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete' , ['class' => 'btn btn-xs btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <h1 class="text-center">No Comment to show</h1>
    @endif

@stop