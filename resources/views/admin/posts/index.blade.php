@extends('layouts.admin')



@section('content')

    <h1>All Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Photo</th>
            <th>User</th>
            <th>Title</th>
            <th>Body</th>
            <th>Category</th>
            <th>Created</th>
            <th>Updated</th>
            <th>View</th>
            <th>Comments</th>
            <th>Control</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td><b>{{$post->id}}</b></td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://palcehold.it/50x50'}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body , 50)}}</td>
                    <td>{{$post->category ? $post->category->name : 'no category' }}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a target="_blank" class="btn btn-warning btn-xs" href="{{route('home.post' , $post->slug)}}">view post</a></td>
                    
                    <td><a class="btn btn-xs btn-default" href="{{route('comments.show' , $post->id)}}"><i class="fa fa-comments"></i> comments</a></td>
                    
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                        {!! Form::model( $post , ['method'=>'DELETE' , 'class'=>'delete_user' ,'action'=>['AdminPostsController@destroy' , $post->id] , 'files'=>true]) !!}
                        {!! Form::submit('X' , ['class'=>'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}

                        {{--<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>--}}

                        {{--<a href="{{route('users.show' , $user->id)}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>--}}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@stop