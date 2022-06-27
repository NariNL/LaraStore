@extends('layouts.app')
@section('content')

<div class="panel-body">
    <div>
        <p class="title">在庫の追加</p>
    </div>
    <div class="panel-body">
        <form method="POST" action="/stock"  class="form-horizontal">
            @csrf
            <input type="number" name="">
            <input type="submit" value="追加">
        </form>
    </div>
</div>

{{-- エラーメッセージ --}}
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

@endsection