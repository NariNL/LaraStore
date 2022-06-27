@extends('layouts.app')
@section('content')


    <div class="panel-body">
        <td class="">
            <div>商品名：<strong>{{$product->title}}</strong></div>
            <div>製造元：<strong>{{$product->maker}}</strong></div>
            <div>商品説明：<strong>{{$product->description}}</strong></div>
            <div>色：<strong>{{$product->color}}</strong></div>
            <div>サイズ：<strong>{{$product->size}}</strong></div>
            <div>{{$product->image}}</div>
            <div>在庫数:<strong>{{$stock_inventory}}</strong></div>
            <div>値段：<strong>{{$product->price}}</strong></div>
            <a href="/product/edit/{{$product->id}}">編集</a>
            <a href="/products">一覧に戻る</a>
        </td>

    </div>
@endsection
