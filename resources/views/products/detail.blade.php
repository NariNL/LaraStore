@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="panel-body">
        <td class="">
        </td>

    </div>
    <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">            
            <div>商品名：<strong>{{$product->title}}</strong></div>
            <div>製造元：<strong>{{$product->maker}}</strong></div>
            <div>商品説明：<strong>{{$product->description}}</strong></div>
            <div>色：<strong>{{$product->color}}</strong></div>
            <div>サイズ：<strong>{{$product->size}}</strong></div>
            <div>{{$product->image}}</div>
            <div>在庫数:<strong>{{$stock_inventory}}</strong></div>
            <div>値段：<strong>{{$product->price}}</strong></div>
        </p>
        <a href="/product/edit/{{$product->id}}" class="btn btn-info">編集</a>
        <a href="/products" class="btn btn-primary">一覧に戻る</a>
    </div>
    </div>
    </div>
@endsection
