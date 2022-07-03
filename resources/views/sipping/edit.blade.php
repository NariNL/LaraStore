@extends('layouts.app')
 
@section('content')
<div class="container">
<div class="mx-auto form-width-md">
    <div>
        <p class="h3">配送会社編集 配送会社ID:{{$members->id}}</p>
    </div>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <div class="panel-body">
        <form action="{{url('/update')}}" method="POST">
        @csrf

            <input type="hidden" name="id" value="{{$members->id}}"> <br>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">会社名</label>
            <input type="text" name="name" value="{{$members->name}}" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">電話番号</label>
            <input type="text" name="phone" value="{{$members->phone}}" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">メールアドレス</label>
            <input type="text" name="email" value="{{$members->email}}" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">編集</button>
            
            <a href="/destroy/{{$members->id}}">削除</a>
        </div>
        </form>  
    </div>
</div>
</div>
@endsection