@extends('layouts.admin')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" integrity="sha512-zoIoZAaHj0iHEOwZZeQnGqpU8Ph4ki9ptyHZFPe+BmILwqAksvwm27hR9dYH4WXjYY/4/mz8YDBCgVqzc2+BJA==" crossorigin="anonymous" />
@section('content')

    <h1>Upload Media</h1>

    {!! Form::open(['method' =>'POST' , 'action'=>'AdminMediaController@store' , 'class'=>'dropzone' , 'files'=>true]) !!}



    {!! Form::close() !!}

@stop



@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js" integrity="sha512-eqLoNk2HP/X1UCM7WsHg0zkeoyV3y7eKaTBezCZoShALLbJiYco3XDkcI6qAVQDQiGh3gphyVWLYI8DNUWga3w==" crossorigin="anonymous"></script>
@stop