@extends('layouts.admin')

@section('content')

    @if(Session::has('add_category'))

        <p class="alert alert-success">{{session('add_category')}}</p>

    @elseif(Session::has('update_category'))

        <p class="alert alert-success">{{session('update_category')}}</p>

    @elseif(Session::has('delete_category'))

        <p class="alert alert-success">{{session('delete_category')}}</p>

    @endif


    <h1>Categories</h1>

    <div class="col-sm-6">
        <br> <br>
        {!! Form::open(['method'=>'POST' , 'action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name' , 'Name') !!}
            {!! Form::text('name' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category' , ['class'=>'btn btn-block btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>

    <div class="col-sm-6">

        @if($categories)

        <table class="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Create Date</th>
                <th>Control</th>
            </tr>
            </thead>
            @foreach($categories as $category)
            <tbody>
                <td><b>{{$category->id}}</b></td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date' }}</td>
                <td>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                    {!! Form::open(['method'=>'DELETE' , 'class'=>'delete_user' ,'action'=>['AdminCategoriesController@destroy' , $category->id]]) !!}
                    {!! Form::submit('X' , ['class'=>'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </td>
            </tbody>
            @endforeach

        </table>

        @endif

    </div>

@endsection