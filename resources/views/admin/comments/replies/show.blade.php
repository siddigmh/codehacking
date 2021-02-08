@extends('layouts.admin')



@section('content')

    @if(count($replies) > 0)
        <h1>Replies</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created</th>
                <th>Link</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td><a target="_blank" class="btn btn-warning btn-xs" href="{{route('home.post' , $reply->comment->post->id . '#replies' . $reply->comment->id)}}">view reply</a></td>
                    <td>

                        @if($reply->is_active == 1)

                            {!! Form::open(['method' =>'PATCH'  , 'action'=>['CommentRepliesController@update' , $reply->id] , 'files'=> true]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('un-approve' , ['class' => 'btn btn-xs btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' =>'PATCH' , 'action'=>['CommentRepliesController@update' , $reply->id] , 'files'=> true]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve' , ['class' => 'btn btn-xs btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>

                        {!! Form::open(['method' =>'DELETE' , 'action'=>['CommentRepliesController@destroy' , $reply->id] , 'files'=> true]) !!}

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
        <h1 class="text-center">No replies to show</h1>
    @endif

@stop