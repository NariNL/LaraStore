@extends('layouts.app')
 
@section('content')
<div class="panel panel-default">
    <div>
        <p class="title">配送会社編集 配送会社ID:{{$members->id}}</p>
    </div>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <div class="panel-body">
        <form action="{{url('/update')}}" method="POST">
        @csrf 
            <input type="hidden" name="id" value="{{$members->id}}"> <br>    
            <input type="text"  name="name" value="{{$members->name}}"> <br>
            <input type="text"  name="phone" value="{{$members->phone}}"> <br>
            <input type="text"  name="email" value="{{$members->email}}"> <br>
            <input type="submit" value="編集"> <br>
            <a href="/destroy/{{$members->id}}">削除</a>
        </form>  
    </div>
</div>
@endsection