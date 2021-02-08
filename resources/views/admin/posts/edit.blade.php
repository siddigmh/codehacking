@extends('layouts.admin')



@section('content')

    @include('includes.tinyeditor')

    <h1>Edit Post</h1>

    <div class="row">
        
        <div class="col-sm-4">
            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/300x200'}}" alt="" class="img-responsive">
        </div>

     <div class="col-sm-8">

    {!! Form::model( $post , ['method' =>'PATCH' , 'action'=>['AdminPostsController@update' , $post->id] , 'files'=> true]) !!}

    <div class="form-group">
        {!! Form::label('title' , 'Title:') !!}
        {!! Form::text('title' , null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body' , 'Body:') !!}
        {!! Form::textarea('body' , null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id' , 'Photo:') !!}
        {!! Form::file('photo_id' , null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id' , 'Category:') !!}
        {!! Form::select('category_id' , $categories , null , ['class' => 'form-control']) !!}
    </div>

    <br>

    <div class="form-group">
        {!! Form::submit('Update Post' , ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    </div>
    </div>

    @include('includes.form_errors')

@stop