@extends('layouts.admin')


@section('content')

    <h1>Media</h1>

    @if(Session::has('delete_img'))
        <div class="alert alert-success">
            {{session('delete_img')}}
        </div>
    @endif

    @if($photos)

    <form action="/delete/media" method="post" class="form-inline">

        {{csrf_field()}}
        {{method_field('delete')}}
        
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="delete">Delete</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>

    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>#ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                <td>
                    {!! Form::model( $photo , ['method'=>'DELETE' , 'class'=>'delete_user' ,'action'=>['AdminMediaController@destroy' , $photo->id] , 'files'=>true]) !!}
                    {!! Form::submit('X' , ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    </form>

    @endif

@stop


@section('scripts')

    <script>

        $(document).ready(function(){
            $('#options').click(function(){

                if(this.checked){

                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    })
                }else{

                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    })
                }

            })
        })

    </script>

@endsection