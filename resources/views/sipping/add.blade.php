@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="mx-auto form-width-md">
        <p class="h3">配送会社登録</p>
    </div>
    
    <div class="mx-auto panel-body form-width-md">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        <form action="{{url('/create')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">会社名</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">電話番号</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="phone">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">メールアドレス</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="email">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
        </form>  
    </div>
</div>
<style></style>
@endsection