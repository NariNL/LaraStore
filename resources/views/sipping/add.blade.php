@extends('layouts.app')
 
@section('content')

<div class="panel panel-default">
    <div>
        <p class="title">配送会社登録</p>
    </div>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <div class="panel-body">
        <form action="{{url('/create')}}" method="POST">
        @csrf
            <input type="text" placeholder="会社名" name="name"> <br>
            <input type="text" placeholder="電話番号" name="phone"> <br>
            <input type="text" placeholder="メールアドレス" name="email"> <br>
            <input type="submit" value="登録">
        </form>  
    </div>
</div>
<style></style>
@endsection