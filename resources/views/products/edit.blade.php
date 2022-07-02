@extends('layouts.app')
@section('content')


    <div class="panel-body">
        <h2>商品編集</h2>
        <!-- 商品編集フォーム -->
        <form method="POST" action="/product/update"  class="form-horizontal">
            {{ csrf_field() }}
            <input type="text" name="id" value="{{$product->id}}" hidden>


            <div class="form-group">
                <label for="product-title" class="col-sm-3 control-label">商品名</label>
                <div class="col-sm-6">
                    <input value="{{$product->title}}" type="text" name="title" id="product-title" class="form-control">
                </div>

                <label for="product-maker" class="col-sm-3 control-label">製造元</label>
                <div class="col-sm-6">
                    <input value="{{$product->maker}}" type="text" name="maker" id="product-maker" class="form-control">
                </div>

                <label for="product-description" class="col-sm-3 control-label">商品詳細</label>
                <div class="col-sm-6">
                    <input value="{{$product->description}}" type="text" name="description" id="product-description" class="form-control">
                </div>

                <label for="product-color" class="col-sm-3 control-label">色</label>
                <div class="col-sm-6">
                    <input value="{{$product->color}}" type="text" name="color" id="product-color" class="form-control">
                </div>

                <label for="product-size" class="col-sm-3 control-label">サイズ</label>
                <div class="col-sm-6">
                    <input value="{{$product->size}}" type="text" name="size" id="product-size" class="form-control">
                </div>

                <label for="product-image" class="col-sm-3 control-label">画像</label>
                <div class="col-sm-6">
                    <input value="{{$product->image}}" type="file" name="image" id="product-image" class="form-control">
                </div>

                <label for="product-price" class="col-sm-3 control-label">値段</label>
                <div class="col-sm-6">
                    <input value="{{$product->price}}" type="text" name="price" id="product-price" class="form-control">
                </div>
                <button type="submit" class="btn btn-secondary">完了</button>
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
    </div>
@endsection
